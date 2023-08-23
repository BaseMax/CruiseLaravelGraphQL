<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Nuwave\Lighthouse\Execution\Utils\Subscription;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    protected $table = "users";

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, "user_id");
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, "user_id");
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, "user_id");
    }

    public function histories(): HasMany
    {
        return $this->hasMany(History::class, "user_id");
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, "user_id");
    }

    public function wishes(): HasMany
    {
        return $this->hasMany(Wish::class, "user_id");
    }

    public function car_rentals(): HasMany
    {
        return $this->hasMany(CarRental::class, "user_id");
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class, "user_id");
    }

    public function rental_requests(): HasMany
    {
        return $this->hasMany(RentalRequest::class, "user_id");
    }

    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class, "user_id");
    }

    public function car_issues(): HasMany
    {
        return $this->hasMany(CarIssue::class, "reported_by");
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class, "user_id");
    }

    public function service_requests(): HasMany
    {
        return $this->hasMany(ServiceRequest::class, "user_id");
    }

    public function preferences(): HasMany
    {
        return $this->hasMany(Preference::class, "user_id");
    }

    public function trip_logs(): HasMany
    {
        return $this->hasMany(TripLog::class, "user_id");
    }

    public function traffic_violations(): HasMany
    {
        return $this->hasMany(TrafficViolation::class, "user_id");
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, "user_id");
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, "user_id");
    }

    public function loyalty_points(): HasMany
    {
        return $this->hasMany(LoyaltyPoint::class, "user_id");
    }
}
