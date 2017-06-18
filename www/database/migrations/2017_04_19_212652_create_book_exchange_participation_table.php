<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookExchangeParticipationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_exchange_participation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_exchange_id');
            $table->boolean('participate')->default(false);
            $table->integer('sender_user_id')->nullable()->default(null);
            $table->integer('receiver_user_id');
            $table->string('book_title')->nullable();
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
        Schema::dropIfExists('book_exchange_participation');

    }
}
