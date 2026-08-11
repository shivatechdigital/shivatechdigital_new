<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class QuoteCalculatorController extends Controller
{
    public function index()
    {
        return view('website.pages.quote-calculator');
    }
}
