<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capteur extends Model
{
	public function mesure() 
	{
	    return $this->belongsTo('App\Mesure');
	}
}
