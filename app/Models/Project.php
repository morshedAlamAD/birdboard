<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function path()
    {
        return "/project/{$this->id}";
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function addTask($body)
    {
        // $this->createActivity('Task Added');
        return $this->tasks()->create(compact('body'));
    }
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
    public function createActivity($pram)
    {
         Activity::create([
        "project_id"=> $this->id,
        "description"=>$pram,
        ]);
    }
}
