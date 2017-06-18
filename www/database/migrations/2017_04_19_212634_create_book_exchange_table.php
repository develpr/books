<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookExchangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_exchanges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('theme');
            $table->string('comment');
            $table->dateTime('sign_up_by_date');
            $table->dateTime('send_by_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_exchanges');
    }
}
