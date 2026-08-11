<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\QuoteOption;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class QuoteRequestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:30',
            'project_type' => 'required|string|max:100',
            'budget_level' => 'required|integer|min:1|max:5',
            'timeline' => 'nullable|string|max:120',
            'selected_features' => 'nullable|array',
            'selected_features.*' => 'string|max:100',
            'estimated_amount' => 'required|integer|min:0',
            'estimated_min' => 'required|integer|min:0',
            'estimated_max' => 'required|integer|min:0',
            'requirements' => 'nullable|string|max:1500',
        ]);

        QuoteRequest::create([
            ...$validated,
            'selected_features' => $validated['selected_features'] ?? [],
            'user_id' => $request->user()?->id,
            'status' => 'submitted',
        ]);

        return back()->with('success', 'Quote request submitted successfully.');
    }

    public function calculatorData(): array
    {
        $projectTypes = [
            'website' => 35000,
            'ecommerce' => 60000,
            'webapp' => 90000,
            'mobile' => 120000,
            'marketing' => 28000,
        ];

        $featureOptions = [
            ['option_key' => 'admin_dashboard', 'label' => 'Admin Dashboard', 'base_price' => 12000],
            ['option_key' => 'payment_integration', 'label' => 'Payment Integration', 'base_price' => 9000],
            ['option_key' => 'crm_automation', 'label' => 'CRM/Automation', 'base_price' => 15000],
            ['option_key' => 'advanced_seo', 'label' => 'Advanced SEO Setup', 'base_price' => 7000],
        ];

        if (Schema::hasTable('quote_options')) {
            $options = QuoteOption::where('is_active', true)->orderBy('sort_order')->get();
            if ($options->isNotEmpty()) {
                $projectTypes = [];
                $featureOptions = [];

                foreach ($options as $option) {
                    if (str_starts_with($option->option_key, 'project_')) {
                        $projectTypes[str_replace('project_', '', $option->option_key)] = (int) $option->base_price;
                    } else {
                        $featureOptions[] = [
                            'option_key' => $option->option_key,
                            'label' => $option->label,
                            'base_price' => (int) $option->base_price,
                        ];
                    }
                }
            }
        }

        if (empty($projectTypes)) {
            $projectTypes = ['website' => 35000];
        }

        return [
            'projectTypes' => $projectTypes,
            'featureOptions' => $featureOptions,
            'timelineOptions' => [
                ['label' => 'Urgent (2-4 weeks)', 'multiplier' => 1.2, 'key' => 'urgent'],
                ['label' => 'Standard (1-3 months)', 'multiplier' => 1.0, 'key' => 'standard'],
                ['label' => 'Flexible (3+ months)', 'multiplier' => 0.85, 'key' => 'flexible'],
            ],
        ];
    }
}
