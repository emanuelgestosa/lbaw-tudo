<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vertical extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     *@var array
     */
    protected $fillable = [
        'name',
        'id_board',
        'isdone',
    ];

    public $timestamps=false;
    public $table = "vertical";

    public function project(){
        return $this->belongsTo(Board::class,"id_board");
    }

    public function tasks(){
        return $this->hasMany(Task::class,"id_vertical");
    }
}
