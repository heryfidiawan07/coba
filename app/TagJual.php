<?php

namespace App;

use App\Jual;
use Illuminate\Database\Eloquent\Model;

class TagJual extends Model
{
    public function juals(){
    	return $this->hasMany(Jual::class);
    }
    
}
