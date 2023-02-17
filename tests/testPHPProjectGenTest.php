<?php
namespace ricci69\PHPProjectGen;

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class testPHPProjectGenTest extends TestCase
{
    function testFileGeneratedTestCase()
    {
        $project = new PHPProjectGen();
        $project->GenerateProject();
        $this->assertFileExists("NewProject.zip");
        unlink("NewProject.zip");
    }
}
