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
        Schema::create('hostel_booking', function (Blueprint $table) {
            $table->id();
            $table->string('tanent name');
            $table->string('tanent gender');
            $table->integer('tanent age');
            $table->string('tanent occupation');
            $table->string('tanent id number');
            $table->string('tanent email');
            $table->string('tanent mobile number');
            $table->string('tanent address');
            $table->string('tanent nationality');
            $table->string('tanent deposit');
            $table->integer('tanent room number');
            $table->string('tanent room type');
            $table->string('tanent room price per month');
            $table->string('tanent room status');
            $table->string('tanent room check in date');
            $table->string('tanent room check out date');
            $table->string('tanent room booking payment status');
            $table->string('tanent room booking payment amount');
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
        Schema::dropIfExists('hostel_booking');
    }
};
