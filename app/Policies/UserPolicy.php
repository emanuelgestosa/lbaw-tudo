<?php

namespace App\Policies;

use App\Models\Administrator;
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
}
