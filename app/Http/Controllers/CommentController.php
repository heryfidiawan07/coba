<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Thread;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $slug){
    	$thread = Thread::whereSlug($slug)->first();
    	if (!$thread) {
    		return redirect()->to('/threads');
    	}//dd($request->body);
            $time = date('Y-m-d H:i:s');
            $file = $request->file('img');
                if (!empty($file)) {
                    $fileName = $time.'-'.$file->getClientOriginalName();
                    $path     = $file->getRealPath();
                    $img      = Image::make($path)->resize(250, 200);
                    $img->save(public_path("img/comments/". $fileName));
                }else{
                    $fileName = null;
                }
    	Auth::user()->comments()->create([
    		'body' 		=> $request->body,
            'img'       => $fileName,
    		'thread_id'	=> $thread->id,
    	]);
    	return back();//jika ada variable harus petik ""
    }

    public function edit($id){
        $comment = Comment::whereId($id)->first();
        if (!$comment) {
            return redirect('/');
        }
        if (Auth::user()->id == $comment->user_id) {
            return view('comments.edit', compact('comment'));
        }else{
            return redirect('/');
        }
    }

    public function update(CommentRequest $request, $id){
        //dd($id);
        $comment = Comment::whereId($id)->first();
        if (!$comment) {
            return redirect('/');
        }
        if (Auth::user()->id == $comment->user_id) {
            $time = date('Y-m-d H:i:s');
            $file = $request->file('img');
                if (!empty($file)) {
                    $fileName = $time.'-'.$file->getClientOriginalName();
                    $path     = $file->getRealPath();
                    $img      = Image::make($path)->resize(250, 200);
                    $img->save(public_path("img/comments/". $fileName));
                }else{
                    $fileName = null;
                }
            $comment->update([
                'body'      => $request->body,
                'img'       => $fileName,
                'thread_id' => $comment->thread_id,
            ]);
            //$request->session()->flash('status', 'Commentar anda telah di update');
            return redirect()->to("/threads/{$comment->thread->slug}");
        }else{
            return redirect('/');
        }
    }
    
    
    
}
