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
        Schema::create('article_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained();
            $table->foreignId('tag_id')->constrained();
            $table->string('color')->default();
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
      Schema::table('article_tag', function (Blueprint $table) {
            $table->dropforeign(['article_id']);
            $table->dropforeign(['tag_id']);
      });
        Schema::dropIfExists('article_tag');
    }
};