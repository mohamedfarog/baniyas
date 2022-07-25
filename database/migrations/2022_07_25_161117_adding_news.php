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
        Schema::create('news', function (Blueprint $table) {
            $table->increments("newsid");
            $table->string("newstitle");
            $table->string("news_e_title");
            $table->unsignedBigInteger("newscategory");
            $table->dateTime("newsdate")->useCurrent();
            $table->string("newsimages")->default("baniyaslogo.png");
            $table->string("newsbody");
            $table->string("news_e_body");
            $table->string("addonimages")->nullable();
            $table->string("extra")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
