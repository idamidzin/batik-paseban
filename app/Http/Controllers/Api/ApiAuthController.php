<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ApiAuthController extends Controller
{
	public function login(Request $request)
	{
		$user = User::where('email', $request->email)->first();
		if (!$user) {
			return $this->errorJSON("Email tidak ditemukan!",403);
		}

		if (\Hash::check($request->password,$user->password) == false) 
		{
			return $this->errorJSON("Password salah!",403);
		}

		$user->api_token = \Str::random(60);
		$user->save();

		return $this->successJSON([
			'user'=>[
				'id'=>$user->id,
				'nama'=>$user->nama,
				'email'=>$user->email,
				'token'=>$user->api_token
			]
		]);
	}

	public function loginGoogle(Request $request)
	{
		$user = User::where('email', $request->email)->first();


		if (!$user) {
			$api_token = \Str::random(60);

			User::create([
				'nama' => $request->nama,
				'email' => $request->email,
				'username' => $request->nama,
				'role' => "3",
				'api_token' => $api_token,
			]);

			$user = User::where('email', $request->email)->first();

			return $this->successJSON([
				'user'=>[
					'id'=>$user->id,
					'nama'=>$user->nama,
					'email'=>$user->email,
					'token'=>$user->api_token,
				]
			]);

		}else{

			$user->api_token = \Str::random(60);
			$user->save();

			return $this->successJSON([
				'user'=>[
					'id'=>$user->id,
					'nama'=>$user->nama,
					'email'=>$user->email,
					'token'=>$user->api_token
				]
			]);
		}
	}

	public function cekAuth(Request $request)
	{
		$token = $request->bearerToken();
		$user = User::where('api_token', $token)->first();
		if ($user) 
		{
			// dd($token);
			return $this->successJSON();
		}
		return $this->errorJSON("Login tidak valid",403);
	}
}
