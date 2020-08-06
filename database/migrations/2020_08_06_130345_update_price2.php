<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePrice2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_price', function (Blueprint $table) {
            $table->integer('course_id')->nullable()->change();
            $table->string('payment_in_full')->nullable()->change();
            $table->string('payment_from_foreign_countries')->nullable()->change();
            $table->string('premium_package')->nullable()->change();
            $table->date('aplication_to')->nullable()->change();
            $table->string('aplication_to_and_payfull')->nullable()->change();
            $table->integer('number_of_rate')->nullable()->change();
            $table->string('price_in_rate')->nullable()->change();
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
            $table->dropColumn(['course_id', 'payment_in_full', 'payment_from_foreign_countries', 'premium_package', 'aplication_to','aplication_to_and_payfull','number_of_rate','price_in_rate']);

        });
    }
}
