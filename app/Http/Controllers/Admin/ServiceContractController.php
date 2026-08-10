<?php

namespace App\Http\Controllers\Admin;
use App\Models\ServiceContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceContractController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:servicequeries.view')->only(['index', 'show', 'edit']);
        $this->middleware('permission:servicequeries.update')->only(['update']);
        $this->middleware('permission:servicequeries.delete')->only(['destroy', 'bulkDelete']);
        $this->middleware('permission:servicequeries.resolve')->only(['toggleStatus']);
    }

    
    /* ---------------- SHOW ALL QUERIES ---------------- */
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));
        $status = (string) $request->input('status', 'all');
        $sortBy = (string) $request->input('sort_by', 'created');
        $sortOrder = strtolower((string) $request->input('sort_order', 'desc'));
        $allowedPerPage = [10, 20, 50, 100];
        $perPage = (int) $request->input('per_page', 10);

        if (!in_array($perPage, $allowedPerPage, true)) {
            $perPage = 10;
        }

        if (!in_array($sortOrder, ['asc', 'desc'], true)) {
            $sortOrder = 'desc';
        }

        $sortMap = [
            'id' => 'id',
            'name' => 'name',
            'email' => 'email',
            'contact' => 'contact',
            'service' => 'service',
            'status' => 'status',
            'created' => 'created_at',
        ];

        if (!array_key_exists($sortBy, $sortMap)) {
            $sortBy = 'created';
        }

        $queries = $this->buildQueries($search, $status)
            ->orderBy($sortMap[$sortBy], $sortOrder)
            ->paginate($perPage)
            ->appends($request->query());

        return view('adminDashboard.pages.servicequeries.index', compact(
            'queries',
            'search',
            'status',
            'sortBy',
            'sortOrder',
            'perPage'
        ));
    }

    /* ---------------- EDIT PAGE ---------------- */
    public function edit(ServiceContract $servicecontact)
    {
        $query = $servicecontact; // just renaming for blade clarity
        return view('adminDashboard.pages.servicequeries.edit', compact('query'));
    }

    /* ---------------- UPDATE DATA ---------------- */
    public function update(Request $request, ServiceContract $servicecontact)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'contact' => 'required|string|max:100',
            'service' => 'required|string|max:255',
            'status'  => 'required|in:new,resolved',
        ]);

        $servicecontact->update($request->only('name', 'email', 'contact', 'service', 'status'));

        return redirect()->route('admin.servicecontact.index')
                         ->with('success','Query Updated Successfully!');
    }

    /* ---------------- DELETE ---------------- */
    public function destroy(ServiceContract $servicecontact)
    {
        $servicecontact->delete();
        return back()->with('success','Query deleted');
    }

    public function bulkDelete(Request $request)
    {
        $validated = $request->validate([
            'query_ids' => 'required|array|min:1',
            'query_ids.*' => 'exists:service_contracts,id',
        ]);

        ServiceContract::whereIn('id', $validated['query_ids'])->delete();

        return redirect()->route('admin.servicecontact.index')
            ->with('success', 'Selected queries deleted successfully');
    }

    public function toggleStatus(ServiceContract $servicecontact)
    {
        $nextStatus = $servicecontact->status === 'resolved' ? 'new' : 'resolved';

        $servicecontact->update([
            'status' => $nextStatus,
        ]);

        return back()->with('success', 'Query status updated successfully');
    }

    private function buildQueries(string $search, string $status)
    {
        $query = ServiceContract::query();

        if ($search !== '') {
            $query->where(function ($innerQuery) use ($search) {
                $innerQuery->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('contact', 'like', '%' . $search . '%')
                    ->orWhere('service', 'like', '%' . $search . '%');
            });
        }

        if ($status === 'new') {
            $query->where('status', 'new');
        } elseif ($status === 'resolved') {
            $query->where('status', 'resolved');
        }

        return $query;
    }
}