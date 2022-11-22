<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table = "invite";

    public function invited(){
        return $this->belongsTo(User::class,"id_invitee");
    }
    public function inviter(){
        return $this->belongsTo(User::class,"id_inviter");
    }
    public function project(){
        return $this->belongsTo(Project::class,"id_project");
    }
}
