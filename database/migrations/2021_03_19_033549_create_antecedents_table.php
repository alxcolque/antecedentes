<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedents', function (Blueprint $table) {
            $table->id();
            $table->date('fechahecho');
            $table->string('hora');
            $table->string('mesregistro');
            $table->string('localidad');
            $table->string('zonabarrio');
            $table->string('lugarhecho');
            $table->string('gps');
            $table->string('unidad');
            $table->string('temperancia');
            $table->string('nathecho');
            $table->string('arma');
            $table->string('remitidoa');
            $table->string('pertenencias');
            //municipio
            $table->unsignedBigInteger('municipality_id');
            $table->foreign('municipality_id')->references('id')->on('municipalities')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            //detective
            $table->unsignedBigInteger('detective_id');
            $table->foreign('detective_id')->references('id')->on('detectives')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            //delitos
            $table->unsignedBigInteger('crime_id');
            $table->foreign('crime_id')->references('id')->on('crimes')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            //Fecha Import
            $table->unsignedBigInteger('import_id');
            $table->foreign('import_id')->references('id')->on('imports')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');


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
        Schema::dropIfExists('antecedents');
    }
}
