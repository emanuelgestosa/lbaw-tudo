<?php

namespace App\Policies;

use App\Models\Administrator;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function showAdmin(User $a){
        return !(!Auth::check() || (
          Auth::check() &&
          empty(Administrator::where('id_users', Auth::user()->id)->get()->all())));
    }
    
    public function project(User $a,Project $p){
        return !(!Auth::check() || (
          Auth::check() &&
          empty($p->collaborators()->where('id_collaborator','=',$a->id))));
    }

}
