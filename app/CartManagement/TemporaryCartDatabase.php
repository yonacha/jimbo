<?php


namespace App\CartManagement;


use App\Cart;
use App\CartDetails;
use Illuminate\Support\Facades\Auth;

class TemporaryCartDatabase implements TemporaryCartContract
{
    private $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function addToCart($data)
    {
        if ($this->user->temporaryCarts()->count() == 0) {
            $cart = $this->user->temporaryCarts()->create([]);

            $cart->createCartDetails($data);
        } else {
            if ($details = $this->user->temporaryCarts()->first()->cartDetails()->where('product_id', $data['product_id'])->first()) {
                $details->quantity += $data['quantity'];
                $details->save();
            } else {
                $this->user->temporaryCarts()->first()->createCartDetails($data);
            }
        }
    }

    public function removeFromCart($data)
    {
        $details = $this->user->temporaryCarts()->first()->cartDetails()->get()->where('product_id', $data['product_id'])->first();

        if (($details->quantity - $data['quantity']) < 0) {
            $details->delete();
        } else {
            $details->quantity -= $data['quantity'];
            $details->save();
        }

    }

    public function getCartItems()
    {
        return $this->user->temporaryCarts()->first()->cartDetails()->getResults();
    }
}
