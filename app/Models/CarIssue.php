<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarIssue extends Model
{
    use HasFactory;

    protected $table = "car_issues";

    protected $fillable = [
        "car_id",
        "reported_by",
        "description",
        "status"
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, "car_id");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "reported_by");
    }
}
