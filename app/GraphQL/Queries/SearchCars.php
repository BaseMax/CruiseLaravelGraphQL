<?php

namespace App\GraphQL\Queries;

use App\Models\Car;
use Illuminate\Support\Facades\Cache;

final class SearchCars
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $limit = 5;
        if (isset($args["limit"]))
            $limit = $args["limit"];

        $cars = Cache::remember("search_cars_" . $args["keyword"] . "_" . $limit, 60, function () use ($limit, $args) {
            return Car::where("make", "like", "%" . $args["keyword"] . "%")
                ->orWhere("model", "like", "%" . $args["keyword"] . "%")
                ->orWhere("year", "like", "%" . $args["keyword"] . "%")
                ->limit($limit)
                ->get();
        });
        return $cars;
    }
}
