<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    protected $table = "cars";

    protected $fillable = [
        "make",
        "model",
        "year",
        "price",
        "category_id"
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, "car_id");
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, "car_id");
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class, "car_id");
    }

    public function histories(): HasMany
    {
        return $this->HasMany(History::class, "car_id");
    }

    public function features(): HasMany
    {
        return $this->hasMany(Feature::class, "car_id");
    }

    public function wishes(): HasMany
    {
        return $this->hasMany(Wish::class, "car_id");
    }

    public function availabilities(): HasMany
    {
        return $this->hasMany(Availability::class, "car_id");
    }

    public function maintenance_logs(): HasMany
    {
        return $this->hasMany(MaintenanceLog::class, "car_id");
    }

    public function car_rentals(): HasMany
    {
        return $this->hasMany(CarRental::class, "car_id");
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class, "car_id");
    }

    public function car_issues(): HasMany
    {
        return $this->hasMany(CarIssue::class, "car_id");
    }

    public function accessories(): HasMany
    {
        return $this->hasMany(Accessory::class, "car_id");
    }

    public function trip_logs(): HasMany
    {
        return $this->hasMany(TripLog::class, "car_id");
    }

    public function fuel_logs(): HasMany
    {
        return $this->hasMany(FuelLog::class, "car_id");
    }

    public function traffic_violations(): HasMany
    {
        return $this->hasMany(TrafficViolation::class, "car_id");
    }
}
