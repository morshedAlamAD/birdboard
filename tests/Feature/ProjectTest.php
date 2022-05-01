<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use WithFaker,RefreshDatabase;
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
    public function test_for_creating_project()
    {
        $attribute=[
        'title'=>$this->faker->text(50),
        'description'=>$this->faker->paragraph(),
    ];
        $this->post('/project/create', $attribute);
        $this->assertDatabaseHas('projects', $attribute);
    }
}
