<?php

namespace App\Http\Controllers;

use File;
use Auth;
use Image;
use App\Tag;
use App\Thread;
use Illuminate\Http\Request;
use App\Http\Requests\ThreadRequest;
use DB;
use Purifier;

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
        $slugvad  = DB::table('threads')->select('slug')->where('slug', str_slug($request->title))->get();
        if(count($slugvad) > 0 ){
            return back()->with('ganti', 'judul sudah ada, ganti judul lain');
        }
        $user   = Auth::user();
        $file   = $request->file('img');
        $time   = date('Y-m-d_H-i-s');
        if (!empty($file)) {
            $ex = $file->getClientOriginalExtension();
            $fileName = $user->id.'_'.$time.'_fidawa.'.$ex;
            $path     = $file->getRealPath();
            $img      = Image::make($path)->resize(600, 315);
            $img->save(public_path("img/threads/". $fileName));
        }else{
            $fileName = null;
        }
        Auth::user()->threads()->create([
            'title'     => Purifier::clean($request->title),
            'img'       => $fileName,
            'body'      => Purifier::clean($request->body, array('Attr.EnableID' => true)),
            'slug'      => $slug = str_slug($request->title),
            'tag_id'    => $request->tag_id,
        ]);
        return redirect()->to("/threads/{$slug}");
    }

    public function index(){
        $threads      = Thread::where('img', null)->latest()->paginate(3);
        $threadsphoto = Thread::where('img', '!=', null)->latest()->paginate(6);
        return view('threads.index', compact('threads', 'threadsphoto'));
    }

    public function show($slug){
        $thread  = Thread::whereSlug($slug)->first();
        if (!$thread) {
            return redirect()->to('/threads');
        }
        $comments = $thread->comments()->latest()->paginate(5);
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
            $time = date('Y-m-d_H-i-s');
            $from = public_path("img/threads/".$thread->img );
                if (!empty($file)) {
                    if (File::exists($from)) {
                        File::delete($from);
                    }
                    $ex = $file->getClientOriginalExtension();
                    $fileName   = $thread->user_id.'_'.$time.'_fidawa.'.$ex;
                    $path       = $file->getRealPath();
                    $img        = Image::make($path)->resize(600, 315);
                    $img->save(public_path("img/threads/". $fileName));
                }else if($thread->img != null) {
                    $fileName = $thread->img;
                }else{
                    $fileName = null;
                }
            $thread->update([
                'title' => Purifier::clean($request->title),
                'img'   => $fileName,
                'tag_id'=> $request->tag_id,
                'slug'  => $slug = str_slug($request->title),
                'body'  => Purifier::clean($request->body, array('Attr.EnableID' => true)),
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
        $threads      = $tag->threads()->where('img', null)->latest()->paginate(3);
        $threadsphoto = $tag->threads()->where('img', '!=', null)->latest()->paginate(6);
        return view('threads.index', compact('threads', 'threadsphoto'));
    }
    
    public function mine(){
        $threads      = Auth::user()->threads()->where('img', null)->latest()->paginate(3);
        $threadsphoto = Auth::user()->threads()->where('img', '!=', null)->latest()->paginate(6);
        return view('threads.index', compact('threads', 'threadsphoto'));
    }
    
}
