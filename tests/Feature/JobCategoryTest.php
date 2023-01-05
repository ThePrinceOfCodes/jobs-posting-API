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
        $response = $this->post('/job-categories');

        $response->assertStatus(201);
    }


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