<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    protected $guarded = [];

    public function temporaryCart(){
        return $this->belongsTo(TemporaryCart::class);
    }
}
