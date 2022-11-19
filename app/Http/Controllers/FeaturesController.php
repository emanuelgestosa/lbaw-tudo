<?php

namespace App\Http\Controllers;

class FeaturesController extends Controller
{
    /**
     * Shows the features page.
     */
    public function show()
    {
      return view('pages.features');
    }
}
