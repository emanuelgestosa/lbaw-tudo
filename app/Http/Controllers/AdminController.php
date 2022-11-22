<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrator;

class AdminController extends Controller
{
    /**
     * Shows administration page.
     */
    public function show()
    {
      return view('pages.administration');
    }

    public function showCreate()
    {
      return view('pages.administrationCreate');
    }
}
