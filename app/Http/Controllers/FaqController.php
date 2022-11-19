<?php

namespace App\Http\Controllers;

class FaqController extends Controller
{
    /**
     * Shows the FAQ page.
     */
    public function show()
    {
      return view('pages.faq');
    }

    /**
     * Retrieve all FAQs
     */
    // public function retrieve()
    // {
    //   $faq = new FAQ(());
    // }
}
