<?php

namespace App\Http\Controllers;

use File;
use Auth;
use Image;
use App\Jual;
use App\Jcomment;
use Illuminate\Http\Request;
use App\Http\Requests\JCommentRequest;
use Purifier;

class JCommentController extends Controller
{
    public function store(JcommentRequest $request, $slug){
    	$jual = Jual::whereSlug($slug)->first();
    	if (!$jual) {
    		return redirect()->to('/fjb');
    	}//dd($request->body);
    		$id   = $jual->id;
            $time = date('Y-m-d_H-i-s');
            $file = $request->file('img');
            //dd($file);
                if (!empty($file)) {
                    $fileName = $id.'_'.$time.'_fidawadotcom_'.$file->getClientOriginalName();
                    $path     = $file->getRealPath();
                    $img      = Image::make($path)->resize(250, 200);
                    $img->save(public_path("img/jcomments/". $fileName));
                }else{
                    $fileName = null;
                }
    	Auth::user()->jcomments()->create([
    		'body' 	  => Purifier::clean($request->body),
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
        	$id   = $comment->jual_id;
            $time = date('Y-m-d_H-i-s');
            $file = $request->file('img');
            $from = public_path("img/jcomments/".$comment->img );
                if (!empty($file)) {
                    if (File::exists($from)) {
                        File::delete($from);
                    }
                    $fileName = $id.'_'.$time.'_fidawadotcom_'.$file->getClientOriginalName();
                    $path     = $file->getRealPath();
                    $img      = Image::make($path)->resize(250, 200);
                    $img->save(public_path("img/jcomments/". $fileName));
                }else if($comment->img != null){
                    $fileName = $comment->img;
                }else{
                    $fileName = null;
                }
            $comment->update([
                'body'      => Purifier::clean($request->body),
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
