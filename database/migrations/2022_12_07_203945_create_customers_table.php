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
        Schema::create('ustomers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cust_no', 50);
            $table->string('custname', 50);
            $table->string('remark', 50);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ustomers');
    }
};
