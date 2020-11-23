<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hashids\Hashids;

class Batik extends Model
{
	use SoftDeletes;
	
	protected $table = 'batik';
	protected $fillable = [
		'nama',
		'foto',	
		'makna',	
		'motif'
	];

	protected $appends = ['hashid'];

	public function getHashIdAttribute()
	{
		return \Hashids::encode( $this->attributes['id'] );
	}

	public function ProsesBatik() {
		return $this->hasMany( ProsesBatik::class, 'batik_id' )->withTrashed();
	}
}
