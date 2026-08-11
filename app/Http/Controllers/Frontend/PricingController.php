<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use Illuminate\Support\Facades\Schema;

class PricingController extends Controller
{
    public function index()
    {
        $categories = ['website', 'mobile', 'seo', 'maintenance'];

        $plansByCategory = collect($categories)->mapWithKeys(fn($category) => [$category => collect()]);

        if (Schema::hasTable('pricing_plans')) {
            $plans = PricingPlan::where('is_active', true)
                ->orderBy('category')
                ->orderBy('sort_order')
                ->orderByDesc('created_at')
                ->get()
                ->groupBy('category');

            foreach ($categories as $category) {
                $plansByCategory[$category] = $plans->get($category, collect());
            }
        }

        return view('website.pages.pricing', compact('plansByCategory'));
    }
}
