<?php

namespace App\GraphQL\Queries;

use App\Models\Car;

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
        
        $cars = Car::orderBy("created_at", "desc")->limit($limit)->get();
        return $cars;
    }
}
