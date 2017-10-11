<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    public function produto(){
    	return $this->belongsTo('App\Produto', 'produto_id', 'id');
    }
}
