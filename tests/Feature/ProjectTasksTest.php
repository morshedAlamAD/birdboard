<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function test_a_project_can_have_tasks()
    {
        $project=ProjectFactory::withUser($this->signIn())->create();
        $this->post($project->path().'/tasks', ['body'=>'test task']);
        $this->get($project->path())->assertSee('test task');
    }
    /** @test */
    public function test_only_the_owner_can_add_tasks()
    {
        $this->signIn();
        $project=ProjectFactory::create();
        $this->post($project->path().'/tasks', ['body'=>'test task'])->assertStatus(403);
    }
    /** @test */
    public function test_post_can_be_updated()
    {
        $project=ProjectFactory::withUser($this->signIn())->withTaskCount(1)->create();
        $this->patch($project->path().'/tasks/'. $project->tasks[0]->id, ['body'=>'changed']);
        $this->assertDatabaseHas('tasks', ['body'=>'changed', 'completed'=>false]);
    }
}
