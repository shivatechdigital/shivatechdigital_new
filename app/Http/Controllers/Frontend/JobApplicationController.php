<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\JobApplicationReceivedMail;
use App\Models\JobApplication;
use App\Models\JobOpening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

class JobApplicationController extends Controller
{
    public function create(string $slug)
    {
        abort_unless(Schema::hasTable('job_openings'), 404);

        $job = JobOpening::active()->where('slug', $slug)->firstOrFail();

        return view('website.pages.job-apply', compact('job'));
    }

    public function store(Request $request, string $slug)
    {
        abort_unless(Schema::hasTable('job_openings'), 404);

        $job = JobOpening::active()->where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:30',
            'email' => 'required|email|max:255',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:4096',
        ]);

        $resumePath = $request->file('resume')->store('resumes', 'public');

        $application = JobApplication::create([
            'job_opening_id' => $job->id,
            'name' => $validated['name'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'resume_path' => $resumePath,
            'status' => 'submitted',
        ]);

        try {
            Mail::to($application->email)->send(new JobApplicationReceivedMail($application));
        } catch (\Throwable $e) {
            report($e);
        }

        return redirect()->route('careers.apply', $job->slug)
            ->with('success', 'Application submitted successfully. Thank you!');
    }
}
