<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryMethods extends Model
{
    protected $guarded = [];

    public function delivery(){
        return $this->hasMany(Delivery::class);
    }
}
