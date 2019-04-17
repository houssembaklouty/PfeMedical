<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
	protected $fillable = [
	    'patient_id', 'date', 'temps',
	];

	public function patient() 
	{
	    return $this->belongsTo('App\Patient');
	}
}
