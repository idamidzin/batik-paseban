<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
	{
		$user = User::where('username',$request->username)->first();

		if (!$user) 
		{
			return $this->errorJSON("Username tidak ditemukan!",403);
		}

		if (\Hash::check($request->password,$user->password) == false) 
		{
			return $this->errorJSON("Password salah!",403);
		}

		$user->api_token = \Str::random(60);
		// $user->token_fcm = $request->token_fcm;
		$user->save();

		return $this->successJSON([
			'user'=>[
				'hashid'=>$user->hashid,
				'username'=>$user->username,
				'api_token'=>$user->api_token
			]
		]);
	}

	public function updatePIN(Request $request)
	{
		$user = auth()->user();
		$user->pin = $request->pin;
		$user->save();

		return $this->successJSON();
	}

	public function lupaPIN(Request $request){
		$user = User::where('username',$request->username)->first();

		if (!$user) 
		{
			return $this->errorJSON("Username tidak ditemukan!",403);
		}

		if (\Hash::check($request->password,$user->password) == false) 
		{
			return $this->errorJSON("Password salah!",403);
		}

		$user->pin = null;
		$user->save();

		return $this->successJSON([
			'user'=>[
				'hashid'=>$user->hashid,
				'username'=>$user->username,
				'api_token'=>$user->api_token
			]
		]);
	}

	public function cekAuth(Request $request)
	{
		$token = $request->bearerToken();
		$user = User::where('api_token', $token)->first();
        if ($user) 
        {
        	return $this->successJSON();
        }
        return $this->errorJSON("Login tidak valid",403);
	}
}
