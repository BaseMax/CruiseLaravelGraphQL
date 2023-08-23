<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubscriptionPlan extends Model
{
    use HasFactory;

    protected $table = "subscription_plans";

    protected $fillable = [
        "name",
        "description",
        "price",
        "features"
    ];

    public function user_subscriptions(): HasMany
    {
        return $this->hasMany(UserSubscription::class, "plan_id");
    }
}
