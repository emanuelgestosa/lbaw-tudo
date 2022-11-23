<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     *@var array
     */
    protected $fillable = [
        'name',
        'id_project',
    ];

    public $table ="board";
    public $timestamps=false;

    public function project(){
        return $this->belongsTo(Project::class,"id_project");
    }
    public function verticals(){
        return $this->hasMany(Vertical::class,"id_board");
    }
}
