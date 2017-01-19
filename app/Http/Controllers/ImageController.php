<?php

namespace App\Http\Controllers;

use File;
use App\Thread;
use App\Galery;
use App\Comment;
use App\Jcomment;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }
    
    public function destroy($id){
    	$galery = Galery::find($id);
    	$path 	= public_path("img/fjb/".$galery->img );
    	if (File::exists($path)) {
    		File::delete($path);
    		Galery::destroy($id);
    	}
    	return response()->json($galery);
    }

    public function destroyimgcomment($id){
        $imgc = Jcomment::find($id);
        $path   = public_path("img/comments/".$imgc->img );
        if (File::exists($path)) {
            File::delete($path);
            $imgc->img = null;
            $imgc->save();
        }
        return response()->json($imgc);
    }

    public function destroyimgthreads($id){
        $thread = Thread::find($id);
        $path   = public_path("img/threads/".$thread->img );
        if (File::exists($path)) {
            File::delete($path);
            $thread->img = null;
            $thread->save();
        }
        return response()->json($thread);
    }
    
    public function deleteimgcomment($id){
        $comment = Comment::find($id);
        $path   = public_path("img/comments/".$comment->img );
        if (File::exists($path)) {
            File::delete($path);
            $comment->img = null;
            $comment->save();
        }
        return response()->json($comment);
    }
    
}
