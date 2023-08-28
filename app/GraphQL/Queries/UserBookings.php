<?php

namespace App\GraphQL\Queries;

use App\Models\Booking;
use Illuminate\Support\Facades\Cache;

final class UserBookings
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $bookings = Cache::remember("user_bookings_" . $args["userId"], 60, function () use ($args) {
            return Booking::where("user_id", $args["userId"])->get();
        });
        return $bookings;
    }
}
