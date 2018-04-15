<?php

interface ICryteria {
    public function checkCart(Cart $cart): bool;
}