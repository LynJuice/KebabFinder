<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\models\KebabShops;
use app\models\Products;

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
}
