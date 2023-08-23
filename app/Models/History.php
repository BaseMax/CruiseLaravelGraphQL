<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History extends Model
{
    use HasFactory;

    protected $table = "histories";

    protected $fillable = [
        "user_id",
        "car_id",
        "pickup_date",
        "return_date"
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
