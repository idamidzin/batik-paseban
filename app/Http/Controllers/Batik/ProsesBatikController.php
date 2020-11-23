<?php

namespace App\Http\Controllers\Batik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProsesBatik;

class ProsesBatikController extends Controller
{
	public function store(Request $request)
	{
		$path_foto = null;

		if ($request->hasFile('foto_proses')) {
			$image      = $request->file('foto_proses');
			$fileName   = 'foto_proses-id-'.($request->batik_id+1).uniqid().'.' .$image->getClientOriginalExtension();
			$image->storeAs('/batik_proses',$fileName,'public');
			$path_foto = $fileName;
		}

		ProsesBatik::create([
			'nama' => $request->nama_proses,
			'foto' => $path_foto,
			'batik_id' => $request->batik_id
		]);

		return back()->with('msg',['type'=>'success','text'=>'Proses Batik berhasil ditambahkan'])->withInput();
	}

	public function destroy(Request $request)
	{
		ProsesBatik::where('id',$request->id)->forceDelete();
		return back()->with('msg',['type'=>'success','text'=>'Proses Batik berhasil dihapus'])->withInput();
	}

	public function update(Request $request)
	{
		$proses_batik = ProsesBatik::where('id', $request->id)->first();

		$path_foto = $proses_batik->foto;

		if ($request->hasFile('foto_proses')) {
			$image      = $request->file('foto_proses');
			$fileName   = 'foto_proses-id-'.($proses_batik->batik_id+1).uniqid().'.' .$image->getClientOriginalExtension();
			$image->storeAs('/batik_proses',$fileName,'public');
			\File::delete(storage_path('app/public/batik_proses/'.$proses_batik->foto));
			$path_foto = $fileName;
		}

		$proses_batik->nama = $request->nama_proses;
		$proses_batik->foto = $path_foto;
		$proses_batik->update();

		return back()->with('msg',['type'=>'success','text'=>'Proses Batik berhasil dirubah'])->withInput();
	}
}
