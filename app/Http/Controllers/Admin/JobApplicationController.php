<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:jobapplications.view')->only(['index']);
        $this->middleware('permission:jobapplications.update')->only(['update']);
        $this->middleware('permission:jobapplications.delete')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $status = (string) $request->input('status', 'all');
        $search = trim((string) $request->input('search', ''));

        $query = JobApplication::with('job')->latest();

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $applications = $query->paginate(12)->appends($request->query());
        $statusLabels = JobApplication::statusLabels();

        return view('adminDashboard.pages.jobs.applications', compact('applications', 'status', 'search', 'statusLabels'));
    }

    public function update(Request $request, JobApplication $application)
    {
        $validated = $request->validate([
            'status' => 'required|in:submitted,reviewing,shortlisted,rejected,hired',
            'admin_note' => 'nullable|string|max:1000',
        ]);

        $application->update($validated);

        return back()->with('success', 'Application updated successfully.');
    }

    public function destroy(JobApplication $application)
    {
        if ($application->resume_path) {
            Storage::disk('public')->delete($application->resume_path);
        }

        $application->delete();

        return back()->with('success', 'Application deleted.');
    }
}
