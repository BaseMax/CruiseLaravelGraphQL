<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrafficViolation extends Model
{
    use HasFactory;

    protected $table = "traffic_violations";

    protected $fillable = [
        "user_id",
        "car_id",
        "violation_date",
        "description",
        "fine_amount",
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
}
