<?php

namespace App\Http\Controllers;

class ContactsController extends Controller
{
    /**
     * Shows the contacts page.
     */
    public function show()
    {
      return view('pages.static.contacts');
    }
}
