<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Hashids\Hashids;

class Gallery extends Model
{
	protected $table = 'gallery';
	protected $fillable = [
		'nama',
		'profile_id',
		'foto'
	];

	protected $appends = ['hashid'];

	public function getHashIdAttribute()
	{
		return \Hashids::encode( $this->attributes['id'] );
	}
}
