<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;

    protected $table = "insurance_policies";

    protected $fillable = [
        "name",
        "description",
        "coverage_amount",
        "premium_amount"
    ];
}
