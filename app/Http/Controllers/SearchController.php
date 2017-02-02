<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Jual;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
    	$threads  = Thread::search($request->search)->paginate(6);
    	$juals    = Jual::search($request->search)->paginate(6);
    	
    	return view('search.index', compact('threads', 'juals'));
    }
    
}
