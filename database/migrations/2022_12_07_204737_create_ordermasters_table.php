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
        Schema::create('ordermasters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('ordertype', 50);
            $table->string('order_no', 50);
            $table->datetime('order_date');
            $table->string('cust_no', 50);
            $table->string('cust_name', 50);
            $table->string('sales_no', 50);
            $table->string('ship_address', 250);
            $table->string('remark', 250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordermasters');
    }
};
