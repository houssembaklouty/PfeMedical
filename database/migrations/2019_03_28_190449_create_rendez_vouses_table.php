<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRendezVousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendez_vouses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('etat');

            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rendez_vouses', function(Blueprint $table) {
            $table->dropForeign('rendez_vouses_patient_id_foreign');
        });

        Schema::dropIfExists('rendez_vouses');
    }
}
