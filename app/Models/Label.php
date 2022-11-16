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
        return $this->belongsToMany(Task::class,"label_task","id_task","id_label");
    }
    public function classes(){
        return $this->belongsToMany(LabelClass::class,"label_label_class","id_label_class","id_label");
    }
}
