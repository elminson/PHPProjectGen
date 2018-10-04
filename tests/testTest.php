<?php
/**
 * Created by PhpStorm.
 * User: elminsondeoleobaez
 * Date: 10/4/18
 * Time: 10:39 AM
 */

namespace Elminson\PHPProjectGen;

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class testTestCases extends TestCase
{
    function testFileGeneratedTestCase()
    {
        $project = new PHPProjectGen();
        $project->GenerateProject();
        $this->assertFileExists("NewProject.zip");
        unlink("NewProject.zip");
    }
}

