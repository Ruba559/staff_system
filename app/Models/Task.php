<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
       'title' , 'specified_time' , 'project_id' , 'user_id' , 'is_executed' , 'remind_date' , 'remind_time' , 'remind_repeat' , 'file'
     ];


     public function project()
     {
       return $this->belongsTo(Project::class);
     }

     public function user()
     {
       return $this->belongsTo(User::class);
     }

     public function manager()
     {
         return $this->belongsTo(User::class, 'manager_id');
     }
     public function steps()
     {
         return $this->hasMany(Step::class, 'task_id', 'id');
     }

}
