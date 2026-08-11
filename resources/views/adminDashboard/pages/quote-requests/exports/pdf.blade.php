@php
    $items = $quoteRequest->quotation_line_items ?: [['name' => ucwords(str_replace('_', ' ', $quoteRequest->project_type)) . ' Package', 'qty' => 1, 'rate' => (int) ($quoteRequest->quoted_amount ?: $quoteRequest->estimated_amount)]];
    $subtotal = 0;
    foreach ($items as $item) {
        $subtotal += ((int) ($item['qty'] ?? 1)) * ((int) ($item['rate'] ?? 0));
    }
    $discount = (int) ($quoteRequest->quotation_discount ?? 0);
    $taxPercent = (float) ($quoteRequest->quotation_tax_percent ?? 0);
    $taxable = max(0, $subtotal - $discount);
    $taxAmount = (int) round($taxable * $taxPercent / 100);
    $total = $taxable + $taxAmount;
    $terms = $quoteRequest->quotation_terms ? preg_split('/\r\n|\r|\n/', $quoteRequest->quotation_terms) : [];
@endphp

<div style="font-family:DejaVu Sans, Arial, sans-serif; color:#0f172a; border:1px solid #e2e8f0; padding:20px; background:#fff;">
    <table width="100%" cellspacing="0" cellpadding="0" style="margin-bottom:16px;">
        <tr>
            <td>
                <h2 style="margin:0; font-size:24px;">Shiva Tech Digital</h2>
                <div style="font-size:12px; color:#475569;">Professional Quotation</div>
            </td>
            <td align="right" style="font-size:12px; color:#334155;">
                <div><strong>Quotation No:</strong> {{ $quoteRequest->quotation_number ?: 'STD-' . now()->format('Ymd') . '-' . str_pad((string) $quoteRequest->id, 4, '0', STR_PAD_LEFT) }}</div>
                <div><strong>Date:</strong> {{ now()->format('d M Y') }}</div>
                <div><strong>Valid Till:</strong> {{ optional($quoteRequest->quotation_valid_till)->format('d M Y') ?: now()->addDays(15)->format('d M Y') }}</div>
            </td>
        </tr>
    </table>

    <div style="margin-bottom:10px; font-size:13px;">
        <strong>To:</strong> {{ $quoteRequest->name }}<br>
        <strong>Email:</strong> {{ $quoteRequest->email }}
        @if($quoteRequest->phone)<br><strong>Phone:</strong> {{ $quoteRequest->phone }}@endif
    </div>

    <div style="margin-bottom:12px; font-size:13px;"><strong>Subject:</strong> {{ $quoteRequest->quotation_subject ?: ('Quotation for ' . ucwords(str_replace('_', ' ', $quoteRequest->project_type))) }}</div>

    @if($quoteRequest->quotation_message)
        <div style="margin-bottom:14px; font-size:13px; line-height:1.5;">{{ $quoteRequest->quotation_message }}</div>
    @endif

    <table width="100%" cellspacing="0" cellpadding="8" style="border-collapse:collapse; margin-bottom:14px; font-size:12px;">
        <thead>
            <tr style="background:#f1f5f9;">
                <th align="left" style="border:1px solid #cbd5e1;">Description</th>
                <th align="center" style="border:1px solid #cbd5e1; width:70px;">Qty</th>
                <th align="right" style="border:1px solid #cbd5e1; width:120px;">Rate (Rs)</th>
                <th align="right" style="border:1px solid #cbd5e1; width:140px;">Amount (Rs)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                @php
                    $qty = (int) ($item['qty'] ?? 1);
                    $rate = (int) ($item['rate'] ?? 0);
                    $amount = $qty * $rate;
                @endphp
                <tr>
                    <td style="border:1px solid #cbd5e1;">{{ $item['name'] ?? '' }}</td>
                    <td align="center" style="border:1px solid #cbd5e1;">{{ $qty }}</td>
                    <td align="right" style="border:1px solid #cbd5e1;">{{ number_format($rate) }}</td>
                    <td align="right" style="border:1px solid #cbd5e1;">{{ number_format($amount) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table width="100%" cellspacing="0" cellpadding="6" style="font-size:12px; margin-bottom:10px;">
        <tr><td align="right">Subtotal:</td><td align="right" style="width:160px;"><strong>Rs {{ number_format($subtotal) }}</strong></td></tr>
        <tr><td align="right">Discount:</td><td align="right"><strong>Rs {{ number_format($discount) }}</strong></td></tr>
        <tr><td align="right">Tax ({{ number_format($taxPercent, 2) }}%):</td><td align="right"><strong>Rs {{ number_format($taxAmount) }}</strong></td></tr>
        <tr><td align="right" style="font-size:14px;"><strong>Total:</strong></td><td align="right" style="font-size:14px;"><strong>Rs {{ number_format($total) }}</strong></td></tr>
    </table>

    @if(!empty($terms))
        <div style="margin-top:8px; font-size:12px;">
            <strong>Terms and Conditions:</strong>
            <ul style="margin:6px 0 0 16px; padding:0;">
                @foreach($terms as $term)
                    @if(trim($term) !== '')<li>{{ $term }}</li>@endif
                @endforeach
            </ul>
        </div>
    @endif

    <div style="margin-top:18px; font-size:12px; color:#475569;">Thank you for your trust. We look forward to working with you.</div>
</div>
