<?php

namespace App\GraphQL\Queries;

use App\Models\Booking;
use Illuminate\Support\Facades\Cache;

final class UserLastBooking
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $booking = Cache::remember("user_last_booking_" . $args["userId"], 60, function() use ($args) {
            return Booking::where("user_id", $args["userId"])->orderBy("created_at", "desc")->first();
        });
        return $booking;
    }
}
