<?php

namespace App;

use App\Tag;
use App\User;
use App\Comment;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{	
    use Searchable;

    public function searchableAs(){
        return 'threads';
    }
    
	//user_id tidak perlu di masukan karena sudah di relasi pada clas User yaitu return $this->hasMany(Thread::class)    
    protected $fillable = ['title', 'body', 'img', 'slug', 'tag_id',];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function tag(){
    	return $this->belongsTo(Tag::class);//Class Thread hanya membagikan ke class tag pada saat edit yaitu $thread->tag->name
    }
    
    public function comments(){
    	return $this->hasMany(Comment::class);
    }
    
    public function countComments(){
        return $this->comments->count();
    }
    
    public function getComment(){
        return $this->comments()->latest()->first();
    }
}
