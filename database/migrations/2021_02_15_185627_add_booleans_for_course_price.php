<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBooleansForCoursePrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_price', function (Blueprint $table) {
            $table->string('weekly_srb')->nullable();
            $table->string('monthly_srb')->nullable();
            $table->string('weekly_foreign')->nullable();
            $table->string('monthly_foreign')->nullable();
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
            $table->dropColumn('weekly_srb');
            $table->dropColumn('monthly_srb');
            $table->dropColumn('weekly_foreign');
            $table->dropColumn('monthly_foreign');
        });
    }
}
