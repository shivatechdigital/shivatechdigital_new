<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteOption;
use Illuminate\Http\Request;

class QuoteConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:quotes.manage');
    }

    public function index()
    {
        $options = QuoteOption::orderBy('sort_order')->orderBy('label')->get();

        return view('adminDashboard.pages.quote-config.index', compact('options'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'option_key' => 'required|string|max:100|unique:quote_options,option_key',
            'label' => 'required|string|max:255',
            'base_price' => 'required|integer|min:0',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'required|boolean',
        ]);

        QuoteOption::create([
            ...$validated,
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return back()->with('success', 'Quote option added successfully.');
    }

    public function update(Request $request, QuoteOption $option)
    {
        $validated = $request->validate([
            'option_key' => 'required|string|max:100|unique:quote_options,option_key,' . $option->id,
            'label' => 'required|string|max:255',
            'base_price' => 'required|integer|min:0',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'required|boolean',
        ]);

        $option->update([
            ...$validated,
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return back()->with('success', 'Quote option updated successfully.');
    }

    public function destroy(QuoteOption $option)
    {
        $option->delete();

        return back()->with('success', 'Quote option deleted.');
    }
}
