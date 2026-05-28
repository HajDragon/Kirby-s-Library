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
        'library_id',
        'image_url',
    ];

    public function library()
    {
        return $this->belongsTo(Library::class);
    }
}
