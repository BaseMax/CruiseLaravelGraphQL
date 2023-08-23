<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $table = "reviews";

    protected $fillable = [
        "user_id",
        "car_id",
        "rating",
        "review_text"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, "car_id");
    }
}
