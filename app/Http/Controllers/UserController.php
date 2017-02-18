<?php

namespace App\Http\Controllers;

use DB;
use File;
use Image;
use App\User;
use Illuminate\Http\Request;
use Purifier;

class UserController extends Controller
{
    public function editname(Request $request, $id){
        $user = User::whereId($id)->first();
        if ($request->user()->id == $id) {
            $this->validate($request, [
                'edit_name' => 'required|min:3|max:20',
            ]);
            $slugvad  = DB::table('users')->select('slug')->where('slug', str_slug($request->edit_name))->get();
            if(count($slugvad) > 0 ){
                return back()->with('ganti', 'nama sudah ada, ganti nama lain');
            }else{
                $user->update([
                    'name' => Purifier::clean($request->edit_name),
                    'slug' => str_slug($request->edit_name),
                ]);
                return redirect()->to("/{$user->slug}");
            }
        }
    }

    public function status(Request $request, $id){
        $user = User::whereId($id)->first();
        if ($request->user()->id == $id) {
            $this->validate($request, [
                'tentang' => 'required|min:3|max:100',
            ]);
            $user->update([
                'tentang' => Purifier::clean($request->tentang),
            ]);
            return redirect()->to("/{$user->slug}");
        }
    }

    public function editgravatar(Request $request, $id){
    	//dd($request->file('img'));
    	$user = User::whereId($id)->first();
        if ($request->user()->id == $id) {
        	$this->validate($request, [
        		'img' => 'required|image:jpeg,png,gif|max:2500'
        	]);
        	//dd($request->img);//gagal terus melewati validation mimes/img
	        $file = $request->file('img');
	        $from = public_path("img/users/".$user->img );
                if (File::exists($from)) {
                    File::delete($from);
                }
                if($file){
                    $fileName = $user->id.'_fidawadotcom.'.$file->getClientOriginalExtension();
                    $path     = $file->getRealPath();
                    $request->file('img')->move("img/users", $fileName);
                    $user->update([
                       'img' => $fileName,
                    ]);
                }
        	return redirect()->to("/{$user->slug}");
        }
    }
    
    public function member(){
        $members = User::paginate(15);
        return view('user.member', compact('members'));
    }
            

}
