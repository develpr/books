<?php
/**
 * Created by PhpStorm.
 * User: shoelessone
 * Date: 6/4/17
 * Time: 1:55 PM
 */

namespace Books\Domain;


use Illuminate\Database\Eloquent\Model;

class BookExchangeParticipation extends Model
{

    protected $fillable = ['receiver_user_id', 'book_exchange_id'];

    protected $with = ['bookExchange'];

    protected $table = 'book_exchange_participation';

    public function bookExchange() {
        return $this->belongsTo(BookExchange::class);
    }
}