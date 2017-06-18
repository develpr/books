<?php

use Illuminate\Database\Seeder;

class BookExchangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        $table->increments('id');
//        $table->string('theme');
//        $table->string('comment');
//        $table->dateTime('sign_up_by_date');
//        $table->dateTime('send_by_date');

        DB::table('book_exchanges')->insert([
            'id' => 1,
            'theme' => 'Holiday books',
            'comment' => 'Send some holiday books!',
            'sign_up_by_date' => new DateTime('december 1, 2015'),
            'send_by_date' => new DateTime('december 10, 2015'),
            'created_at' => '2015-06-03 22:37:00',
            'updated_at' => '2015-06-03 22:37:00'
        ]);

        DB::table('book_exchanges')->insert([
            'id' => 2,
            'theme' => '',
            'comment' => 'No theme, just pick a good book!',
            'sign_up_by_date' => new DateTime('october 2, 2019'),
            'send_by_date' => new DateTime('october 14, 2019'),
            'created_at' => '2017-06-03 22:37:00',
            'updated_at' => '2017-06-03 22:37:00'
        ]);


    }
}
