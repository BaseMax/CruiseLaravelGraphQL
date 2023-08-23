<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = [
        "name",
        "description"
    ];

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class, "category_id");
    }

    public function rental_requests(): HasMany
    {
        return $this->hasMany(RentalRequest::class, "category_id");
    }
}
