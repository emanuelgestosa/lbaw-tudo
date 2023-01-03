<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Invite;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectInvitesController extends Controller
{
    public static function invites($id)
    {
        if (!Project::find($id)) {
            return response()->json(["Message" => "Object Does Not Exist"], 404);
        }
        $result = Project::find($id)->invites()->get()->all();
        $resultList = [];
            foreach ($result as $key => $invite){
                $inviter = User::find($invite->id_inviter);
                $invitee = User::find($invite->id_invitee);
                $invite["inviter"] = $inviter;
                $invite["invitee"] = $invitee;
                $resultList[$key] = $invite;
            }

        return response()->json($resultList,200);
    }
    public static function sendInvite(Request $r, $id)
    {

        $invitee = $r->input('id_invitee');
        $inviter = $r->input('id_inviter');
        if (!User::find($invitee) || !User::find($inviter) || !Project::find($id)) {
            return response()->json(["Message" => "Object Does Not Exist"], 404);
        }
        $inProject = Project::find($id)->collaborators->where('id', $invitee)->all() !== [];
        if ($inProject) {
            return response()->json(["Message" => "User Already In Project"], 400);
        }
        $alreadyInvited = Project::find($id)->invites->where('id_invitee', $invitee)->all() !== [];
        if ($alreadyInvited) {
            return response()->json(["Message" => "User was Already Invited"], 400);
        } else {
            $invite = Invite::create(
                [
                    'id_invitee' => $invitee,
                    'id_inviter' => $inviter,
                    'id_project' => $id
                ]
            );
            return response()->json(["Message" => "Successefully Sent Invite"], 201);
        }
    }
    public static function deleteInvite(Request $r, $id)
    {
        $inviteId = $r->input('inviteId');
        $invite = Invite::find($inviteId);
        if ($invite) {
            if ($invite->id_project != $id) {
                return response()->json(["Message" => "Invite Does Not Belong To this Project"], 405);
            } else {
                $invite->delete();
                return response()->json(["Message" => "Successefully Removed Invite"], 200);
            }
        } else {
            return response()->json(["Message" => "Invite Does Not Exist"], 404);
        }
    }
}
