<?php

namespace Tests\Feature;

use App\Models\Activity;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActivityFeedTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function creating_a_project_Records_activity()
    {

    $project = Project::factory()->create();
    $this->assertSame("created", $project->activities[0]->description);
    }
       /** @test */
    public function updting_a_project_Records_activity()
    {

    $project = Project::factory()->create();
    $project->update(["description"=>"updated"]);
    $this->assertCount(2 , $project->activities);
    $this->assertSame("updated", $project->activities->last()->description);
    }
    /** @test */
    public function adding_a_task_records_activity()
    {
    $project = Project::factory()->create();
    $project->addTask('new task added');
    $this->assertCount(2 , $project->activities);
    $this->assertSame("Task Added", $project->activities->last()->description);
    }

    /** @test */
    public function completeing_a_task_Records_activity()
    {
    $project = Task::factory()->create();
    $project->complete();
    $this->assertCount(3 , $project->project->activities);
    $this->assertSame("Task Completed", $project->project->activities->last()->description);
    }
}
