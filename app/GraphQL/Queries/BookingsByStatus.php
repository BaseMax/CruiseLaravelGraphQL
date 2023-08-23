<?php

namespace App\GraphQL\Queries;

use App\Models\Booking;

final class BookingsByStatus
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $bookings = Booking::where("status", $args["status"])->get();
        return $bookings;
    }
}
