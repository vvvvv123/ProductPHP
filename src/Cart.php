<?php

include_once 'IProduct.php';
use Money\Money;

class Cart implements Countable
{
    private $products;

    public function __construct(IProduct ...$products)
    {
        $this->products = $products;
    }

    public function addProduct(IProduct $product)
    {
        array_push($this->products, $product);
    }

    public function getTotalPrice(): Money
    {
        if ($this->products[0]) {
            $totalPrice = new Money(0, $this->products[0]->getPrice()->getCurrency());
        } else {
            throw new \InvalidArgumentException('Cart is empty!');
        }

        foreach ($this->products as $product) {
            $totalPrice = $totalPrice->add($product->getPrice());
        }

        return $totalPrice;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function count()
    {
        return sizeof($this->products);
    }
}