<?php

class MagicWord implements ICryteria
{
    private $magicWord;

    public function __construct(string $magicWord)
    {
        $this->magicWord = $magicWord;
    }

    public function checkCart(Cart $cart): bool
    {
        foreach ($cart->getProducts() as $product) {
            if ($product->getName() == $this->magicWord) {
                return true;
            }
        }
        return false;
    }
}