<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Tag;
use App\Thread;
use Illuminate\Http\Request;
use App\Http\Requests\ThreadRequest;

class ThreadController extends Controller
{
    public function __construct(){
    	$this->middleware('auth', ['except' => ['index', 'show', 'tag']]);
    }

    public function create(){
    	$tags = Tag::all();
    	return view('threads.create', compact('tags'));
    }

    public function store(ThreadRequest $request){
    	 //dd($request->file('img'));
        $thread = Auth::user();
        $file = $request->file('img');
        if (!empty($file)) {
            $fileName = $thread->user_id.'_'.$thread->id.'_'.$file->getClientOriginalName();
            $path     = $file->getRealPath();
            $img      = Image::make($path)->resize(250, 200);
            $img->save(public_path("img/threads/". $fileName));
        }else{
            $fileName = null;
        }
        Auth::user()->threads()->create([
            'title'     => $request->title,
            'img'       => $fileName,
            'body'      => $request->body,
            'slug'      => $slug = str_slug($request->title),
            'tag_id'    => $request->tag_id,
        ]);
        return redirect()->to("/threads/{$slug}");
    }

    public function index(){
        $threads = Thread::latest()->paginate(10);
        $tags    = Tag::all();
        return view('threads.index', compact('threads', 'tags'));
    }

    public function show($slug){
        $thread  = Thread::whereSlug($slug)->first();
        if (!$thread) {
            return redirect()->to('/threads');
        }
        $comments = $thread->comments;
        return view('threads.show', compact('thread', 'comments'));
    }
    
    public function edit($slug){
        $thread = Thread::whereSlug($slug)->first();
        if (!$thread) {
            return redirect()->to('/threads');
        }
        if (Auth::user()->id == $thread->user_id){
            $tags = Tag::all();
            return view('threads.edit', compact('thread', 'tags'));// yaitu di sini => nama pada routes
        }else{
            return redirect()->to('/threads/{slug}');
        }
        
    }

    public function update(ThreadRequest $request, $slug){
        //dd($request->title);
        $thread = Thread::whereSlug($slug)->first();
        if (!$thread) {
            return redirect()->to('/threads');
        }
        if ($request->user()->id == $thread->user_id) {
            $file = $request->file('img');
                if (!empty($file)) {
                    $fileName   = $thread->user_id.'_'.$thread->id.'_'.$file->getClientOriginalName();
                    $path       = $file->getRealPath();
                    $img        = Image::make($path)->resize(250, 200);
                    $img->save(public_path("img/threads/". $fileName));
                }else if (!empty($old = $thread->img)){
                    $fileName = $old;
                }else {
                    $fileName = null;
                }
            $thread->update([
                'title' => $request->title,
                'img'   => $fileName,
                'tag_id'=> $request->tag_id,
                'slug'  => $slug = str_slug($request->title),
                'body'  => $request->body,
            ]);
            return redirect()->to('/threads/'. $slug);
        }else{
            $request->session()->flash('status', 'Apa yang anda lakukan');
            return redirect()->to('/threads');
        }
    }

    public function tag($slug){
        $tag = Tag::whereSlug($slug)->first();
        if (!$tag) {
            return redirect()->to('/threads');
        }
        $tags     = Tag::all();
        $threads = $tag->threads()->latest()->paginate(10);
        return view('threads.index', compact('threads', 'tags'));
    }
    
    public function mine(){
        $threads = Auth::user()->threads()->latest()->paginate(10);
        $tags    = Tag::all();
        return view('threads.index', compact('threads', 'tags'));
    }
    
    
    
    
}
