<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $table = "payments";

    protected $fillable = [
        "booking_id",
        "amount",
        "payment_date"
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class, "booking_id");
    }
}
