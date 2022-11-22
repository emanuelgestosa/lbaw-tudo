<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table = "label";

    public function tasks(){
        return $this->belongsToMany(Task::class,"label_task","id_label","id_task");
    }
    public function classes(){
        return $this->belongsToMany(LabelClass::class,"label_label_class","id_label","id_label_class");
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
