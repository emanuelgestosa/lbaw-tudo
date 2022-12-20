<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Invite;
use Illuminate\Http\Request;

class ProjectInvitesController extends Controller
{
    public static function invites($id)
    {
        $result = Project::find($id)->invites()->get();
        return response()->json($result);
    }
    public static function sendInvite(Request $r, $id)
    {
        $invitee = $r->input('id_invitee');
        $inviter = $r->input('id_inviter');
        $invite = Invite::create(
            [
                'id_invitee' => $invitee,
                'id_inviter' => $inviter,
                'id_project' => $id
            ]
        );
        return response()->json(["success" => true]);
    } 
}
