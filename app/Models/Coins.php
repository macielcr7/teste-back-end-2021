<?php

namespace App\Models;

class Coins extends Base
{
    protected $fillable = [
        'code', 
        'description', 
        'conversion', 
    ];

    public function conversions(){
        return $this->belongsToMany('App\Models\Coins', 'coin_conversions', 'id_coin', 'id_coin_conversion');
    }
}
