<?php

namespace App\Http\Controllers;

use Auth;
use App\Tag;
use App\Jual;
use App\User;
use App\Thread;
use App\Comment;
use App\TagJual;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['user', 'index']] );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags        = Tag::all();
        $threads     = Thread::latest()->paginate(6);
        $hotsthreads = Thread::has('comments', '>', 0)->paginate(4);
        $newcomments = Thread::has('comments')->latest()->paginate(3);

        $jtags        = TagJual::all();
        $juals        = Jual::latest()->paginate(6);
        $jualsphotos  = Jual::latest()->paginate(4);
        $topjuals     = Jual::has('jcomments', '>', 0)->paginate(4);
        $jualcomments = Jual::has('jcomments')->latest()->paginate(3);

        if (Auth::check()) {
            if (Auth::user()) {
                return view('home', compact('tags', 'threads', 'newcomments', 'hotsthreads', 'topjuals', 'jtags', 'juals', 'jualcomments', 'jualsphotos'));
            }
        }else{
            return view('welcome', compact('tags', 'threads', 'newcomments', 'hotsthreads', 'topjuals', 'jtags', 'juals', 'jualcomments', 'jualsphotos'));
        }
    }   

    public function user($name){
        $user    = User::whereName($name)->first();
        $tags    = Tag::all();
        $jtags   = TagJual::all();
        if (!$user) {
            return redirect('/');
        }
        $threads = Thread::where('user_id', $user->id)->latest()->paginate(10);
        $juals   = Jual::where('user_id', $user->id)->latest()->paginate(10);
        //dd($user->id);
        return view('user.index', compact('user', 'threads', 'tags', 'juals', 'jtags'));
    }
    
    public function welcome(){
        return view('welcome');
    }
    
}

