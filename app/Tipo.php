<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    public function produtos(){
    	return $this->hasMany('App\Produto', 'tipo_id', 'id');
    }
}
