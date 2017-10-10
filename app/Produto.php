<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function tipo(){
    	return $this->belongsTo('App\Tipo', 'tipo_id', 'id');
    }
}
