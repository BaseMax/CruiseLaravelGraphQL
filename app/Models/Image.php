<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected $table = "images";

    protected $fillable = [
        "car_id",
        "url"
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, "car_id");
    }
}
