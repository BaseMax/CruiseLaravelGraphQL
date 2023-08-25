<?php

namespace Tests\Unit;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class CruiseTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_create_booking(): void
    {
        $client = new Client(["base_uri" => "http://127.0.0.1:8000/graphql"]);

        $response = $client->post('', [
            "json" => [
                "query" => "mutation {
                    createBooking(
                      userId: 1,
                      carId: 1,
                      pickupDate: \"2023-08-20\",
                      returnDate: \"2023-08-25\"
                    ){
                      id
                      user {
                        name
                        email
                        created_at
                        updated_at
                      }
                      car {
                        make
                        model
                        year
                        price
                      }
                      pickup_date
                      return_date
                      status
                    }
                  }"
            ]
        ]);

        
        $data = json_decode($response->getBody(), true);
        $this->assertArrayHasKey("data", $data);
        $this->assertArrayHasKey("createBooking", $data["data"]);
    }

    public function test_update_booking(): void
    {
        $client = new Client(["base_uri" => "http://127.0.0.1:8000/graphql"]);

        $response = $client->post('', [
            "json" => [
                "query" => "mutation {
                    updateBooking (
                      id: 1,
                      return_date: \"2023-09-01\"
                    ) {
                      id
                      user {
                        password
                        email
                        name
                        id
                      }
                      pickup_date
                      return_date
                      created_at
                      updated_at
                    }
                  }"
            ]
        ]);

        
        $data = json_decode($response->getBody(), true);
        $this->assertArrayHasKey("data", $data);
        $this->assertArrayHasKey("updateBooking", $data["data"]);
        $this->assertArrayHasKey("id", $data["data"]["updateBooking"]);
    }

    public function test_cancel_booking(): void
    {
        $client = new Client(["base_uri" => "http://127.0.0.1:8000/graphql"]);

        $response = $client->post('', [
            "json" => [
                "query" => "mutation {
                    cancelBooking(id: 1)
                    {
                      id
                      car {
                        make
                        model
                        year
                        price
                        category {
                          name
                          description
                          created_at
                          updated_at
                        }
                      }
                      pickup_date
                      return_date
                      status
                    }
                  }"
            ]
        ]);

        
        $data = json_decode($response->getBody(), true);
        $this->assertArrayHasKey("data", $data);
        $this->assertArrayHasKey("cancelBooking", $data["data"]);
        $this->assertArrayHasKey("id", $data["data"]["cancelBooking"]);
        $this->assertArrayHasKey("car", $data["data"]["cancelBooking"]);
    }

    public function test_car_categories(): void
    {
        $client = new Client(["base_uri" => "http://127.0.0.1:8000/graphql"]);

        $response = $client->post('', [
            "json" => [
                "query" => "query {
                    carCategories {
                      id
                      name
                      description
                      cars {
                        make
                        model
                        year
                        price
                      }
                    }
                  }"
            ]
        ]);

        
        $data = json_decode($response->getBody(), true);
        $this->assertArrayHasKey("data", $data);
        $this->assertArrayHasKey("carCategories", $data["data"]);
        $this->assertArrayHasKey("id", $data["data"]["carCategories"][0]);
        $this->assertArrayHasKey("name", $data["data"]["carCategories"][0]);
        $this->assertArrayHasKey("description", $data["data"]["carCategories"][0]);
    }
}
