<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capteur extends Model
{

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	    'type'
	];

	public function mesure() 
	{
	    return $this->belongsTo('App\Mesure');
	}

	public function patient() 
	{
	    return $this->belongsTo('App\Patient');
	}
}
