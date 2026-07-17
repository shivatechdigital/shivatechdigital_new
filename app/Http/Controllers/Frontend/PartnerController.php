<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;


class PartnerController extends Controller
{
    //
    public function partner()
    {
        $partners = Partner::active()->latest()->get();
        return view('website.pages.home', compact('partners'));
    }
}
