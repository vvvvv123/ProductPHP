<?php

require "vendor/autoload.php";
require "src/Product.php";
require "src/Bundle.php";
require "src/Discounted.php";

use Money\Money;

$product1 = new Product("produkt 1", Money::PLN(10000));
$product2 = new Product("produkt 2", Money::PLN(10000));
$bundle = new Bundle("small bundle",$product1, $product2);
$discounted = new Discounted($product1, 0.1);

$totalPrice = Money::PLN(0);

$products = [
    $product1,
    $product2,
	$bundle,
	$discounted
];

foreach ($products as $product) {
    echo $product->getName() . PHP_EOL;
    $totalPrice = $totalPrice->add($product->getPrice());
}

echo 'TOTAL PRICE: '.$totalPrice->getAmount();
