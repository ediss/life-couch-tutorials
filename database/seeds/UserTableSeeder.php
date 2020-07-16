<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Edis Dev',
            'email' => 'dev@gmail.com',
            'password' => bcrypt('12345678'),
            'birth_year' => "1994",
            "relationship" => "u vezi sam",
            "place_of_living" => "Srbiji",
            "mobile_phone" => "066/6465665",
            'role_id' => '1',
        ]);
        
        DB::table('users')->insert([
            'name' => 'pera',
            'email' => 'pera@gmail.com',
            'password' => bcrypt('12345678'),
            'birth_year' => "1954",
            "relationship" => "nisam u vezi",
            "place_of_living" => "Van Srbije",
            "mobile_phone" => "066/123-456",
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'zika',
            'email' => 'zika@gmail.com',
            'password' => bcrypt('12345678'),
            'birth_year' => "1954",
            "relationship" => "nisam u vezi",
            "place_of_living" => "Van Srbije",
            "mobile_phone" => "066/123-456",
            'role_id' => '2',
        ]);

    }
}
