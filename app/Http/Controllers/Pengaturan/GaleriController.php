<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GaleriController extends Controller
{
	public function store(Request $request)
	{
		$path_foto = null;

		if ($request->hasFile('foto')) {
			$image      = $request->file('foto');
			$fileName   = 'foto-id-'.($request->profile_id+1).uniqid().'.' .$image->getClientOriginalExtension();
			$image->storeAs('/galeri',$fileName,'public');
			$path_foto = $fileName;
		}

		Gallery::create([
			'nama' => $request->nama,
			'foto' => $path_foto,
			'profile_id' => $request->profile_id
		]);

		return back()->with('msg',['type'=>'success','text'=>'Galeri berhasil ditambahkan'])->withInput();
	}

	public function destroy(Request $request)
	{
		Gallery::where('id',$request->id)->forceDelete();
		return back()->with('msg',['type'=>'success','text'=>'Galeri berhasil dihapus'])->withInput();
	}

	public function update(Request $request)
	{
		$galeri = Gallery::where('id', $request->id)->first();

		$path_foto = $galeri->foto;

		if ($request->hasFile('foto')) {
			$image      = $request->file('foto');
			$fileName   = 'foto-id-'.($galeri->profile_id+1).uniqid().'.' .$image->getClientOriginalExtension();
			$image->storeAs('/galeri',$fileName,'public');
			\File::delete(storage_path('app/public/galeri/'.$galeri->foto));
			$path_foto = $fileName;
		}

		$galeri->nama = $request->nama;
		$galeri->foto = $path_foto;
		$galeri->update();

		return back()->with('msg',['type'=>'success','text'=>'Galeri berhasil dirubah'])->withInput();
	}
}
