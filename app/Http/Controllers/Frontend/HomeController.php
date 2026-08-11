<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Testimonial;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $partners     = Partner::active()->oldest()->get();
        $testimonials = Testimonial::featured()->orderBy('order')->get();
        return view('website.pages.home', compact('partners', 'testimonials'));
    }
}
