<?php

use Illuminate\Database\Seeder;

class DriversData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drivers')->insert([
            'user_id' => 1,
            'license_number' => "006056853006",
        ]);

        DB::table('drivers')->insert([
            'user_id' => 6,
            'license_number' => "003058536006",
        ]);
    }
}
