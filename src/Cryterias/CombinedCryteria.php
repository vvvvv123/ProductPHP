<?php

class CombinedCryteria implements ICryteria
{
    private $cryterias;

    public function __construct(ICryteria ...$cryterias)
    {
        $this->cryterias = $cryterias;
    }

    public function checkCart(Cart $cart): bool
    {
        foreach ($this->cryterias as $cryteria) {
            if ($cryteria->checkCart($cart) == false)
                return false;
        }
        return true;
    }
}