<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Msg extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table = "msg";

    public function post(){
        return $this->belongsTo(Post::class,"id_post");
    }
    public function author(){
        return $this->belongsTo(User::class,"id_user");
    }
}
