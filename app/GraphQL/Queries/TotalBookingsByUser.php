<?php

namespace App\GraphQL\Queries;

use App\Models\Booking;

final class TotalBookingsByUser
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return Booking::where("user_id", $args["userId"])->count();
    }
}
