<?php

namespace App\GraphQL\Queries;

use App\Models\Car;
use Illuminate\Support\Facades\Cache;

final class CarsByPriceRange
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return Cache::remember("cars_by_price_range_" . $args["maxPrice"] . "_" . $args["minPrice"], 20, function () use ($args) {
            return Car::where("price", "<", $args["maxPrice"])->where("price", ">", $args["minPrice"])->get();
        });
    }
}
