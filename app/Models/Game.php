<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'header_image',
        'capsule_image',
        'price',
        'discount_price',
        'discount_percent',
        'genres',
        'release_date',
        'developer',
        'publisher',
        'is_featured',
        'is_free',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'discount_percent' => 'integer',
        'is_featured' => 'boolean',
        'is_free' => 'boolean',
        'release_date' => 'date',
    ];
}
