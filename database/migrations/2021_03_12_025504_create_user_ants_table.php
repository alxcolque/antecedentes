<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAntsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_ants', function (Blueprint $table) {
            //$table->id();
            $table->unsignedBigInteger('antecedent_id');
            $table->unsignedBigInteger('user_id');
            $table->index(['antecedent_id', 'user_id']);
            //Antecendentes
            
            $table->foreign('antecedent_id')->references('id')->on('antecedents')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            //user
            
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('user_ants');
    }
}
