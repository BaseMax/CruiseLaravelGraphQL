<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSubscription extends Model
{
    use HasFactory;

    protected $table = "user_subscriptions";

    protected $fillable = [
        "user_id",
        "plan_id",
        "start_date",
        "end_date",
        "status"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(SubscriptionPlan::class, "plan_id");
    }
}
