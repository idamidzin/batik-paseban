<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Gallery;

class ProfileController extends Controller
{
    public function index()
    {
    	$profile = Profile::where('id', 1)->first();
        $galeri = Gallery::get();
    	return view('pages.profile.index', compact('profile','galeri'));
    }

    public function update(Request $request, $id)
    {
    	$profile = Profile::where('id', $id)->first();

    	$path_foto = $profile->foto;

		if ($request->hasFile('foto')) {
			$image      = $request->file('foto');
			$fileName   = 'foto-'.uniqid().'.' . $image->getClientOriginalExtension();
			$request->file('foto')->storeAs('/profile',$fileName,'public');
			\File::delete(storage_path('app/public/profile/'.$profile->foto));
			$path_foto = $fileName;
		}

    	Profile::where('id',$id)->update([
    		'nama' => $request->name,
    		'sejarah_singkat' => $request->sejarah,
            'foto' => $path_foto
    	]);

    	return back()->with('msg',['type'=>'success','text'=>'Profile Berhasil Di perbaharui!'])->withInput();
    }
}
