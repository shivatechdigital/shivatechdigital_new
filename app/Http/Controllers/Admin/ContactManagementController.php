<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactManagementController extends Controller
{
    /**
     * Display all contacts
     */
    public function index(Request $request)
    {
        $query = Contact::query();

        // Filter by status
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        // Sort
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $contacts = $query->paginate(20);

        // Get statistics
        $stats = [
            'total' => Contact::count(),
            'new' => Contact::where('status', 'new')->count(),
            'read' => Contact::where('status', 'read')->count(),
            'replied' => Contact::where('status', 'replied')->count(),
            'archived' => Contact::where('status', 'archived')->count(),
        ];

        return view('adminDashboard.pages.contact', compact('contacts', 'stats'));
    }

    /**
     * Display single contact
     */
    public function show(Contact $contact)
    {
        // Mark as read
        $contact->markAsRead();

        return view('adminDashboard.pages.showcontact', compact('contact'));
    }

    /**
     * Update contact status
     */
    public function updateStatus(Request $request, Contact $contact)
    {
        $request->validate([
            'status' => 'required|in:new,read,replied,archived'
        ]);

        $contact->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Status updated successfully!');
    }

    /**
     * Update admin notes
     */
    public function updateNotes(Request $request, Contact $contact)
    {
        $request->validate([
            'admin_notes' => 'nullable|string|max:1000'
        ]);

        $contact->update([
            'admin_notes' => $request->admin_notes
        ]);

        return redirect()->back()->with('success', 'Notes updated successfully!');
    }

    /**
     * Delete contact
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('adminDashboard.pages.contact')
            ->with('success', 'Contact deleted successfully!');
    }

    /**
     * Bulk delete
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'contact_ids' => 'required|array',
            'contact_ids.*' => 'exists:contacts,id'
        ]);

        Contact::whereIn('id', $request->contact_ids)->delete();

        return redirect()->route('adminDashboard.pages.contact')
            ->with('success', count($request->contact_ids) . ' contacts deleted successfully!');
    }

    /**
     * Bulk update status
     */
    public function bulkUpdateStatus(Request $request)
    {
        $request->validate([
            'contact_ids' => 'required|array',
            'contact_ids.*' => 'exists:contacts,id',
            'status' => 'required|in:new,read,replied,archived'
        ]);

        Contact::whereIn('id', $request->contact_ids)->update([
            'status' => $request->status
        ]);

        return redirect()->route('adminDashboard.pages.contact')
            ->with('success', count($request->contact_ids) . ' contacts updated successfully!');
    }
}