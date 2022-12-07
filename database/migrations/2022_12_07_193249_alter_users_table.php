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
        Schema::table('users', function (Blueprint $table) {
            $table->string('fb_id', 10)->nullable();
            $table->datetime('birthday')->nullable();
            $table->string('sexual', 5)->nullable();
            $table->string('phone', 13)->nullable();
            $table->string('address', 100)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('fb_id');
            $table->dropColumn('birthday');
            $table->dropColumn('sexual');
            $table->dropColumn('phone');
            $table->dropColumn('address');

        });

    }
};