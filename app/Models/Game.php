<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'developer',
        'genre',
        'playtime',
        'release_date',
        'image_url',
    ];

    public function stores()
    {
        return $this->belongsToMany(Store::class);
    }
}
