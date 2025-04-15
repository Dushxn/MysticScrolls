<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Book extends Model
{
    protected $connection = 'mongodb';  // Use MongoDB connection
    protected $collection = 'books';    // MongoDB collection name

    protected $fillable = [
        'title',
        'image',
        'description',
        'author',
        'isbn',
        'publisher',
        'category',
        'status', // read, currently_reading, not_read
        'user_id'
    ];
}
