<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    
    public function projects(){
        return $this->belongsToMany(Project::class,"id_project");
    }

    public function tasks(){
        return $this->belongsToMany(Task::class,"assignmnt","id_task","id_users");
    }
}
