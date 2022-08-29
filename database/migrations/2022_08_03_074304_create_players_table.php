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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('playername')->nullable();
            $table->string('eplayername')->nullable();
            $table->integer('playerno')->nullable();
            $table->string('playerpos')->nullable();
            $table->string('eplayerpos')->nullable();
            $table->string('playerlink')->nullable();
            $table->string('imglink')->nullable()->nullable(); 
            $table->integer('displayposition')->nullable();
            $table->integer('role')->nullable();
            $table->date('dateofbirth')->nullable();
            $table->string('nationality')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
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
        Schema::dropIfExists('players');
    }
};
