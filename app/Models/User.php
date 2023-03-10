<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     *@var array
     */
    protected $fillable = [
        'name',
        'username',
        'email', 
        'password',
        'phone_number',
    ];

    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    
    public function projects(){
        return $this->belongsToMany(Project::class,"collaborator","id_users","id_project");
    }

    public function coordinates(){
        return $this->hasMany(Project::class,"id_coordinator");
    }

    public function tasks(){
        return $this->belongsToMany(Task::class,"assignmnt","id_users","id_task");
    }
    public function msgs(){
        return $this->hasMany(Msg::class,"id_users");
    }
        
     public function posts(){
         return $this->hasMany(Post::class,"id_user");
     }
    public function bans(){
        return $this->hasMany(Ban::class,"id_users");
    }
    public function roles(){
        return $this->belongsToMany(Role::class,"users_role","id_user","id_role");
    }

    public function invitesReceived(){
        return $this->hasMany(Invite::class,"id_invitee");
    }
    public function invitesSent(){
        return $this->hasMany(Invite::class,"id_inviter");
    }
    public function scopesearch($query,$search)
    {  
        if (!$search) {
            return $query;
        }
        return $query->whereraw('tsvectors @@ plainto_tsquery(\'english\', ?)', [$search])
            ->orderbyraw('ts_rank(tsvectors, plainto_tsquery(\'english\', ?)) desc', [$search]);
    }   
}

