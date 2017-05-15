<?php

namespace Books;

use Books\Domain\BookType;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'is_admin',
    ];

    protected $appends = [
        'book_types', 'favorite_book_type'
    ];

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
