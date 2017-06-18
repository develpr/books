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
            'id' => 1,
            'is_admin' => 0,
            'email' => 'test@test.com',
            'password' => '$2y$10$Ikj6odq8EQY6yZ.WAgOzuOwOuRcoOccS5j4BlcU/kf/3ddEYtblNi',
            'created_at' => '2017-06-03 22:37:00',
            'updated_at' => '2017-06-03 22:37:00'
        ]);


    }
}
