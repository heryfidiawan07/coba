<?php

namespace App\Http\Controllers;

use Auth;
use App\Jual;
use App\User;
use App\Thread;
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
        $this->middleware('auth', ['except' => ['user', 'index', 'syarat']] );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads     = Thread::latest()->paginate(6);
        $hotsthreads = Thread::has('comments', '>', 0)->paginate(3);
        $newcomments = Thread::has('comments')->latest()->paginate(3);

        $juals        = Jual::latest()->paginate(6);
        $jualsphotos  = Jual::latest()->paginate(3);
        $topjuals     = Jual::has('jcomments', '>', 0)->paginate(3);
        $jualcomments = Jual::has('jcomments')->latest()->paginate(3);

        if (Auth::check()) {
            if (Auth::user()) {
                return view('home', compact('threads', 'newcomments', 'hotsthreads', 'topjuals', 'juals', 'jualcomments', 'jualsphotos'));
            }
        }else{
            return view('welcome', compact('threads', 'newcomments', 'hotsthreads', 'topjuals', 'juals', 'jualcomments', 'jualsphotos'));
        }
    }   

    public function user($name){
        $user    = User::whereName($name)->first();
        if (!$user) {
            return redirect('/');
        }
        $threads = Thread::where('user_id', $user->id)->latest()->paginate(9);
        $juals   = Jual::where('user_id', $user->id)->latest()->paginate(9);
        //dd($user->id);
        return view('user.index', compact('user', 'threads', 'juals'));
    }
    
    public function welcome(){
        return view('welcome');
    }

    public function syarat(){
        return view('user.kebijakan');
    }
    
    
}

