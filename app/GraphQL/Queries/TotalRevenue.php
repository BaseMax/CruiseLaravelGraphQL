<?php

namespace App\GraphQL\Queries;

use App\Models\Booking;
use Illuminate\Support\Facades\Cache;

final class TotalRevenue
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $sum = 0;
        $bookings = Cache::remember("total_revenue", 60, function () use ($args) {
            return Booking::where('status', "confirmed")->orWhere("status", "pending")->get();
        });
        foreach ($bookings as $booking)
            $sum += $booking->car->price;
        return $sum;
    }
}
