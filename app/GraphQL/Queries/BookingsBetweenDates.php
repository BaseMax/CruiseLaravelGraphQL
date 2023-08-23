<?php

namespace App\GraphQL\Queries;

use App\Models\Booking;

final class BookingsBetweenDates
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $bookings = Booking::where("pickup_date", "<", $args["startDate"])->where("return_date", ">", $args["endDate"])->get();
        return $bookings;
    }
}
