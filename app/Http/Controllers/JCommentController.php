<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Jual;
use App\Jcomment;
use Illuminate\Http\Request;
use App\Http\Requests\JCommentRequest;

class JCommentController extends Controller
{
    public function store(JcommentRequest $request, $slug){
    	$jual = Jual::whereSlug($slug)->first();
    	if (!$jual) {
    		return redirect()->to('/fjb');
    	}//dd($request->body);
    		$id   = $jual->id;
            $slug = str_slug($request->title);
            $time = date('Y-m-d H:i:s');
            $file = $request->file('img');
            //dd($file);
                if (empty($file)) {
                    $fileName = null;
                }else{
                    $fileName   = $id.'-'.$time.'-'.$file->getClientOriginalName();
                    $path = $file->getRealPath();
                    $img  = Image::make($path)->resize(250, 200);
                    $img->save(public_path("img/comments/". $fileName));
                }
    	Auth::user()->jcomments()->create([
    		'body' 	  => $request->body,
            'img'     => $fileName,
    		'jual_id' => $jual->id,
    	]);
    	return back();//jika ada variable harus petik ""
    }

    public function edit($id){
        $comment = Jcomment::whereId($id)->first();
        if (!$comment) {
            return redirect('/fjb');
        }
        if (Auth::user()->id == $comment->user_id) {
            return view('jcomments.edit', compact('comment'));
        }else{
            return redirect('/fjb');
        }
    }

    public function update(JCommentRequest $request, $id){
        //dd($id);
        $comment = Jcomment::whereId($id)->first();
        if (!$comment) {
            return redirect('/fjb');
        }
        if (Auth::user()->id == $comment->user_id) {
        	$id = $comment->jual_id;
            $slug = str_slug($request->title);
            $time = date('Y-m-d H:i:s');
            $file = $request->file('img');
            
                if (empty($file)) {
                    $fileName = $comment->img;
                }else{
                    $fileName   = $id.'-'.$time.'-'.$file->getClientOriginalName();
                    $path = $file->getRealPath();
                    $img  = Image::make($path)->resize(250, 200);
                    $img->save(public_path("img/comments/". $fileName));
                }
            $comment->update([
                'body'      => $request->body,
                'img'       => $fileName,
                'jual_id'   => $comment->jual_id,
            ]);
            //$request->session()->flash('status', 'Commentar anda telah di update');
            return redirect()->to("/fjb/{$comment->jual->slug}");
        }else{
            return redirect('/');
        }
    }

}
