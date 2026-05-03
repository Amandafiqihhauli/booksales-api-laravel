<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
    'title',
    'author_id',
    'genre_id',
    'price',
    'stock',
    'cover',
    ];



        public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function transactions()
    {
    return $this->hasMany(Transaction::class);
    }
}
