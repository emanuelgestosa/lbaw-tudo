<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     *@var array
     */
    protected $fillable = [
        'id_users',
        'id_administrator',
        'reason', 
        'start_date',
        'end_date',
    ];

    public $timestamps=false;
    public $table="ban";

    public function admin(){
        return $this->belongsTo(Administrator::class,"id_administrator"); 
    }
    public function user(){
        return $this->belongsTo(User::class,"id_users");
    }

}
