<?php

namespace App;

use App\User;
use App\Galery;
use App\Jcomment;
use App\TagJual;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Jual extends Model
{   
    use Searchable;

    public function searchableAs(){
        return 'juals';
    }

    protected $fillable = ['title', 'deskripsi', 'tag_id', 'slug'];

    public function user(){
    	return $this->belongsTo(User::class);
    }
    
    public function galery(){
    	return $this->hasMany(Galery::class);
    }

    public function tag(){
    	return $this->belongsTo(TagJual::class);
    }

    public function jcomments(){
    	return $this->hasMany(Jcomment::class);
    }

    public function countJcomments(){
        return $this->jcomments->count();
    }

    public function getNameImg(){
        return $this->galery()->first();
    }
    
    public function countComments(){
        return $this->jcomments->count();
    }

    public function getComment(){
        return $this->jcomments()->latest()->first();
    }

}
