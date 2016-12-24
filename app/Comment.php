<?php

namespace App;

use App\User;
use App\Thread;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{		
    protected $fillable = ['body', 'img', 'thread_id'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function thread(){
    	return $this->belongsTo(Thread::class);
    }
    
}
