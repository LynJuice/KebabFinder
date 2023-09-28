<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KebabShops extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
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

    ];


    public function products()
    {
        return $this->belongsToMany(Products::class, 'kebab_products', 'kebab_shops_id', 'products_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
