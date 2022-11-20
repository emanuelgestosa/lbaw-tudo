<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table = "role";

    public function project(){
        return $this->belongsTo(Project::class,"id_project");
    }
    public function users(){
        return $this->belongsToMany(User::class,"users_role","id_users","id_role");
    }
    public function permissions(){
        return $this->belongsToMany(Permission::class,"role_permission","id_permission","id_role"); 
    } 
}
