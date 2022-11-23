<?php

namespace App\Http\Controllers;

class FeaturesController extends Controller
{
    /**
     * Shows the about page.
     */
    public function show()
    {
      return view('pages.features');
    }
}
