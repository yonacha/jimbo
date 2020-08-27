<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemporaryCart extends Model
{
    protected $guarded = [];

    public function createCartDetails($data){
        $this->CartDetails()->create([
            'product_id' => $data['product_id'],
            'quantity' => $data['quantity'],
        ]);

    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cartDetails(){
        return $this->hasMany(CartDetails::class);
    }
}

