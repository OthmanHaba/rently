<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class homepage extends TestCase
{
    public function test_a_user_visit_the_home_page(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_when_visit_the_homepage_the_list_of_cities_shown()
    {
        $res = $this->get('/');

        $res->assertStatus(200); // Check if the request was successful

        // Define the cities you expect to be in the response
        $expectedCities = ['City1', 'City2', 'City3'];

        foreach ($expectedCities as $city) {
            $res->assertSee($city); // Check if the response contains the city
        }
    }


    public function test_the_trending_items_shown_in_the_home_page()
    {

    }


}
