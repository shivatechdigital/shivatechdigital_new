<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuoteRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:quotes.view')->only(['index']);
        $this->middleware('permission:quotes.manage')->only(['update', 'quotation', 'saveQuotation', 'downloadDoc', 'downloadPdf']);
    }

    public function index(Request $request)
    {
        $status = (string) $request->input('status', 'all');
        $search = trim((string) $request->input('search', ''));

        $query = QuoteRequest::with('user')->latest();

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('project_type', 'like', "%{$search}%");
            });
        }

        $quoteRequests = $query->paginate(12)->appends($request->query());
        $statusLabels = QuoteRequest::statusLabels();

        return view('adminDashboard.pages.quote-requests.index', compact('quoteRequests', 'status', 'search', 'statusLabels'));
    }

    public function update(Request $request, QuoteRequest $quoteRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:submitted,reviewing,quoted,negotiating,approved,rejected',
            'quoted_amount' => 'nullable|integer|min:0',
            'quotation_message' => 'nullable|string|max:1500',
            'admin_note' => 'nullable|string|max:1000',
        ]);

        $quoteRequest->update($validated);

        return back()->with('success', 'Quote request updated successfully.');
    }

    public function quotation(QuoteRequest $quoteRequest)
    {
        return view('adminDashboard.pages.quote-requests.quotation', compact('quoteRequest'));
    }

    public function saveQuotation(Request $request, QuoteRequest $quoteRequest)
    {
        $validated = $request->validate([
            'quotation_number' => 'nullable|string|max:100',
            'quotation_subject' => 'nullable|string|max:255',
            'quotation_valid_till' => 'nullable|date',
            'quotation_discount' => 'nullable|integer|min:0',
            'quotation_tax_percent' => 'nullable|numeric|min:0|max:100',
            'quotation_message' => 'nullable|string|max:1500',
            'quotation_terms' => 'nullable|string|max:3000',
            'items' => 'nullable|array',
            'items.*.name' => 'nullable|string|max:255',
            'items.*.qty' => 'nullable|integer|min:1|max:999',
            'items.*.rate' => 'nullable|integer|min:0',
        ]);

        $lineItems = [];
        foreach ($request->input('items', []) as $item) {
            $name = trim((string) ($item['name'] ?? ''));
            if ($name === '') {
                continue;
            }

            $lineItems[] = [
                'name' => $name,
                'qty' => max(1, (int) ($item['qty'] ?? 1)),
                'rate' => max(0, (int) ($item['rate'] ?? 0)),
            ];
        }

        if (empty($lineItems)) {
            $lineItems[] = [
                'name' => ucwords(str_replace('_', ' ', $quoteRequest->project_type)) . ' Package',
                'qty' => 1,
                'rate' => (int) ($quoteRequest->quoted_amount ?: $quoteRequest->estimated_amount),
            ];
        }

        $subtotal = 0;
        foreach ($lineItems as $item) {
            $subtotal += ((int) $item['qty']) * ((int) $item['rate']);
        }
        $discount = (int) ($validated['quotation_discount'] ?? 0);
        $taxPercent = (float) ($validated['quotation_tax_percent'] ?? 0);
        $taxable = max(0, $subtotal - $discount);
        $taxAmount = (int) round($taxable * $taxPercent / 100);
        $quotedAmount = $taxable + $taxAmount;

        $quoteRequest->update([
            'status' => 'quoted',
            'quotation_number' => $validated['quotation_number'] ?: ('STD-' . now()->format('Ymd') . '-' . str_pad((string) $quoteRequest->id, 4, '0', STR_PAD_LEFT)),
            'quotation_subject' => $validated['quotation_subject'] ?: ('Quotation for ' . ucwords(str_replace('_', ' ', $quoteRequest->project_type))),
            'quotation_valid_till' => $validated['quotation_valid_till'] ?? now()->addDays(15)->toDateString(),
            'quotation_line_items' => $lineItems,
            'quotation_discount' => $discount,
            'quotation_tax_percent' => $taxPercent,
            'quotation_message' => $validated['quotation_message'] ?? null,
            'quotation_terms' => $validated['quotation_terms'] ?? null,
            'quoted_amount' => $quotedAmount,
        ]);

        return back()->with('success', 'Quotation saved. You can now download DOC/PDF.');
    }

    public function downloadDoc(QuoteRequest $quoteRequest)
    {
        $filename = $this->fileName($quoteRequest, 'doc');
        $content = view('adminDashboard.pages.quote-requests.exports.doc', compact('quoteRequest'))->render();

        return response($content)
            ->header('Content-Type', 'application/msword')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    public function downloadPdf(QuoteRequest $quoteRequest)
    {
        $pdf = Pdf::loadView('adminDashboard.pages.quote-requests.exports.pdf', compact('quoteRequest'));
        return $pdf->download($this->fileName($quoteRequest, 'pdf'));
    }

    private function fileName(QuoteRequest $quoteRequest, string $ext): string
    {
        $base = $quoteRequest->quotation_number ?: ('quotation-' . $quoteRequest->id);
        return Str::slug($base) . '.' . $ext;
    }
}
