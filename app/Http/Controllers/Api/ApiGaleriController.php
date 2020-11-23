<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class ApiGaleriController extends Controller
{
    public function getGaleri()
    {
    	$galeri = Gallery::get();
    	$records = [];
    	foreach ($galeri as $row) {
    		$records[] = [
    			'nama' => $row->nama,
    			'foto' => asset('storage/galeri/'.$row->foto)
    		];
    	}

    	return $this->successJSON([
    		'galeri' => $records
    	]);
    }
}
