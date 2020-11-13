<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePrice3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_price', function (Blueprint $table) {
            $table->string('payment_from_foreign_countries_in_rate')->nullable();

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
            $table->dropColumn('payment_from_foreign_countries_in_rate');
        });
    }
}
