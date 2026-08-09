<?php

namespace App\Http\Controllers\Admin;
use App\Models\ServiceContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceContractController extends Controller
{
    
    /* ---------------- SHOW ALL QUERIES ---------------- */
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));
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
            'created' => 'created_at',
        ];

        if (!array_key_exists($sortBy, $sortMap)) {
            $sortBy = 'created';
        }

        $queries = $this->buildQueries($search)
            ->orderBy($sortMap[$sortBy], $sortOrder)
            ->paginate($perPage)
            ->appends($request->query());

        return view('adminDashboard.pages.servicequeries.index', compact(
            'queries',
            'search',
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
        ]);

        $servicecontact->update($request->only('name','email','contact','service'));

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

    private function buildQueries(string $search)
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

        return $query;
    }
}