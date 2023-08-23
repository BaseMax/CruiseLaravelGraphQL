<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feature extends Model
{
    use HasFactory;

    protected $table = "features";

    protected $fillable = [
        "car_id",
        'feature'
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, "car_id");
    }
}
