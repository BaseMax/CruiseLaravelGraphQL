<?php

namespace App\GraphQL\Queries;

use App\Models\Car;
use Illuminate\Support\Facades\Cache;

final class RecentlyAddedCars
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $limit = 5;
        if (isset($args["limit"]))
            $limit = $args["limit"];

        $cars = Cache::remember("recently_added_cars", 60, function () use ($limit, $args) {
            return Car::orderBy("created_at", "desc")->limit($limit)->get();
        });
        return $cars;
    }
}
