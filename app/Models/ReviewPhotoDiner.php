<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReviewPhotoDiner extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo',
    ];

    public function dinerReview():BelongsTo
    {
        return $this->belongsTo(DinerReview::class);
    }
}
