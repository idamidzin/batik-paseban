<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Hashids\Hashids;

class Profile extends Model
{
	protected $table = 'profile';
	protected $fillable = [
		'nama',
		'sejarah_singkat',
		'foto'
	];

	protected $appends = ['hashid'];

	public function getHashIdAttribute()
	{
		return \Hashids::encode( $this->attributes['id'] );
	}
}
