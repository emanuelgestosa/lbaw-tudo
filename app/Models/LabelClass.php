<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabelClass extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table= "label_class";

    public function labels(){
        return $this->belongsToMany(Label::class,"label_label_class","id_label","id_label_class");
    }
}
