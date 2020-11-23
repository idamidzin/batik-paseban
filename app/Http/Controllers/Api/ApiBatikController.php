<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Batik;
use App\Models\ProsesBatik;
use App\Models\HasilBatik;
use Hashids\Hashids;

class ApiBatikController extends Controller
{
	public function getBatik()
	{

		$batik = Batik::all();

		if ($batik == null) {
			return $this->errorJSON("Data Batik masih kosong !", 403);
		}

		$records = [];
		foreach ($batik as $row) {
			$records[] = (object)[
				'id' => $row->id,
				'nama' => $row->nama,
				'makna' => $row->makna,
				'motif' => $row->motif,
				'foto' => $row->foto != null ? asset('storage/batik/'.$row->foto) : null
			]; 
		}

		return $this->successJSON([
			'batik'=> $records
		]);
	}

	public function getBatikProses(Request $request)
	{
		$proses = ProsesBatik::where('batik_id', $request->batik_id)->get();

		$jumlah_proses = count($proses);

		if ($jumlah_proses > 1) {
			$status_panah = "1";
		}else{
			$status_panah = "0";
		}

		$records = [];
		foreach ($proses as $key => $row) {
			$records[] = (object)[
				'urutan' => $key+1,
				'nama' => $row->nama,
				'status_panah' => $status_panah,
				'foto' => $row->foto != null ? asset('storage/batik_proses/'.$row->foto) : null
			]; 
		}

		return $this->successJSON([
			'batik_proses'=> $records
		]);
	}

	public function getBatikHasil(Request $request)
	{
		$proses = HasilBatik::where('batik_id', $request->batik_id)->get();

		$jumlah_proses = count($proses);

		if ($jumlah_proses > 1) {
			$status_panah = "1";
		}else{
			$status_panah = "0";
		}

		$records = [];
		foreach ($proses as $key => $row) {
			$records[] = (object)[
				'urutan' => $key+1,
				'nama' => $row->nama,
				'status_panah' => $status_panah,
				'foto' => $row->foto != null ? asset('storage/batik_hasil/'.$row->foto) : null
			]; 
		}

		return $this->successJSON([
			'batik_hasil'=> $records
		]);
	}

}
