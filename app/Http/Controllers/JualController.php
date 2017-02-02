<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Jual;
use App\Galery;
use App\TagJual;
use App\Comment;
use App\Jcomment;
use Illuminate\Http\Request;
use App\Http\Requests\EditJual;
use App\Http\Requests\JualRequest;

class JualController extends Controller
{		
	public function __construct(){
		$this->middleware('auth', ['except' => ['index', 'show', 'tag']]);
	}
	
	public function index(){
        $juals        = Jual::latest()->paginate(3);
        $jualsphotos  = Jual::whereHas('galery',
                            function ($query) {
                                $query->where('jual_id', '!=', null);
                            })->latest()->paginate(6);
		return view('fjb.index', compact('jualsphotos', 'juals'));
	}		

    public function create(){
    	$jtags = TagJual::all();
    	return view('fjb.create', compact('jtags'));
    }

    public function show($slug){
        $jual = Jual::whereSlug($slug)->first();
        if(!$jual){
            return redirect()->to('/fjb');
        }
	   $jcomments = $jual->jcomments()->latest()->paginate(5);
	   return view('fjb.show', compact('jual', 'jcomments'));
    }
    
    public function store(JualRequest $request){
        if (count($request->file('img')) <= 4) {
            $slug = str_slug($request->title);
            $jual = Auth::user()->juals()->create([
                'title'       => $request->title,
                'deskripsi'   => $request->deskripsi,
                'slug'        => $slug,
                'tag_id'      => $request->tag_id,
                'hargaNormal' => $request->hargaNormal,
                'diskon'      => $request->diskon,
            ]);
            $time = date('Y-m-d_H-i-s');
            $files   = $request->file('img');
            if (!empty($files)) {
            	foreach ($files as $file) {
                    $ex = $file->getClientOriginalExtension();
                	$fileName = $jual->user_id.'_'.$jual->id.'_'.$time.'_'.pathinfo($file, PATHINFO_FILENAME).'.'.$ex;
                    $path     = $file->getRealPath();
                    $img      = Image::make($path)->resize(600, 315);
                    $img->save(public_path("img/fjb/". $fileName));

                    $galeries = new Galery;
                    $galeries->img     = $fileName;
                    $galeries->jual_id = $jual->id;
                    $galeries->save();
            	} 
            }
            return redirect()->to("/fjb/{$slug}");
        }else{
            return back()->with('message', 'max 4 files');
      }
    }

    public function edit($slug){
        $jual = Jual::whereSlug($slug)->first();
        if (!$jual) {
            return redirect()->to('/fjb');
        }
        if (Auth::user()->id == $jual->user_id){
            $jtags = TagJual::all();
            return view('fjb.edit', compact('jual', 'jtags'));
        }else{
            return redirect()->to('/fjb/{slug}');
        }
    }

    public function update(JualRequest $request, $slug){
        $jual = Jual::whereSlug($slug)->first();
        if (!$jual) {
            return redirect()->to('/fjb');
        }
        $jml = 4 - count($jual->galery);
        if (count($request->file('img')) > $jml) {
            return back()->with('message', 'max 4 images');
        }else{
            $slug = str_slug($request->title);
            if ($request->user()->id == $jual->user_id) {
                $jual->update([
                    'title'       => $request->title,
                    'tag_id'      => $request->tag_id,
                    'slug'        => $slug,
                    'deskripsi'   => $request->deskripsi,
                    'hargaNormal' => $request->hargaNormal,
                    'diskon'      => $request->diskon,
                ]);
                $time = date('Y-m-d_H-i-s');
                $files = $request->file('img');
                $id = $jual->user_id;
                if (!empty($files)) {
                    foreach ($files as $file) {
                        $ex = $file->getClientOriginalExtension();
                        $fileName =  $id.'_'.$jual->id.'_'.$time.'_'.pathinfo($file, PATHINFO_FILENAME).'.'.$ex;
                        $path     = $file->getRealPath();
                        $img      = Image::make($path)->resize(600, 315);
                        $img->save(public_path("img/fjb/". $fileName));
                        //save to Galery
                        $galery = new Galery;
                        $galery->img      = $fileName;
                        $galery->jual_id  = $jual->id;
                        $galery->save();
                    }
                }
              return redirect()->to("/fjb/". $slug);  
            }else{
                $request->session()->flash('status', 'Apa yang anda lakukan');
                return redirect()->to('/fjb');
            }
        }
    }

    public function tag($slug){ 
        $tag = TagJual::whereSlug($slug)->first();
        if (!$tag) {
            return redirect()->to('/fjb');
        }
        //$juals = Jual::where('tag_id',$tag->id)->latest()->paginate(9); //eroorrrrrr============
        $jualsphotos  = Jual::where('tag_id',$tag->id)->whereHas('galery',
                            function ($query) {
                                $query->where('jual_id', '!=', null);
                            })->latest()->paginate(6);
        //dd($juals);
        return view('fjb.index', compact('jualsphotos'));
    }
    
    public function minejual(){
        //$juals = Auth::user()->juals()->latest()->paginate(9);
        $jualsphotos  = Auth::user()->juals()->whereHas('galery',
                            function ($query) {
                                $query->where('jual_id', '!=', null);
                            })->latest()->paginate(6);
        return view('fjb.index', compact('jualsphotos'));
    }
    
}