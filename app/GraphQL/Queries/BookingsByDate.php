<?php

namespace App\GraphQL\Queries;

use App\Models\Booking;
use Illuminate\Support\Facades\Cache;

final class BookingsByDate
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $bookings = Cache::remember("bookings_by_date_" . $args["date"], 20, function () use ($args) {
            return Booking::where("created_at", $args["date"])->get();
        });
        return $bookings;
    }
}
