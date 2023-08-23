<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RentalRequest extends Model
{
    use HasFactory;

    protected $table = "rental_requests";

    protected $fillable = [
        "user_id",
        "category_id",
        "pickup_date",
        "return_date",
        "status"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, "category_id");
    }
}
