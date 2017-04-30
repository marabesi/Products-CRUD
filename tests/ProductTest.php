<?php

require_once ('vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use App\Product;

class ProductTest extends TestCase 
{
    public function testShouldCreateOneProductWithAName()
    {
        $product = new Product('test', 10);
        $this->assertEquals('test', $product->getName());
    }

    public function testShouldCreateOneProductWithAPrice()
    {
        $product = new Product('test', 10);
        $this->assertEquals(10, $product->getPrice());
    }
}