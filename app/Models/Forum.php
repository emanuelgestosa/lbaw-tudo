<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table = "forum";

    public function project(){
        return $this->belongsTo(Project::class,"id_project");
    }
    public function posts(){
        return $this->hasMany(Post::class,"id_forum");
    }
}
