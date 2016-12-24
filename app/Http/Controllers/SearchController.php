<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Thread;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
    	$threads  = Thread::search($request->search)->paginate(10);
    	$tags     = Tag::all();
    	
    	return view('threads.index', compact('threads', 'tags'));
    }
    
}
