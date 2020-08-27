<?php

namespace App\CartManagement;

interface TemporaryCartContract
{
    public function addToCart($data);

    public function removeFromCart($data);

    public function getCartItems();
}
