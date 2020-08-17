<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    public function temporaryCart(){
        return $this->belongsTo(TemporaryCart::class);
    }
}
