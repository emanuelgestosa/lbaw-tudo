<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Administrator extends User
{
    use HasFactory;
    public $timestamps=false;
    public $table="administrator";
    
    public function user(){
        return $this->hasOne(User::class,'id','id_users');
    }

    public function bans(){
        return $this->hasMany(Ban::class,"id_administrator");
    }
}
