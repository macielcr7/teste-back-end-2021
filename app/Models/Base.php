<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    public function scopeLike($query, $campo, $valor){
        if(isset($valor) and !empty($valor)){
            return $query->where($campo, 'LIKE', "%{$valor}%");
        }
        else{
            return $query;
        }
    }

	public function scopeOrLike($query, $campo, $valor){
        if(isset($valor) and !empty($valor)){
            return $query->orWhere($campo, 'LIKE', "%{$valor}%");
        }
        else{
            return $query;
        }
    }

    public function scopeIdentic($query, $campo, $valor){
        if(isset($valor) and !empty($valor)){
            return $query->where($campo, '=', $valor);
        }
        else{
            return $query;
        }
    }

    public function scopeNoIdentic($query, $campo, $valor){
        if(isset($valor) and !empty($valor)){
            return $query->where($campo, '!=', $valor);
        }
        else{
            return $query;
        }
    }

    public function scopeOrIdentic($query, $campo, $valor){
        if(isset($valor) and !empty($valor)){
            return $query->orWhere($campo, '=', $valor);
        }
        else{
            return $query;
        }
    }
}
