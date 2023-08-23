<?php

namespace App\GraphQL\Queries;

use App\Models\Car;

final class CarsByCategory
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $cars = Car::where("category_id", $args["categoryId"])->get();
        return $cars;
    }
}
