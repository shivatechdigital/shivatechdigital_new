<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ClientProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ClientPortalController extends Controller
{
    public function index(Request $request)
    {
        $projects = collect();

        if (Schema::hasTable('client_projects')) {
            $query = ClientProject::with('user')->active()->orderByDesc('last_updated_at');

            if ($request->user()->role !== 'admin') {
                $query->where('user_id', $request->user()->id);
            }

            $projects = $query->get();
        }

        return view('website.pages.client-portal.index', compact('projects'));
    }

    public function show(Request $request, string $slug)
    {
        abort_unless(Schema::hasTable('client_projects'), 404);

        $query = ClientProject::with('user')->active()->where('slug', $slug);

        if ($request->user()->role !== 'admin') {
            $query->where('user_id', $request->user()->id);
        }

        $project = $query->firstOrFail();

        return view('website.pages.client-portal.show', compact('project'));
    }
}
