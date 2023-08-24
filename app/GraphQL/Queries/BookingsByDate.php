<?php

namespace App\GraphQL\Queries;

use App\Models\Booking;

final class BookingsByDate
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $bookings = Booking::where("created_at", $args["date"])->get();
        return $bookings;
    }
}
