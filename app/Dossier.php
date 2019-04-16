<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
	public function patient() 
	{
	    return $this->belongsTo('App\Patient');
	}

	public function ordonnance() 
	{
	    return $this->hasMany('App\Ordonnance');
	}
}
