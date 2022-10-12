<?php

namespace Tests\Unit;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

class ProjectTaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_it_has_a_path()
    {
        $task = Task::factory()->create();
        $this->assertEquals('/project/'.$task->project->id.'/tasks/'. $task->id, $task->path());
    }
    /** @test */
    public function task_can_be_completed()
    {
        $task= Task::factory()->create();
        $this->assertFalse($task->completed);
        $task->complete();
        $this->assertTrue($task->fresh()->completed);
    }
    /** @test */
    public function task_can_be_incompleted()
    {
        $task= Task::factory()->create(['completed'=>true]);
        $this->assertTrue($task->completed);
        $task->incomplete();
        $this->assertFalse($task->fresh()->completed);
    }
}
