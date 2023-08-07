<?php

namespace Elminson\PHPProjectGen;

use PhpZip\ZipFile;

class PHPProjectGen
{
	private $composerConfig;

	public function __construct()
	{
		$this->loadConfig();
	}

	public function generateProject()
	{
		$this->generateComposer();
		$this->generateClass();
		$this->generateTestCases();
		$this->generatePHPUnitTestCases();
		$this->generateZipFile();
		$this->cleanData();
	}

	private function loadConfig()
	{
		$configFile = file_get_contents("config.json");
		$this->composerConfig = json_decode($configFile, true);
	}

	private function generateComposer()
	{
		$composerData = [
			'name' => strtolower($this->composerConfig['name'] . "/" . $this->composerConfig['projectname']),
			'description' => $this->composerConfig['description'],
			'type' => $this->composerConfig['type'],
			'license' => $this->composerConfig['license'],
			'authors' => [
				[
					'name' => $this->composerConfig['developer'],
					'email' => $this->composerConfig['email'],
				],
			],
			'autoload' => [
				'psr-0' => [
					$src = "{$this->composerConfig['name']}\\\\{$this->composerConfig['projectname']}\\\\",
					$tests = "{$this->composerConfig['name']}\\\\{$this->composerConfig['projectname']}\\\\Test\\\\",
				],
				'psr-4' => [
					$src => 'src/',
					$tests => 'tests/',
				],
				'psr-4-dev' => [
					$src => 'src/',
					$tests => 'tests/',
				],
			],
			'require' => [],
			'require-dev' => [],
			'minimum-stability' => $this->composerConfig['minimum-stability'],
		];

		if ($this->composerConfig['phpunit']) {
			$composerData['require']['phpunit/phpunit'] = $this->composerConfig['phpunitversion'];
			$composerData['require-dev']['phpunit/phpunit'] = $this->composerConfig['phpunitversion'];
		}

		$composerJson = json_encode($composerData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
		$this->writeFile('composer', $composerJson, '', 'json');
	}

	private function generateClass()
	{
		$template = file_get_contents("src/ProjectTemplate.php.raw");
		$namespace = "{$this->composerConfig['name']}\\{$this->composerConfig['projectname']}";
		$template = str_replace('{!namespace!}', $namespace, $template);
		$template = str_replace('{!class!}', $this->composerConfig['projectname'], $template);
		$template = str_replace('{!email!}', $this->composerConfig['email'], $template);
		$template = str_replace('{!date!}', date('m/d/Y'), $template);
		$template = str_replace('{!time!}', date('h:i A'), $template);
		$this->writeFile($this->composerConfig['projectname'], $template);
	}

	private function generateTestCases()
	{
		$template = file_get_contents("src/testProjectTemplate.php.raw");
		$namespace = "{$this->composerConfig['name']}\\{$this->composerConfig['projectname']}";
		$template = str_replace('{!namespace!}', $namespace, $template);
		$template = str_replace('{!projectname!}', $this->composerConfig['projectname'], $template);
		$template = str_replace('{!loweclass!}', strtolower($this->composerConfig['projectname']), $template);
		$this->writeFile($this->composerConfig['projectname'], $template, 'test');
	}

	private function generatePHPUnitTestCases()
	{
		$template = file_get_contents("src/phpunit.xml.dist.raw");
		$template = str_replace('{!projectname!}', $this->composerConfig['projectname'], $template);
		$this->writeFile('phpunit.xml', $template, '', 'dist');
	}

	private function writeFile($name, $data, $prefix = '', $ext = 'php')
	{
		$filePath = __DIR__ . "/temp/{$prefix}{$name}.{$ext}";
		file_put_contents($filePath, $data);
	}

	private function generateZipFile()
	{
		$zipFile = new ZipFile();
		$mainFile = "src/{$this->composerConfig['projectname']}.php";

		$zipFile
			->addFile(__DIR__ . "/temp/{$this->composerConfig['projectname']}.php", $mainFile)
			->addFile(__DIR__ . "/temp/composer.json", "composer.json")
			->addFile(__DIR__ . "/temp/.gitignore", ".gitignore")
			->addFromString("README.md", "#{$this->composerConfig['projectname']}");

		if ($this->composerConfig['phpunit']) {
			$testFile = "tests/test{$this->composerConfig['projectname']}.php";
			$zipFile
				->addFile(__DIR__ . "/temp/phpunit.xml.dist", "tests/phpunit.xml.dist")
				->addFile(__DIR__ . "/temp/test{$this->composerConfig['projectname']}.php", $testFile);
		}

		$zipFile
			->saveAsFile("{$this->composerConfig['projectname']}.zip")
			->close();
	}

	private function cleanData()
	{
		unlink(__DIR__ . "/temp/{$this->composerConfig['projectname']}.php");
		if ($this->composerConfig['phpunit']) {
			unlink(__DIR__ . "/temp/test{$this->composerConfig['projectname']}.php");
			unlink(__DIR__ . "/temp/phpunit.xml.dist");
		}
		unlink(__DIR__ . "/temp/composer.json");
	}
}
