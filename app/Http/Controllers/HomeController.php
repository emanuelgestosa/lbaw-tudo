<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Shows the homepage.
     */
    public function show()
    {
      return view('pages.static.home');
    }
}
