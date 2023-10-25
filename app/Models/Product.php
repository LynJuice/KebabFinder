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
    ];

    public function kebabShops(): BelongsToMany
    {
        return $this->belongsToMany(KebabShops::class, "kebab_products");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reviews(): HasManyThrough
    {
        return $this->hasManyThrough(Review::class, KebabProduct::class);
    }
    
}
