<?php

namespace App\GraphQL\Queries;

use App\Models\Booking;

final class BookingsByCar
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $bookings = Booking::where("car_id", $args["carId"])->get();
        return $bookings;
    }
}
