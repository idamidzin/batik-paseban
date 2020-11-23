<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hashids\Hashids;

class HasilBatik extends Model
{
    use SoftDeletes;
	
    protected $table = 'hasil_batik';
	protected $fillable = [
		'nama',
		'batik_id',
		'foto'
	];

	protected $appends = ['hashid'];

	public function getHashIdAttribute()
	{
		return \Hashids::encode( $this->attributes['id'] );
	}

	public function Batik()
	{
		return $this->belongsTo( Batik::class, 'batik_id' );
	}
}
