<?php

namespace App\GraphQL\Queries;

use App\Models\Booking;
use Illuminate\Support\Facades\Cache;

final class TotalBookingsByUser
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return Cache::remember("total_bookings_by_user_" . $args["userId"], 60, function () use ($args) {
            return Booking::where("user_id", $args["userId"])->count();
        });
    }
}
