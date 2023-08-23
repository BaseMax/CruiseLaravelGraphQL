<?php

namespace App\GraphQL\Mutations;

use App\Models\Booking;

final class CancelBooking
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $booking = Booking::find($args["id"]);
        $booking->status = "canceled";
        $booking->save();
        return $booking;
    }
}
