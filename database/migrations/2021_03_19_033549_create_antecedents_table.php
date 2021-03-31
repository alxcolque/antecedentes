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
            $table->date('fechahecho', 100);
            $table->string('hora', 100);
            $table->string('mesregistro', 100);
            $table->string('localidad', 100);
            $table->string('zonabarrio', 100);
            $table->string('lugarhecho', 100);
            $table->string('gps', 100);
            $table->string('unidad', 100);
            $table->string('temperancia', 100);
            $table->string('nathecho', 100);
            $table->string('arma', 100);
            $table->string('remitidoa', 100);
            $table->string('pertenencias', 100);
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
