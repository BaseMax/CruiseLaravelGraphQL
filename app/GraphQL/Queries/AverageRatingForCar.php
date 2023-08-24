<?php

namespace App\GraphQL\Queries;

use App\Models\Rating;

final class AverageRatingForCar
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $avg = Rating::where("car_id", $args["carId"])->avg("rating");
        return $avg;
    }
}
