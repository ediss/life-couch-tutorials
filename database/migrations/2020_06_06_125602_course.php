<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Course extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('intro_url');
            $table->text('course_url');
            $table->boolean('purchased')->default(0); //how many people bought course
            $table->longText('description');
            $table->longText('plan_and_program');
            $table->longText('course_content');
            $table->longText('course_organisation');
            $table->date('course_available');
            $table->timestamp('course_available_ts')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course');
    }
}
