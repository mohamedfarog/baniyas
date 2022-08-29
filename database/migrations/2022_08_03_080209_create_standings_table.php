<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teamid')->nullable();
            $table->integer('played');
            $table->integer('win');
            $table->integer('draw');
            $table->integer('loss');
            $table->integer('goalsfor');
            $table->integer('goalsagainst');
            $table->integer('goaldiff');
            $table->integer('points');
            $table->string('tourneyname');
            $table->string('groupcup');
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
        Schema::dropIfExists('standings');
    }
};
