<?php
/**
 * Created by PhpStorm.
 * User: elminsondeoleobaez
 * Date: 10/3/18
 * Time: 1:52 PM
 */
require __DIR__ . '/../vendor/autoload.php';


use Elminson\NewProject;
use PHPUnit\Framework\TestCase;

class testNewProject extends TestCase
{

    /**
     *
     */
    function testFirstTestCase()
    {
        $newproject = new NewProject();
        $this->assertEquals("index", $newproject->index);
    }

}
