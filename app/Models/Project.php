<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * users
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    /**
     * path
     *
     * @return void
     */
    public function path()
    {
        return "/project/{$this->id}";
    }
    /**
     * tasks
     *
     * @return void
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    /**
     * addTask
     *
     * @param mixed body
     *
     * @return void
     */
    public function addTask($body)
    {
        // $this->createActivity('Task Added');
        return $this->tasks()->create(compact('body'));
    }
    /**
     * activities
     *
     * @return void
     */
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
    /**
     * createActivity
     *
     * @param mixed pram
     *
     * @return void
     */
    public function createActivity($pram)
    {
        Activity::create([
        "project_id"=> $this->id,
        "description"=>$pram
        ]);
    }
}
