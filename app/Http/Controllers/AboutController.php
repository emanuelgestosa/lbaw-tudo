<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    /**
     * Shows the about page.
     */
    public function show()
    {
      return view('pages.static.about');
    }
}
