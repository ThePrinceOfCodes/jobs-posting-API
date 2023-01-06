<?php

namespace Tests\Feature;

use App\Models\Job;
use Tests\TestCase;
use App\Models\JobCategory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_job()
    {
        $title = 'software enginering';
        $description  = 'software engineer entry level needed';
        $location = 'remote';
        $requirements = 'entry level';
        $jobCategory = JobCategory::factory()->create();

        $headers = [
            'Accept' => 'application/json'
        ];
        $payload = [
            'title' => $title,
            'description' => $description,
            'location' => $location,
            'requirements' => $requirements,
            'job_category_id' => $jobCategory->id
        ];

        $response = $this->post('/api/job', $payload, $headers);

        $response->assertJson([
            'status' => true,
            'message' => 'Job created',
            'data' => [
                'id' => 1,
                'title' => $title,
                'description' => $description,
                'location' => $location,
                'requirements' => $requirements,
                'job_category_id' => $jobCategory->id
            ]
        ]);

        $response->assertStatus(201);
    }

     /**
     * fetch category test.
     *
     * @return void
     */
    public function test_fetch_category()
    {
        $response = $this->get('/api/job',['Accept' => 'application/json']);

        $response->assertJson([
            'status' => true,
            'message' => 'records retrived',
            
        ]);

        $response->assertStatus(201);
    }

     /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_job()
    {
        // $this->withoutExceptionHandling();

        $title = 'software DevOPs';
        $description  = 'software engineer needed';
        $location = 'lagos';

        $job = Job::factory()->create();

        $headers = [
            'Accept' => 'application/json'
        ];
        $payload = [
            'title' => $title,
            'description' => $description,
            'location' => $location,
            'requirements' => $job->requirements,
            'job_category_id' => $job->job_category_id
        ];
        

        $response = $this->patch('/api/job/'.$job->id, $payload, $headers);

        $response->assertJson([
            'status' => true,
            'message' => 'Job updated',
            'data' => [
                'id' => 2,
                'title' => $title,
                'description' => $description,
                'location' => $location,
                'requirements' => $job->requirements,
                'job_category_id' => $job->job_category_id
            ]
        ]);

        $response->assertStatus(200);
    }
}
