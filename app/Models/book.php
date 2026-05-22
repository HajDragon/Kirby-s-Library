<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use hasFactory;
    protected $fillable = [
        'title',
        'author',
        'publisher',
        'isbn',
        'release_date',
    ];
}
