<?php

namespace App\Http\Controllers\Admin;
use App\Models\ServiceContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceContractController extends Controller
{
    
    /* ---------------- SHOW ALL QUERIES ---------------- */
    public function index()
    {
        $queries = ServiceContract::latest()->paginate(10);
        return view('adminDashboard.pages.servicequeries.index', compact('queries'));
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
}