<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table = "post";

    public function forum(){
        return $this->belongsTo(Forum::class,"id_forum");
    }
    public function msgs(){
        return $this->hasMany(Msg::class,"id_msg");
    }

    // Ainda não está contempaldo na bd
    // public function author(){
    //     return $this->belongsTo(User::class,"id_user");
    // }
}
