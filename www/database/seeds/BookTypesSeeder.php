<?php

use Illuminate\Database\Seeder;

class BookTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            1 => "Adventure",
            2 => "Art",
            3 => "Biographies",
            4 => "Comics",
            5 => "Programming",
            6 => "Cookbooks",
            7 => "Drama",
            8 => "Fantasy",
            9 => "History",
            10 => "Horror",
            11 => "Mystery",
            12 => "Poetry",
            13 => "Romance",
            14 => "Humor",
            15 => "Science",
            16 => "Scifi",
            17 => "Series",
            18 => "Travel"
        ];

        foreach($list as $id => $item) {
            DB::table('book_types')->insert([
                'id' => $id,
                'name' => $item
            ]);
        }

    }
}
