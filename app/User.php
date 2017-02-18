<?php

namespace App;

use App\Jual;
use App\Thread;
use App\Comment;
use App\Jcomment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'token', 'status', 'admin', 'img', 'facebook_id', 'tentang', 'slug',
    ];

    /**
     * The attributes that shoul
     d be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(){
        if ($this->admin == 1) {
            return true;
        }
        return false;
    }

    public function getName(){
        if ($this->name) {
            return $this->name;
        }
        return false;
    }

    public function threads(){
        return $this->hasMany(Thread::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function jcomments(){
        return $this->hasMany(Jcomment::class);
    }

    public function juals(){
        return $this->hasMany(Jual::class);
    }
    
    public function getFb(){
        return $this->fb_avatar;
    }
    
    public function getAvatar(){
        if($this->getFb()){
            return $this->getFb();
        }else{
            return "https://www.gravatar.com/avatar/" . md5($this->email) . "?d=mm&s=50";
        }
    }
    
    public function tulisan(){
        return $this->threads->count();
    }
    
    public function fjb(){
        return $this->juals->count();
    }       
    
}
