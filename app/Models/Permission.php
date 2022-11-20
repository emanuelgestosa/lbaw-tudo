<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table = "permission";

    public function roles(){
        return $this->belongsToMany(Role::class,"role_permission","id_role","id_permission");
    }
}
