<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects   = PortfolioProject::active()->orderBy('order')->orderByDesc('created_at')->get();
        $categories = PortfolioProject::categoryLabels();
        return view('website.pages.portfolio', compact('projects', 'categories'));
    }
}
