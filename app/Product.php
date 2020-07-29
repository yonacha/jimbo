<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function magazine(){
        return $this->hasOne(Magazine::class);
    }
}
