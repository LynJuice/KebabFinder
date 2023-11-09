<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'description',
        'price',
        'image',
        'is_available',
    ];

    public function diners(): BelongsToMany
    {
        return $this->belongsToMany(Diner::class, "kebab_products");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reviews(): HasMany
    {
        // return $this->hasManyThrough(Review::class, KebabProduct::class);
        return $this->hasMany(Review::class)->orderBy('created_at', 'desc');
    }
    
}
