<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DinerReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'rating',
        'comment',
        'diner_id',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function diner():BelongsTo
    {
        return $this->belongsTo(Diner::class);
    }


}
