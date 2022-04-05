<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * Should assert 302 for non authenticated users
     *
     * @return void
     * 
     */
    public function test_search_for_a_query()
    {
        $query = 'tancredy';
        $response = $this->get("/home", [
            "search" => $query
        ]);


        $response->assertStatus(302);
    }

    public function test_login() {
        $cin = "your cin"; // cin in user table
        $password = "your password"; // password in user table

        // $response = $this->withHeaders(['Authorization' => "Bearer $token"])
        //     ->json('POST', '/login', [
        //         '_token' => 
        //         'cin' => $cin,
        //         'password' => $password
        //     ]);

        // $response->assertStatus(201);

        $response = $this->json('POST', '/login', [
                // '_token' => csrf_token(),
                'cin' => $cin,
                'password' => $password
            ]);


        // print_r($response);
        $response->assertStatus(204);
    }
}
