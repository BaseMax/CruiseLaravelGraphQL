<?php

namespace App\GraphQL\Queries;

use App\Models\Booking;
use Illuminate\Support\Facades\Cache;

final class BookingsByCar
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $bookings = Cache::remember("booking_by_car_" . $args["carId"], 20, function () use ($args) {
            return Booking::where("car_id", $args["carId"])->get();
        });
        return $bookings;
    }
}
