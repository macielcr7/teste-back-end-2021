<?php

namespace App\Models;

class UserQuotes extends Base
{
    protected $fillable = [
        'id_user', 
        'id_coin', 
        'id_coin_conversion', 
        'coin', 
        'coin_conversion', 
        'type', 
        'type_value', 
    ];

    public function user(){
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function coinObj(){
        return $this->belongsTo('App\Models\Coins', 'id_coin', 'id');
    }

    public function coinConversionObj(){
        return $this->belongsTo('App\Models\Coins', 'id_coin_conversion', 'id');
    }
}