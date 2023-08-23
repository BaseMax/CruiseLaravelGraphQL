<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    use HasFactory;

    protected $table = "bookings";

    protected $fillable = [
        "user_id",
        "car_id",
        "pickup_date",
        "return_date",
        "status"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, "car_id");
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, "booking_id");
    }
}
