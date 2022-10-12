<?php
namespace Tests\Setup;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class ProjectFactory
{
    protected $taskCount = 0;
    protected $user;
    public function withTaskCount($count)
    {
        $this->taskCount= $count;
        return $this;
    }
    public function withUser($user)
    {
        $this->user= $user;
        return $this;
    }
    public function create()
    {
        $project=Project::factory()->create([
            'users_id'=> $this->user ?? User::factory()->create()
        ]);
        Task::factory()->count($this->taskCount)->create([
            'project_id'=>$project->id
        ]);
        return $project;
    }
}
