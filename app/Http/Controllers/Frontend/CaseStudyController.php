<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Support\Facades\Schema;

class CaseStudyController extends Controller
{
    public function index()
    {
        $caseStudies = collect();

        if (Schema::hasTable('case_studies')) {
            $caseStudies = CaseStudy::active()
                ->orderByDesc('is_featured')
                ->orderBy('order')
                ->orderByDesc('created_at')
                ->get();
        }

        if ($caseStudies->isEmpty()) {
            $caseStudies = collect([
                (object) [
                    'title' => 'E-commerce Store Speed & Conversion Revamp',
                    'slug' => 'ecommerce-store-speed-conversion-revamp',
                    'industry' => 'Retail',
                    'project_type' => 'Web Development + CRO',
                    'challenge' => 'High bounce rates and slow mobile performance were hurting campaigns.',
                    'solution' => 'Rebuilt key pages, optimized assets, and improved checkout UX.',
                    'results' => 'Faster load times and better conversion from paid traffic within 8 weeks.',
                    'result_metrics' => [
                        ['label' => 'Page Speed Improvement', 'value' => '62%'],
                        ['label' => 'Conversion Uplift', 'value' => '31%'],
                        ['label' => 'Bounce Rate Drop', 'value' => '24%'],
                    ],
                    'technologies' => ['Laravel', 'Vue.js', 'Cloudflare'],
                    'thumbnail' => null,
                ],
                (object) [
                    'title' => 'B2B Lead Pipeline Automation',
                    'slug' => 'b2b-lead-pipeline-automation',
                    'industry' => 'SaaS',
                    'project_type' => 'CRM + Automation',
                    'challenge' => 'Manual lead handoffs delayed sales follow-up and reduced close rate.',
                    'solution' => 'Implemented capture-to-CRM automation with scoring and alerts.',
                    'results' => 'Sales team response became near real-time with better lead quality.',
                    'result_metrics' => [
                        ['label' => 'Lead Response Time', 'value' => '-73%'],
                        ['label' => 'Qualified Leads', 'value' => '+41%'],
                        ['label' => 'Sales Velocity', 'value' => '+26%'],
                    ],
                    'technologies' => ['Laravel', 'Webhook API', 'GA4'],
                    'thumbnail' => null,
                ],
            ]);
        }

        return view('website.pages.case-studies.index', compact('caseStudies'));
    }

    public function show(string $slug)
    {
        if (Schema::hasTable('case_studies')) {
            $caseStudy = CaseStudy::active()->where('slug', $slug)->first();
            if ($caseStudy) {
                return view('website.pages.case-studies.show', compact('caseStudy'));
            }
        }

        abort(404);
    }
}
