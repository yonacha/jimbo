<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemporaryCart extends Model
{

    public function cartDetails(){
        return $this->hasMany(CartDetails::class);
    }
}
