<?php

include_once 'IProduct.php';
use Money\Money;

class Bundle implements IProduct{
	private $name;
	private $products;
	
    public function __construct(string $name,IProduct ...$products) {
        $this->name = $name;
		$this->products = $products;
    }
	
	public function getName(): string {
		return $this->name;
	}
	
	public function getPrice(): Money {
		
		if($this->products[0]){
			$totalPrice = new Money(0,$this->products[0]->getPrice()->getCurrency());
		} else {
	        throw new \InvalidArgumentException('Bundle is empty!');
		}
		
		foreach ($this->products as $product) {
        $totalPrice = $totalPrice->add($product->getPrice());
        }
		
		return $totalPrice;
	}
}
 