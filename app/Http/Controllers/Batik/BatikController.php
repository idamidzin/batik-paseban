<?php

namespace App\Http\Controllers\Batik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Batik;
use App\Models\ProsesBatik;
use App\Models\HasilBatik;

class BatikController extends Controller
{
	public function index(Request $request)
	{
		$is_trash = $request->get('status') == 'trash';

		$records = Batik::query();
		$batik_count = $records->count();

		$trashes = Batik::onlyTrashed()->orderBy('deleted_at','desc');
		$trash_count = $trashes->count();
		$records = $is_trash ? $trashes->get() : $records->get();

		return view('pages.batik.index',compact('records','is_trash','batik_count','trash_count'));
	}

	public function create()
	{
		return view('pages.batik.create');
	}

	public function store(Request $request)
	{
		$path_foto = null;

		if ($request->hasFile('foto')) {
			$image      = $request->file('foto');
			$fileName   = 'batik -'.uniqid().'.' .$image->getClientOriginalExtension();
			$request->file('foto')->storeAs('/batik',$fileName,'public');
			$path_foto = $fileName;
		}

		$batik = Batik::create([
			'nama' => $request->nama,
			'foto' => $path_foto,
			'makna' => $request->makna,
			'motif' => $request->motif,
		]);


		$jml_proses = count($request->foto_proses);
		$data = [];
		if ($request->hasFile('foto_proses')) {
			for ($i=0; $i < $jml_proses ; $i++) {  
				$image      = $request->file('foto_proses');
				$fileName   = 'foto_proses-id-'.($batik->id+$i+1).uniqid().'.' .$image[$i]->getClientOriginalExtension();
				$image[$i]->storeAs('/batik_proses',$fileName,'public');
				$foto_proses[$i] = $fileName;
				ProsesBatik::create([
					'nama' => $request->nama_proses[$i],
					'batik_id' => $batik->id,
					'foto' => $foto_proses[$i],
				]);
			}
		}

		$jml_hasil = count($request->foto_hasil);
		$data = [];
		if ($request->hasFile('foto_hasil')) {
			for ($i=0; $i < $jml_hasil ; $i++) {  
				$image      = $request->file('foto_hasil');
				$fileName   = 'foto_hasil-id-'.($batik->id+$i+1).uniqid().'.' .$image[$i]->getClientOriginalExtension();
				$image[$i]->storeAs('/batik_hasil',$fileName,'public');
				$foto_hasil[$i] = $fileName;
				HasilBatik::create([
					'nama' => $request->nama_hasil[$i],
					'batik_id' => $batik->id,
					'foto' => $foto_hasil[$i],
				]);
			}
		}

		return redirect()->route('batik.index')->with('msg',['type'=>'success','text'=>'Batik berhasil ditambahkan!']);

	}

	public function edit($id)
	{
		$batik = Batik::where('id', $id)->first();
		$proses_batik = ProsesBatik::where('batik_id', $id)->get();
		$hasil_batik = HasilBatik::where('batik_id', $id)->get();
		return view('pages.batik.edit', compact('batik','proses_batik','hasil_batik'));
	}

	public function update(Request $request, $id)
	{
		$batik = Batik::where('id', $id)->first();
		$path_foto = $batik->foto;

		if ($request->hasFile('foto')) {
			$image      = $request->file('foto');
			$fileName   = 'batik -'.uniqid().'.' .$image->getClientOriginalExtension();
			$request->file('foto')->storeAs('/batik',$fileName,'public');
			\File::delete(storage_path('app/public/batik/'.$batik->foto));
			$path_foto = $fileName;
		}

		$batik->nama = $request->nama;
		$batik->foto = $path_foto;
		$batik->makna = $request->makna;
		$batik->motif = $request->motif;
		$batik->update();

		return redirect()->route('batik.index')->with('msg',['type'=>'success','text'=>'Batik berhasil di Update!']);
	}

	public function delete($id)
	{
		Batik::where('id',$id)->delete();
		return redirect()->route('batik.index')->with('msg',['type'=>'success','text'=>'Batik berhasil dihapus!']);
	}

	public function destroy($id)
	{
		Batik::where('id',$id)->forceDelete();
		return redirect()->route('batik.index')->with('msg',['type'=>'success','text'=>'Batik berhasil dihapus!']);
	}

	public function restore($id)
	{
		Batik::where('id',$id)->restore();
		return redirect()->route('batik.index')->with('msg',['type'=>'success','text'=>'Batik berhasil direstore!']);
	}
}
