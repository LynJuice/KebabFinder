<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reviews extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'rating',
        'comment',
        'kebab_product_id',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product():BelongsTo
    {
        return $this->belongsTo(Products::class);
    }

    public function shop():BelongsTo
    {
        return $this->belongsTo(KebabShops::class);
    }

}
