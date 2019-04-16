<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
	protected $fillable = [
	    'dossier_id', 'patient_id', 'description',
	];

	public function patient() 
	{
	    return $this->belongsTo('App\Patient', 'patient_id');
	}
	
	public function dossier() 
	{
	    return $this->belongsTo('App\Dossier');
	}
}
