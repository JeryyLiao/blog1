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
        Schema::create('cgies', function (Blueprint $table) {
            $table->id();
            //範例是title,因為此處未修改變成subject
            $table->string('subject', 100);
            $table->string('pic', 255)->nullable();
            $table->text('desc')->nullable();
            $table->boolean('enabled')->default(true);
            $table->timestamp('enabled_at')->nullable();
            $table->integer('sort')->default(0);
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
        Schema::dropIfExists('cgies');
    }
};
