<?php

require "vendor/autoload.php";
require "src/StandardProd.php";
require "src/Cart.php";
require "src/Cryterias/Cryteria.php";
require "src/Cryterias/CombinedCryteria.php";
require "src/Cryterias/MinProducts.php";
require "src/Cryterias/MinPrice.php";
require "src/Cryterias/MagicWord.php";

use Money\Money;

$product1 = new StandardProduct("TV", Money::PLN(10000));
$product2 = new StandardProduct("IRON", Money::PLN(10000));
$product3 = new StandardProduct("SPOON", Money::PLN(10000));

$cryteria = new Cryteria(new CombinedCryteria(new MinProducts(0), new MinPrice(Money::PLN(0))), new MagicWord("TV"));

$cart = new Cart($product1, $product2);

$cart->addProduct($product3);
print $cryteria->checkCryterias($cart);

