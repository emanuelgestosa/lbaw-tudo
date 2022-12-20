<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use App\Models\Label;

class FullTextSearchController extends Controller
{
    //
    public static function users(Request $r)
    {
        // Need to parse query
        $search =  $r->get('query');
        $maxItems = $r->get('maxItems', 0);
        $result = User::search($search)->take($maxItems)->get();
        return response()
            ->json($result, 200);
    }
    public static function projects(Request $r)
    {
        $search =  $r->get('query');
        $maxItems = $r->get('maxItems', 0);
        $result = Project::search($search)->take($maxItems)->get();
        return response()
            ->json($result);
    }
    public static function tasks(Request $r)
    {
        $search =  $r->get('query');
        $maxItems = $r->get('maxItems', 0);
        $result = Task::search($search)->take($maxItems)->get();
        return response()
            ->json($result);
    }
    public static function labels(Request $r)
    {
        $search =  $r->get('query');
        $maxItems = $r->get('maxItems', 0);
        $result = Label::search($search)->take($maxItems)->get();
        return response()
            ->json($result);
    }
}
