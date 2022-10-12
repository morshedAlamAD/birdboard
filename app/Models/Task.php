<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $touches = ['project'];
    protected $casts = [
        'completed'=> 'boolean'
    ];

       public static function boot() {
            parent::boot();
            static::created(function($task) {
                $task->project->createActivity('Task Added');
            });
        }
    public function complete()
    {
        $this->project->createActivity('Task Completed');
        return $this->update(['completed' => true]);
    }
    public function incomplete()
    {
        return $this->update(['completed'=> false]);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function path()
    {
        return '/project/'.$this->project->id.'/tasks/'. $this->id;
    }
}
