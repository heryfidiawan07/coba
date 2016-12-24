<?php

namespace App;

use App\User;
use App\Jual;
use Illuminate\Database\Eloquent\Model;

class Jcomment extends Model
{
    protected $fillable = ['body', 'img', 'user_id', 'jual_id'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function jual(){
    	return $this->belongsTo(Jual::class);
    }
    
}
