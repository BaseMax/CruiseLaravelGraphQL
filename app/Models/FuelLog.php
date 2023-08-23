<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FuelLog extends Model
{
    use HasFactory;

    protected $table = "fuel_logs";

    protected $fillable = [
        "car_id",
        "log_date",
        "fuel_amount",
        "fuel_price_per_unit"
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, "car_id");
    }
}
