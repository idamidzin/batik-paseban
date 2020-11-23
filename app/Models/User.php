<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hashids\Hashids;

class User extends Authenticatable
{
	use Notifiable,SoftDeletes;
	
	protected $table = 'users';
	protected $fillable = [
		'nama',
		'username',
		'password',
		'email',
		'sentra_id',
		'api_token',
		'role'
	];

	protected $appends = ['hashid'];

	public function getHashIdAttribute()
	{
		return \Hashids::encode( $this->attributes['id'] );
	}

	protected $hidden = [
		'password', 'remember_token','api_token'
	];

	public function SentraBatik() {
		return $this->belongsTo( SentraBatik::class, 'sentra_id' );
	}
}
