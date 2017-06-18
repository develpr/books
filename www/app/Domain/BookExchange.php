<?php

namespace Books\Domain;

use Illuminate\Database\Eloquent\Model;

class BookExchange extends Model
{
    public function getBookTypesAttribute()
    {
        return BookType::all();
    }

    public function getFavoriteBookTypeAttribute()
    {
        return $this->favoriteBookType()->first();
    }

    public function favoriteBookType()
    {
        return $this->belongsTo(BookType::class, 'book_type_id');
    }
}