<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display contact page
     */
    public function index()
    {
        return view('website.pages.contact');
    }

    /**
     * Store contact form submission
     */
    public function store(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'service' => 'required|string|in:web,mobile,marketing,seo,ui,other',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:5000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Create contact record
            $contact = Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'service' => $request->service,
                'subject' => $request->subject,
                'message' => $request->message,
                'ip_address' => $request->ip(),
                'status' => 'new'
            ]);

            // Send email notification to admin (optional)
            // Mail::to('admin@shivatechdigital.com')->send(new ContactFormSubmitted($contact));

            // Send thank you email to user (optional)
            // Mail::to($contact->email)->send(new ContactThankYou($contact));

            return response()->json([
                'success' => true,
                'message' => 'Thank you for contacting us! We will get back to you within 24 hours.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }
}