<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('gestion',10);
            $table->string('fechahecho', 50);
            $table->string('hora', 50)->nullable();
            $table->string('mesregistro', 50)->nullable();
            $table->string('departamento', 50)->nullable();
            $table->string('provincia', 100)->nullable();
            $table->string('municipio', 100)->nullable();
            $table->string('localidad', 100)->nullable();
            $table->string('zonabarrio', 100)->nullable();
            $table->string('lugarhecho', 100)->nullable();
            $table->string('gps', 100)->nullable();
            $table->string('unidad', 100);
            $table->string('arrestado', 100);
            $table->string('ci', 50)->nullable();
            $table->string('nacido', 100)->nullable();
            $table->string('nacionalidad', 50)->nullable();
            $table->string('edad', 100)->nullable();
            $table->string('genero', 50)->nullable();
            $table->string('temperancia', 50)->nullable();
            $table->string('causaarresto', 150)->nullable();
            $table->string('nathecho', 100)->nullable();
            $table->string('arma', 100)->nullable();
            $table->string('remitidoa', 50)->nullable();
            $table->string('nombres', 100)->nullable();
            $table->string('pertenencias', 100)->nullable();
            
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
        Schema::dropIfExists('records');
    }
}
