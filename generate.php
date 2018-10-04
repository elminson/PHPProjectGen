<?php
/**
 * Created by PhpStorm.
 * User: elminsondeoleobaez
 * Date: 10/3/18
 * Time: 5:52 PM
 */

//@todo json file? with data for composer and classes
//@todo form data,
//@todo Developer_name, Project_name, phpunit? (checkbox),
//@todo Create folders (src, tests)
//@todo Create MainClass => src (add autoload.php)
//@todo Create composer.json file
//@todo Create Test Cases class
//@todo Create Readme.md file

namespace Elminson\PHPProjectGen;

require __DIR__ . '/vendor/autoload.php';

$gen = new PHPProjectGen();
$gen->GenerateProject();