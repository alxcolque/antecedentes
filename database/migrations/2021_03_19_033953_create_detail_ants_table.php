<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAntsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_ants', function (Blueprint $table) {
            //$table->id();
            $table->unsignedBigInteger('antecedent_id');
            $table->unsignedBigInteger('person_id');
            $table->index(['antecedent_id', 'person_id']);
            //Antecendentes
            
            $table->foreign('antecedent_id')->references('id')->on('antecedents')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            //Person
            
            $table->foreign('person_id')->references('id')->on('people')
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
        Schema::dropIfExists('detail_ants');
    }
}
