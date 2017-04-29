<?php

require_once ('.vendor/Autoload.php');

//use PHPUnit\Framework\TestCase;

class testandoAmbienteTest extends PHPUnit_Framework_TestCase
{
    public function testHelloWorld()
    {
        $test = 'hello world';
        $this->assertEquals($test, 'hello world');
    }
}