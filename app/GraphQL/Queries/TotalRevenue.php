<?php

namespace App\GraphQL\Queries;

use App\Models\Booking;

final class TotalRevenue
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $sum = 0;
        $bookings = Booking::where('status', "confirmed")->orWhere("status", "pending")->get();
        foreach($bookings as $booking)
            $sum += $booking->car->price;
        return $sum;
    }
}
