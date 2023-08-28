<?php

namespace App\GraphQL\Queries;

use App\Models\Booking;
use Illuminate\Support\Facades\Cache;

final class BookingsBetweenDates
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $bookings = Cache::remember("booking_" . $args["startDate"] . "_" . $args["endDate"], 20, function() use ($args) {
            return Booking::where("pickup_date", "<", $args["startDate"])->where("return_date", ">", $args["endDate"])->get();
        });
        return $bookings;
    }
}
