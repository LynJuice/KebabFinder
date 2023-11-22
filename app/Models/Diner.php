<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Diner extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'address',
        'latitude',
        'longitude',
        'phone',
        'is_open',
        'open_time',
        'close_time',
        'image',
        'logo',
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class, 'kebab_products', 'diner_id', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shopProducts(): HasMany
    {
        return $this->hasMany(KebabProduct::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(DinerReview::class);
    }

    public function reviewPhotos(): HasManyThrough
    {
        return $this->hasManyThrough(ReviewPhotoDiner::class, DinerReview::class);
    }
}
