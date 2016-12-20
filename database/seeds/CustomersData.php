<?php

use Illuminate\Database\Seeder;

class CustomersData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'user_id' => 2,
            'street' => "ch des valve",
            'street_number' => 33,
            'city' => "Fribourg",
            'country' => "Suisse"
        ]);

        DB::table('customers')->insert([
            'user_id' => 3,
            'street' => "rue des voitures",
            'street_number' => 22,
            'city' => "Lausanne",
            'country' => "Suisse"
        ]);

        DB::table('customers')->insert([
            'user_id' => 4,
            'street' => "rue de trump",
            'street_number' => 83,
            'city' => "Geneve",
            'country' => "Suisse"
        ]);

        DB::table('customers')->insert([
            'user_id' => 5,
            'street' => "ch des bourres",
            'street_number' => 21,
            'city' => "Sion",
            'country' => "Suisse"
        ]);

        DB::table('customers')->insert([
            'user_id' => 7,
            'street' => "ch des chtis",
            'street_number' => 7,
            'city' => "Chatel-st-deni",
            'country' => "Suisse"
        ]);
    }
}
