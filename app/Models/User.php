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
    public function msgs(){
        return $this->hasMany(Msg::class,"id_users");
    }
    // Ainda não está contemplado na base de dados
    // public function posts(){
    //     return $this->hasMany(Post::class,"id_user");
    // }
}
