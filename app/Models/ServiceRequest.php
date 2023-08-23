<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $table = "service_requests";

    protected $fillable = [
        "user_id",
        "service_id",
        "request_date",
        "status"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(MaintenanceService::class, "service_id");
    }
}
