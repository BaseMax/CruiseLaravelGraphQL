<?php

namespace App\GraphQL\Queries;

use App\Models\Car;
use Illuminate\Support\Facades\Cache;

final class CarsByCategory
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $cars = Cache::remember("cars_by_category_" . $args["categoryId"], 20, function () use ($args) {
            return Car::where("category_id", $args["categoryId"])->get();
        });
        return $cars;
    }
}
