<?php

use Illuminate\Database\Seeder;

class UsersData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => "Alain",
            'last_name' => "Pichonnat",
            'phone_number' => "797826515",
            'mail' => "alain.pichonnat@cpnv.ch",
        ]);
        DB::table('users')->insert([
            'first_name' => "Aida  ",
            'last_name' => "Sejmenovic",
            'phone_number' => "0785554423",
            'mail' => "aida.sejmenovic@cpnv.ch",
        ]);
        DB::table('users')->insert([
            'first_name' => "Jean",
            'last_name' => "Dutrou",
            'phone_number' => "0770022536",
            'mail' => "jean.dutrou@yahoo.ch",
        ]);
        DB::table('users')->insert([
            'first_name' => "Micheline",
            'last_name' => "Kalmineray",
            'phone_number' => "0219852365",
            'mail' => "micjeline.kalmineray@vd.ch",
        ]);
        DB::table('users')->insert([
            'first_name' => "Christophe",
            'last_name' => "Kalman",
            'phone_number' => "0246582325",
            'mail' => "christophe.kalman@cpnv.ch",
        ]);
        DB::table('users')->insert([
            'first_name' => "Xavier",
            'last_name' => "Carrel",
            'phone_number' => "your phone",
            'mail' => "blabla@cpnv.ch.ch",
        ]);
        DB::table('users')->insert([
            'first_name' => "Nolan  ",
            'last_name' => "Rigo",
            'phone_number' => "0738952365",
            'mail' => "nolan.rigo@cpnv.ch",
        ]);
        DB::table('users')->insert([
            'first_name' => "Malorie",
            'last_name' => "Genoud",
            'phone_number' => "0750423532",
            'mail' => "malorie.genoud@cpnv.ch",
        ]);
        DB::table('users')->insert([
            'first_name' => "Mickael",
            'last_name' => "Lacombe",
            'phone_number' => "0249452254",
            'mail' => "mickael.lacombe@cpnv.ch",
        ]);
        DB::table('users')->insert([
            'first_name' => "Sebastien",
            'last_name' => "Martin",
            'phone_number' => "0795555555",
            'mail' => "sebastien.martin@cpnv.ch",
        ]);
    }
}
