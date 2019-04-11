<?php

use Illuminate\Database\Seeder;
use App\Medecin;

class MedecinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$medecin = new Medecin();
    	
    	$medecin->name = 'Medecin';
    	$medecin->email = 'admin@admin.com';
    	$medecin->password = bcrypt('admin');

    	$medecin->save();
    }
}
