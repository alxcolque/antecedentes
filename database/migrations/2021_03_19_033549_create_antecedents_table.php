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
            $table->bigIncrements('id');
            $table->string('gestion',10);
            $table->string('fechahecho', 100)->nullable();
            $table->string('hora', 100)->nullable();
            $table->string('mesregistro', 100)->nullable();
            $table->string('municipio', 100)->nullable();
            $table->string('localidad', 100)->nullable();
            $table->string('zonabarrio', 100)->nullable();
            $table->string('lugarhecho', 100)->nullable();
            $table->string('gps', 100)->nullable();
            $table->string('unidad', 100)->nullable();
            $table->string('temperancia', 100)->nullable();
            $table->string('nathecho', 100)->nullable();
            $table->string('arma', 100)->nullable();
            $table->string('remitidoa', 100)->nullable();
            $table->string('pertenencias', 100)->nullable();
            //province
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provinces')
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
            
            //import
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
