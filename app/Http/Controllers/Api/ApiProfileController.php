<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class ApiProfileController extends Controller
{
    public function getProfile()
    {
    	$profile = Profile::where('id', 1)->first();

    	if ($profile == null) {
    		return $this->errorJSON("Profile tidak ditemukan", 403);
    	}

    	return $this->successJSON([
    		'profile' => [
    			'name' => $profile->nama,
    			'sejarah_singkat' => $profile->sejarah_singkat,
    			'foto' => $profile->foto != null ? asset('storage/profile/'.$profile->foto) : NULL
    		]
    	]);
    }
}
