<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $partners = Partner::active()->oldest()->get();
        return view('website.pages.home', compact('partners'));
    }
}
