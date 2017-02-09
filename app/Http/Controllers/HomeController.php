<?php

namespace App\Http\Controllers;

use Auth;
use App\Jual;
use App\User;
use App\Thread;
use Illuminate\Http\Request;
use DB;

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
        $threads      = Thread::where('img', null)->latest()->paginate(3);
        $threadsphoto = Thread::where('img', '!=', null)->latest()->paginate(6);
        $newcomments  = Thread::has('comments', '>', 0)->paginate(3);

        $juals        = Jual::has('galery',0)->latest()->paginate(3);
        $jualsphotos  = Jual::whereHas('galery',
                            function ($query) {
                                $query->where('jual_id', '!=', null);
                            })->latest()->paginate(6);
        $jualcomments = Jual::has('jcomments', '>', 0)->paginate(3);

        if (Auth::check()) {
            if (Auth::user()) {
                return view('home', compact('threads', 'newcomments', 'juals', 'jualcomments', 'jualsphotos', 'threadsphoto'));
            }
        }else{
            return view('welcome', compact('threadsphoto', 'jualsphotos'));
        }
    }   

    public function user($slug){
        $user    = User::whereSlug($slug)->first();
        if (!$user) {
            return redirect('/');
        }
        $threads      = Thread::where(['img' => null, 'user_id'=> $user->id])->latest()->paginate(3);
        $threadsphoto = Thread::where([['img', '!=', null], ['user_id', '=', $user->id]])->latest()->paginate(3);
        $juals        = Jual::where('user_id', $user->id)->has('galery',0)->latest()->paginate(3);//dd($juals);
        $jualsphotos  = Jual::where('user_id', $user->id)->whereHas('galery',
                            function ($query) {
                                $query->where('jual_id', '!=', null);
                            })->latest()->paginate(3);
        //dd($user->id);
        return view('user.index', compact('user', 'threads', 'juals', 'threadsphoto', 'jualsphotos'));
    }
    
    public function welcome(){
        return view('welcome');
    }

    public function syarat(){
        return view('user.kebijakan');
    }
    
    
}

