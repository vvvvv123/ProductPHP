<?php

class MinProducts implements ICryteria
{
    private $minProducts;

    public function __construct(int $minProducts)
    {
        $this->minProducts = $minProducts;
    }

    public function checkCart(Cart $cart): bool
    {
        return $this->minProducts < $cart->count();
    }
}