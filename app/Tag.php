<?php

namespace App;

use App\Thread;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function threads(){
    	return $this->hasMany(Thread::class);
    }
    
}
