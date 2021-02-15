<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumns2ForCoursePrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_price', function (Blueprint $table) {
            $table->string('weekly_srb_price')->nullable();
            $table->string('monthly_srb_price')->nullable();
            $table->string('weekly_foreign_price')->nullable();
            $table->string('monthly_foreign_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_price', function (Blueprint $table) {
            $table->dropColumn('weekly_srb_price');
            $table->dropColumn('monthly_srb_price');
            $table->dropColumn('weekly_foreign_price');
            $table->dropColumn('monthly_foreign_price');
        });
    }
}
