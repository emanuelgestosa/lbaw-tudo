<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public $timestamps  = false;
    public $table = "project";

    public function coordinator(){
        return $this->hasOne(User::class,"id","id_coordinator");
    }
    public function collaborators(){

        return $this->belongsToMany(User::class,"collaborator","id_project");
    }
    public function boards(){
        return $this->hasMany(Board::class,"id_project");
    }
}
