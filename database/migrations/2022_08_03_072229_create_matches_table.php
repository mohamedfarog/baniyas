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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->integer('opponent_id')->nullable();
            $table->integer('baniyas_score')->nullable();
            $table->integer('opponenet_score')->nullable();
            $table->string('matchtime')->nullable();
            $table->string('armatch_location');
            $table->string('match_location');
            $table->string('competition');
            $table->tinyInteger('homeground')->default(0);
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
        Schema::dropIfExists('matches');
    }
};
