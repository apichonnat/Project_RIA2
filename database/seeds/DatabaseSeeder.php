<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersData::class);
        $this->call(TrucksData::class);
        $this->call(CustomersData::class);
        $this->call(DriversData::class);
    }
}
