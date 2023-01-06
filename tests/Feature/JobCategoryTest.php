<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JobCategoryTest extends TestCase
{
    /**
     * create category test.
     *
     * @return void
     */
    public function test_create_category()
    {
        // $this->withoutExceptionHandling();
        $payload = [];
        $headers = [
            'Accept' => 'application/json'
        ];

        $response = $this->post('/api/job-categories', $payload, $headers);

        $response->assertStatus(201);
    }


     /**
     * create category test.
     *
     * @return void
     */
    // public function test_fetch_category()
    // {
    //     $response = $this->get('/api/job-categories');

    //     $response->assertStatus(201);
    // }


    /**
     * fetch category test.
     *
     * @return void
     */
    public function test_get_category()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


}
