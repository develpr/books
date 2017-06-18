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
         $this->call(BookTypesSeeder::class);
         $this->call(BookExchangeSeeder::class);
         $this->call(UserTableSeeder::class);
    }
}
