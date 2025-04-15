<?php
namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;


class UserBook extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'user_books';

    protected $fillable = [
        'title', 'cover', 'summary', 'content', 'user_id'
    ];
}