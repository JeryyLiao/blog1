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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('isvalid');
            $table->string('emp_no', 50);
            $table->string('emp_name', 50);
            $table->string('gender_code', 50);
            $table->string('dept_no', 50);
            $table->string('title_no', 50);
            $table->dateTime('birthday');
            $table->datetime('onboard_date');
            $table->datetime('leave_date');
            $table->string('contact_email');
            $table->string('contact_tel', 50);
            $table->string('contact_address', 250);
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
        Schema::dropIfExists('employees');
    }
};