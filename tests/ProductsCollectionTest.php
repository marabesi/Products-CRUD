<?php

require_once ('vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use App\ProductsCollection;
use App\Product;

class ProductsCollectionTest extends TestCase 
{
    public function testShouldCreateAProductsListEmpty()
    {
        $list = new ProductsCollection();
        $this->assertEquals([], $list->getAll());
    }

    public function testShouldAddOneProductOnList()
    {
        $list = new ProductsCollection();
        $product = new Product('name', 10);
        $list->add($product);
        $this->assertEquals([$product], $list->getAll());
    }

    public function testShouldAddTwoProductsOnList()
    {
        $list = new ProductsCollection();
        $product1 = new Product('name', 10);
        $product2 = new Product('name', 10);
        $list->add($product1);
        $list->add($product2);

        $this->assertEquals($product1, $list->getAll()[0]);
        $this->assertEquals($product2, $list->getAll()[1]);
    }

    public function testShouldSetIdToProductWhenCreateIt()
    {
        $list = new ProductsCollection();
        $product1 = new Product('name', 10);
        $product2 = new Product('name', 10);
        $list->add($product1);
        $list->add($product2);

        $this->assertEquals(1, $list->getAll()[0]->getId());
        $this->assertEquals(2, $list->getAll()[1]->getId());

    }

    public function testShouldGetOneProductById()
    {
        $list = new ProductsCollection();
        $product1 = new Product('name', 10);
        $product2 = new Product('name', 10);
        $list->add($product1);
        $list->add($product2);

        $this->assertEquals($product1, $list->getById(1));
        $this->assertEquals($product2, $list->getById('2'));
    }

    public function testShouldReturnFalseIfProductDontExist()
    {
        $list = new ProductsCollection();
        $product1 = new Product('name', 10);
        $list->add($product1);

        $this->assertEquals($product1, $list->getById(1));
        $this->assertEquals(false, $list->getById(2));
    }

    public function testShouldRemoveOneProductOfList()
    {
        $list = new ProductsCollection();
        $product1 = new Product('name', 10);
        $product2 = new Product('name', 10);
        $list->add($product1);
        $list->add($product2);
        $list->remove(1);

        $this->assertEquals(1, sizeof($list->getAll()));
        $this->assertEquals($product2, $list->getById(2));
        $this->assertEquals(false, $list->getById(1));
    }

    public function testShouldAddIdIncrementedAfterRemove()
    {
        $list = new ProductsCollection();
        $product1 = new Product('name', 10);
        $product2 = new Product('name', 10);
        $list->add($product1);
        $list->add($product2);
        $list->remove(1);
        $list->add($product1);

        $this->assertEquals(2, sizeof($list->getAll()));
        $this->assertEquals($product1, $list->getById(3));
    }
}

















