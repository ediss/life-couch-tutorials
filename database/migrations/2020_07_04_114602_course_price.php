<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CoursePrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_price', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->string('payment_in_full');
            $table->string('payment_from_foreign_countries');
            $table->string('premium_package');
            $table->date('aplication_to');
            $table->string('aplication_to_and_payfull');
            $table->integer('number_of_rate');
            $table->string('price_in_rate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_price');
    }
}
