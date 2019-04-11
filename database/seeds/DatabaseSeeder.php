<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MedecinTableSeeder::class);

        $Patient = factory(App\Patient::class, 10)->create();
    }
}
