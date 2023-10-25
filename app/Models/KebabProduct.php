<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KebabProduct extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'kebab_shops_id',
        'products_id',
        'name',
        'description',
        'price',
        'image',

    ];

    public function kebabShops(): BelongsTo
    {
        return $this->belongsTo(KebabShops::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    
}
