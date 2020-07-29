<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction(){
        return $this->hasOne(Transaction::class);
    }

    public function delivery(){
        return $this->hasOne(Delivery::class);
    }

    public function cart(){
        return $this->hasOne(Cart::class);
    }
}
