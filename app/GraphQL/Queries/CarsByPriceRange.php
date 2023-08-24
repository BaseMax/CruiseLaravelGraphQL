<?php

namespace App\GraphQL\Queries;

use App\Models\Car;

final class CarsByPriceRange
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return Car::where("price", "<", $args["maxPrice"])->where("price", ">", $args["minPrice"])->get();
    }
}
