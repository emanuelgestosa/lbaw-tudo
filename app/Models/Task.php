<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     *@var array
     */
    protected $fillable = [
        'id_vertical',
    ];

    public $timestamps=false;
    public $table = "task";

    public function vertical(){
        return $this->belongsTo(Vertical::class,"id_vertical");
    }
    public function labels(){
        return $this->belongsToMany(Label::class,"label_task","id_task","id_label");
    }
    public function comments(){
        return $this->hasMany(Comment::class,"id_task");
    }
    public function assignees(){
        return  $this->belongsToMany(User::class,"assignmnt","id_task","id_users");
    }
    public function scopesearch($query,$search)
    {  
        if (!$search) {
            return $query;
        }
        return $query->whereraw('tsvectors @@ plainto_tsquery(\'english\', ?)', [$search])
            ->orderbyraw('ts_rank(tsvectors, plainto_tsquery(\'english\', ?)) desc', [$search]);
    }   
}
