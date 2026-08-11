<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobOpening;
use Illuminate\Support\Facades\Schema;

class CareerController extends Controller
{
    public function index()
    {
        $jobs = collect();

        if (Schema::hasTable('job_openings')) {
            $jobs = JobOpening::active()
                ->orderBy('order')
                ->orderByDesc('created_at')
                ->get();
        }

        if ($jobs->isEmpty()) {
            $jobs = collect([
                (object) [
                    'title' => 'Laravel Developer',
                    'department' => 'Engineering',
                    'location' => 'Noida / Hybrid',
                    'employment_type_label' => 'Full Time',
                    'experience_level' => '1-3 years',
                    'summary' => 'Build and optimize modern Laravel applications with clean architecture.',
                ],
                (object) [
                    'title' => 'SEO Executive',
                    'department' => 'Marketing',
                    'location' => 'Noida / Remote',
                    'employment_type_label' => 'Full Time',
                    'experience_level' => '1-2 years',
                    'summary' => 'Drive organic growth with keyword research, technical SEO, and reporting.',
                ],
                (object) [
                    'title' => 'UI/UX Design Intern',
                    'department' => 'Design',
                    'location' => 'Remote',
                    'employment_type_label' => 'Internship',
                    'experience_level' => '0-1 years',
                    'summary' => 'Design user journeys, wireframes, and polished UI for web and mobile products.',
                ],
            ]);
        }

        return view('website.pages.careers', compact('jobs'));
    }
}
