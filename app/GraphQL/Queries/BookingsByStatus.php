<?php

namespace App\GraphQL\Queries;

use App\Models\Booking;
use Illuminate\Support\Facades\Cache;

final class BookingsByStatus
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $bookings = Cache::remember("bookings_by_status_" . $args["status"], 20, function() use ($args) {
            return Booking::where("status", $args["status"])->get();
        });
        return $bookings;
    }
}
