<?php

namespace App\Http\Controllers;

use App\CartManagement\TemporaryCartContract;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TemporaryCartController extends Controller
{

    public function store(TemporaryCartContract $cartContract){
        $data = request()->validate([
            'product_id' => ['required', 'numeric', 'max:10000000'],
            'quantity' => ['required', 'numeric', 'max:10000000'],
            'guest' => ''
        ]);

        $cartContract->addToCart([
            'product_id' => $data['product_id'],
            'quantity' => $data['quantity'],
        ]);

    }

    public function removeFromCart(TemporaryCartContract $cartContract){
        $data = request()->validate([
            'product_id' => ['required', 'numeric', 'max:10000000'],
            'quantity' => ['required', 'numeric', 'max:10000000'],
            'guest' => ''
        ]);
        $cartContract->removeFromCart($data);
    }

    public function testStore(){
        $client = new Client();
        $client->post('/temporary/cart',['verify'=>false]);
    }
}
