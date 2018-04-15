<?php

include_once "ICryteria.php";

class Cryteria
{
    private $cryterias;

    public function __construct(ICryteria ...$cryterias)
    {
        $this->cryterias = $cryterias;
    }

    public function checkCryterias(Cart $cart): bool
    {
        foreach ($this->cryterias as $cryteria) {
            if ($cryteria->checkCart($cart)) {
                return true;
            }
        }
        return false;
    }
}