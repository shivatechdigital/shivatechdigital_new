<?php

namespace App\Http\Controllers;
use App\Models\ServiceContract;
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
        ServiceContract::create([
            'name' => $request->name,
            'email' => $request->email,
            'service' => $request->service,
            'contact' => $request->contact,
            'status' => 'new',
        ]);
        return back()->with('success', 'Thanks! We will contact you shortly.');
    }
}
