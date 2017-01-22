<?php

namespace App\Http\Controllers;

use Auth;
use App\Tag;
use App\User;
use App\TagJual;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function __construct(){
  	$this->middleware('admin');
  }
  
  public function index(){
    $tags     = Tag::all();
    $users    = User::all();
    $jtags = TagJual::all();
  	return view('admin.index', compact('tags', 'users', 'jtags'));
  }

  public function tagStore(Request $request){
    $this->validate($request, [
      'tag_name'   => 'required|min:3',
    ]);

  	$tags = new Tag;
    $tags->name     = $request->tag_name;
    $tags->slug     = str_slug($request->tag_name);
    $tags->save();

  	$request->session()->flash('message', 'Tags baru telah di tambahkan');
  	return back();
  }

  public function tagUpdate(Request $request ,$id){
    $this->validate($request, [
      'tag_edit'   => 'required',
    ]);

    $tags = Tag::find($id);
    $tags->name = $request->tag_edit;
    $tags->slug     = str_slug($request->tag_edit);
    $tags->save();

    $request->session()->flash('message', 'Tags berhasil di edit');
    return back()->with('tags', $tags);
  }

  public function tagDestroy(Request $request ,$id){
    Tag::destroy($id);
    $request->session()->flash('message', 'Tags berhasil di hapus');
    return back();
  }
  
  public function tagJualStore(Request $request){
    $this->validate($request, [
      'tag_jual' => 'required|min:3',
    ]);

    $tags = new TagJual;
    $tags->name     = $request->tag_jual;
    $tags->slug     = str_slug($request->tag_jual);
    $tags->save();

    $request->session()->flash('message', 'Tags baru telah di tambahkan');
    return back();
  }

  public function tagJualUpdate(Request $request ,$id){
    $this->validate($request, [
      'jtag_edit'   => 'required',
    ]);

    $tags = TagJual::find($id);
    $tags->name = $request->jtag_edit;
    $tags->slug = str_slug($request->jtag_edit);
    $tags->save();

    $request->session()->flash('message', 'Tags berhasil di edit');
    return back()->with('tags', $tags);
  }

  public function tagJualDestroy(Request $request ,$id){
    TagJual::destroy($id);
    $request->session()->flash('message', 'Tags berhasil di hapus');
    return back();
  }

  public function dluser($id){
    $user = User::find($id);
    $user->delete();
    return back();
  }
  
  
}
