<?php

namespace App\Http\Controllers;
use App\Models\ServiceContract;
use App\Support\AdminNotifier;
use Illuminate\Http\Request;

class WebServiceContactController extends Controller
{
    //
    public function submit(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'service' => 'nullable|string|max:255',
            'contact' => 'required|string|max:100'
        ]);
        $serviceQuery = ServiceContract::create([
            'name' => $request->name,
            'email' => $request->email,
            'service' => $request->service,
            'contact' => $request->contact,
            'status' => 'new',
        ]);

        AdminNotifier::notify(
            'New Service Query',
            'A new service contact query was submitted by "' . $serviceQuery->name . '".',
            route('admin.servicecontact.index'),
            'service_query_created',
            ['service_query_id' => $serviceQuery->id]
        );

        return back()->with('success', 'Thanks! We will contact you shortly.');
    }
}
