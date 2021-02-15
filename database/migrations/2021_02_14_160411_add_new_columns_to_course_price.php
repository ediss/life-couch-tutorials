<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToCoursePrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_price', function (Blueprint $table) {
            $table->integer('number_of_rate_2')->nullable();
            $table->string('price_in_rate_2')->nullable();
            $table->integer('number_of_rate_3')->nullable();
            $table->string('price_in_rate_3')->nullable();
            $table->string('foreign_countries_premium_package')->nullable();
            $table->date('foreign_countries_aplication_to')->nullable();
            $table->string('foreign_countries_aplication_to_and_payfull')->nullable();
            $table->integer('foreign_countries_number_of_rate')->nullable();
            $table->integer('foreign_countries_number_of_rate_2')->nullable();
            $table->string('payment_from_foreign_countries_in_rate_2')->nullable();
            $table->integer('foreign_countries_number_of_rate_3')->nullable();
            $table->string('payment_from_foreign_countries_in_rate_3')->nullable();

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
            $table->dropColumn('number_of_rate_2');
            $table->dropColumn('price_in_rate_2');
            $table->dropColumn('number_of_rate_3');
            $table->dropColumn('price_in_rate_3');
            $table->dropColumn('foreign_countries_premium_package');
            $table->dropColumn('foreign_countries_aplication_to');
            $table->dropColumn('foreign_countries_aplication_to_and_payfull');
            $table->dropColumn('foreign_countries_number_of_rate');
            $table->dropColumn('foreign_countries_number_of_rate_2');
            $table->dropColumn('payment_from_foreign_countries_in_rate_2');
            $table->dropColumn('foreign_countries_number_of_rate_3');
            $table->dropColumn('payment_from_foreign_countries_in_rate_3');
        });
    }
}
