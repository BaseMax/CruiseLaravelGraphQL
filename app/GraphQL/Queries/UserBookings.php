<?php

namespace App\GraphQL\Queries;

use App\Models\Booking;

final class UserBookings
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $bookings = Booking::where("user_id", $args["userId"])->get();
        return $bookings;
    }
}
