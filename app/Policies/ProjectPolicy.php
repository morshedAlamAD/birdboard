<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function update(User $user, Project $project)
    {
        return auth()->user()->is($project->users);
    }
    public function store(User $user, Project $project)
    {
        return is(auth()->user());
    }
}
