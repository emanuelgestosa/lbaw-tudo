<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "invite";

    protected $fillable = [
        'id_invitee',
        'id_inviter',
        'id_project'
    ];
    public function invited()
    {
        return $this->belongsTo(User::class, "id_invitee");
    }
    public function inviter()
    {
        return $this->belongsTo(User::class, "id_inviter");
    }
    public function project()
    {
        return $this->belongsTo(Project::class, "id_project");
    }
    public static function exists($id_inviter, $id_invitee, $id_project)
    {
        return Invite::where("id_project", $id_project)
            ->where("id_inviter", $id_inviter)
            ->where("id_invitee", $id_invitee)
            ->get()
            ->all() !== [];
    }
}
