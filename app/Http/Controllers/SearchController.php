<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Thread;
use App\TagJual;
use App\Jual;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
    	$threads  = Thread::search($request->search)->paginate(10);
    	$tags     = Tag::all();
    	$juals    = Jual::search($request->search)->paginate(10);
    	$jtags    = TagJual::all();
    	
    	return view('search.index', compact('threads', 'tags', 'juals', 'jtags'));
    }
    
}
