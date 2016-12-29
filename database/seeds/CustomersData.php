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
            'street' => "chemin des Halles",
            'street_number' => 3,
            'city' => "Moudon",
            'npa' => 1510,
            'country' => "Suisse"
        ]);

        DB::table('customers')->insert([
            'user_id' => 3,
            'street' => "Rue Centrale",
            'street_number' => 55,
            'city' => "Bienne",
            'npa' => 2502,
            'country' => "Suisse"
        ]);

        DB::table('customers')->insert([
            'user_id' => 4,
            'street' => "Avenue de l'Europe",
            'street_number' => 20,
            'city' => "Fribourg",
            'npa' => 1700,
            'country' => "Suisse"
        ]);

        DB::table('customers')->insert([
            'user_id' => 5,
            'street' => "Chemin de Merdisel",
            'street_number' => 4,
            'city' => "Satigny",
            'npa' => 1242,
            'country' => "Suisse"
        ]);

        DB::table('customers')->insert([
            'user_id' => 7,
            'street' => "Rue du Levant",
            'street_number' => 99,
            'city' => "Martigny",
            'npa' => 1920,
            'country' => "Suisse"
        ]);
    }
}
