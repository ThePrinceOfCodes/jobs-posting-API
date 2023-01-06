<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobCategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * create category test.
     *
     * @return void
     */
    public function test_create_category()
    {
        // $this->withoutExceptionHandling();
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );  
        $title = 'Law';
        
        $payload = [
            'title' =>$title,
        ];
        $headers = [
            'Accept' => 'application/json'
        ];

        $response = $this->post('/api/job-categories', $payload, $headers);

        $response->assertJson([
            'status' => true,
            'message' => 'Job category created',
            'data' => [
                'id' => 1,
                'title' => $title
            ]
        ]);

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
