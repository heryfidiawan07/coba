<?php

namespace App\Http\Controllers;

use File;
use Image;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function editname(Request $request, $id){
        $user = User::whereId($id)->first();
        if ($request->user()->id == $id) {
            $this->validate($request, [
                'edit_name' => 'required|min:3|max:20',
            ]);
            $user->update([
                'name' => $request->edit_name,
            ]);
            return redirect()->to("/{$user->name}");
        }
    }

    public function editgravatar(Request $request, $id){
    	//dd($request->file('img'));
    	$user = User::whereId($id)->first();
        if ($request->user()->id == $id) {
        	$this->validate($request, [
        		'img' => 'required|image:jpg,png,gif|max:2500'
        	]);
        	//dd($request->img);//gagal terus melewati validation mimes/img
        	$time = date('Y-m-d H:i:s');
	        $file = $request->file('img');
	        $from = public_path("img/users/".$user->img );
                if (File::exists($from)) {//belum ketemu
                    File::delete($from);
                }
                if($file){
                    $fileName = $user->id.'-'.$time.'-'.$file->getClientOriginalName();
                    $path     = $file->getRealPath();
                    $img      = Image::make($path)->resize(150, 150);
                    $img->save(public_path("img/users/". $fileName));
                    $user->update([
                       'img' => $fileName,
                    ]);
                }
        	return redirect()->to("/{$user->name}");
        }
    }
    

}
