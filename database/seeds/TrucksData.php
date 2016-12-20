<?php

use Illuminate\Database\Seeder;

class TrucksData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trucks')->insert([
            'plate_number' => 75369,
            'canton' => "VD",
            'comment' => "la 1er bloque un peu",
        ]);
        DB::table('trucks')->insert([
            'plate_number' => 45896,
            'canton' => "VD",
            'comment' => "camion avec couchette",
        ]);
        DB::table('trucks')->insert([
            'plate_number' => 12777,
            'canton' => "VD",
            'comment' => "manque des outils",
        ]);
    }
}
