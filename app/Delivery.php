<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $guarded = [];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function deliveryMethod(){
        return $this->belongsTo(DeliveryMethods::class);
    }
}
