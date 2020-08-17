<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function magazine(){
        return $this->hasOne(Magazine::class);
    }

    public function convertedPrice(){
        return number_format($this->price/100,2,'.','');
    }
}
