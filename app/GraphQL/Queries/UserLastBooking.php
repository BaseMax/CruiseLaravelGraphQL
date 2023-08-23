<?php

namespace App\GraphQL\Queries;

use App\Models\Booking;

final class UserLastBooking
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $booking = Booking::where("user_id", $args["userId"])->orderBy("created_at", "desc")->first();
        return $booking;
    }
}
