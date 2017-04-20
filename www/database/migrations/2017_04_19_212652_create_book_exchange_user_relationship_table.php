<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookExchangeUserRelationshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_exchange_user_relationships', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_exchange_id');
            $table->integer('sender_user_id');
            $table->integer('receiver_user_id');
            $table->string('book_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
