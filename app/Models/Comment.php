<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table = "comment";

    public function task(){
        return $this->belongsTo(Task::class,"id_task");
    }
    public function user(){
        return $this->belongsTo(User::class,"id_users");
    }

}
