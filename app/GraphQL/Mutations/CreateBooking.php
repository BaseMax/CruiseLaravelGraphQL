<?php

namespace App\GraphQL\Mutations;

use App\Models\Booking;

final class CreateBooking
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $booking = Booking::create([
            "user_id"      => $args["userId"],
            "car_id"       => $args["carId"],
            "pickup_date"  => $args["pickupDate"],
            "return_date"  => $args["returnDate"],
            "status"       => "pending"
        ]);
        return $booking;
    }
}
