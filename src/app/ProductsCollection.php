<?php

namespace App;

class ProductsCollection
{
    private $list;
    private $nextId;

    public function __construct()
    {
        $this->list = [];
        $this->nextId = 1;
    }

    public function getAll()
    {
        return $this->list;
    }

    public function getById($id)
    {
        foreach($this->list as $product){
            if($product->getId() == $id){
                return $product;
            }
        }
    }

    public function add(Product $product)
    {
        $product->setId($this->nextId);
        $this->nextId ++;
        array_push($this->list, $product);
    }

    public function remove($id)
    {
        for($i = 0; $i < sizeof($this->list); $i ++){
            if($this->list[$i]->getId() === $id){
                array_splice($this->list, $i, 1);
                return true;
            }
        }
        return false;
    }
}