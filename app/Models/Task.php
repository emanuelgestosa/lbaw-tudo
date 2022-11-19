<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table = "task";

    public function vertical(){
        return $this->belongsTo(Vertical::class,"id_vertical");
    }
    public function labels(){
        return $this->belongsToMany(Label::class,"label_task","id_label","id_task");
    }
    public function comments(){
        return $this->hasMany(Comment::class,"id_task");
    }
    public function assignees(){
        return  $this->belongsToMany(User::class,"assignmnt","id_users","id_task");
    }
}
