<?php

namespace App\GraphQL\Mutations;

use App\Models\Booking;
use Illuminate\Support\Facades\Cache;

final class CancelBooking
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // cache()->remember()
        $booking = Booking::find($args["id"]);
        $booking->status = "canceled";
        $booking->save();
        return $booking;

    }
}
