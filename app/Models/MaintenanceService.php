<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MaintenanceService extends Model
{
    use HasFactory;

    protected $table = "maintenance_services";

    protected $fillable = [
        "name",
        "description",
        "cost"
    ];

    public function service_requests(): HasMany
    {
        return $this->hasMany(ServiceRequest::class, "service_id");
    }
}
