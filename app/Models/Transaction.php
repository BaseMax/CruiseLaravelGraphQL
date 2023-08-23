<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";

    protected $fillable = [
        "user_id",
        "amount",
        "transaction_date",
        "transaction_type",
        "status"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
