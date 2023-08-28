<?php

namespace App\GraphQL\Queries;

use App\Models\Rating;
use Illuminate\Support\Facades\Cache;

final class AverageRatingForCar
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $avg = Cache::remember("avg", 20, function() use ($args) {
            return Rating::where("car_id", $args["carId"])->avg("rating");
        });
        return $avg;
    }
}
