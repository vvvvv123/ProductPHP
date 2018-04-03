<?php

include_once 'IProduct.php';
use Money\Money;

class Discounted implements IProduct {
	
	private $name;
	private $price;
	private $discount;
	
    public function __construct(IProduct $product, float $discount) {
		$this->product = $product;
		$this->discount = $discount;
    }
	
	public function getName(): string {
		return $this->product->getName();
	}
	
	public function getPrice(): Money {
		return $this->product->getPrice()->multiply(1-$this->discount);
	}
	
}