<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->userData()->create();
            $user->api()->create();
            $user->blikAliases()->create();
            $user->cardAliases()->create();

        });
    }



    public function userData(){
        return $this->hasOne(UserData::class);
    }

    public function api(){
        return $this->hasOne(Api::class);
    }

    public function blikAliases(){
        return $this->hasOne(BlikAliases::class);
    }

    public function cardAliases(){
        return $this->hasOne(CardAliases::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }


}
