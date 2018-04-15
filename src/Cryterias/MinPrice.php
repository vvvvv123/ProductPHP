<?php

use Money\Money;

class MinPrice implements ICryteria
{
    private $minPrice;

    public function __construct(Money $minPrice)
    {
        $this->minPrice = $minPrice;
    }

    public function checkCart(Cart $cart): bool
    {
        return $this->minPrice < $cart->getTotalPrice();
    }
}