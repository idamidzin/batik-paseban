<?php

namespace App\Http\Controllers\Batik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HasilBatik;

class HasilBatikController extends Controller
{
	public function store(Request $request)
	{
		$path_foto = null;

		if ($request->hasFile('foto_hasil')) {
			$image      = $request->file('foto_hasil');
			$fileName   = 'foto_hasil-id-'.($request->batik_id+1).uniqid().'.' .$image->getClientOriginalExtension();
			$image->storeAs('/batik_hasil',$fileName,'public');
			$path_foto = $fileName;
		}

		HasilBatik::create([
			'nama' => $request->nama_hasil,
			'foto' => $path_foto,
			'batik_id' => $request->batik_id
		]);

		return back()->with('msg',['type'=>'success','text'=>'Hasil Batik berhasil ditambahkan'])->withInput();
	}

	public function destroy(Request $request)
	{
		HasilBatik::where('id',$request->id)->forceDelete();
		return back()->with('msg',['type'=>'success','text'=>'Hasil Batik berhasil dihapus'])->withInput();
	}

	public function update(Request $request)
	{
		$hasil_batik = HasilBatik::where('id', $request->id)->first();

		$path_foto = $hasil_batik->foto;

		if ($request->hasFile('foto_hasil')) {
			$image      = $request->file('foto_hasil');
			$fileName   = 'foto_hasil-id-'.($hasil_batik->batik_id+1).uniqid().'.' .$image->getClientOriginalExtension();
			$image->storeAs('/batik_hasil',$fileName,'public');
			\File::delete(storage_path('app/public/batik_hasil/'.$hasil_batik->foto));
			$path_foto = $fileName;
		}

		$hasil_batik->nama = $request->nama_hasil;
		$hasil_batik->foto = $path_foto;
		$hasil_batik->update();

		return back()->with('msg',['type'=>'success','text'=>'Hasil Batik berhasil dirubah'])->withInput();
	}
}
