<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class ProjectsTasksController extends Controller
{
    public function store( Project $project)
    {
        if(auth()->user()->id!= $project->users_id){
            abort(403);
        }
        request()->validate([
            'body'=>'required'
        ]);
        $project->addTask(request('body'));
        return back();
    }
    public function update(Project $project, Task $task)
    {
    if(auth()->user()->id!= $project->users_id){
        abort(403);
    }
        request()->validate([
            'body'=>'required'
        ]);
        $task->update([
            'body'=>request('body'),
        ]);
        $methode= request('completed') ? 'complete': 'incomplete';
        $task->$methode();
        // if(request()->has('completed')){
        //     $task->complete();
        // }
        return back();
    }
}
