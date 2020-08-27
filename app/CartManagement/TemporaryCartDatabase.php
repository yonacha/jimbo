<?php


namespace App\CartManagement;


use App\Cart;
use App\CartDetails;
use Illuminate\Support\Facades\Auth;

class TemporaryCartDatabase implements TemporaryCartContract
{
    public function addToCart($data)
    {
        $user = Auth::user();
        if ($user->temporaryCarts()->count() == 0) {
            $cart = $user->temporaryCarts()->create([]);

            $cart->createCartDetails($data);
        } else {
            if ($details = $user->temporaryCarts()->first()->cartDetails()->where('product_id', $data['product_id'])->first()) {
                $details->quantity += $data['quantity'];
                $details->save();
            } else {
                $user->temporaryCarts()->first()->createCartDetails($data);
            }
        }
    }

    public function removeFromCart($data)
    {
        $user = Auth::user();
        $details = $user->temporaryCarts()->first()->cartDetails()->get()->where('product_id', $data['product_id'])->first();

        if (($details->quantity - $data['quantity']) < 0) {
            $details->delete();
        } else {
            $details->quantity -= $data['quantity'];
            $details->save();
        }

    }

    public function getCartItems()
    {
        // TODO: Implement getCartItems() method.
    }
}
