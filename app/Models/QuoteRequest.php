<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'project_type',
        'budget_level',
        'timeline',
        'selected_features',
        'estimated_amount',
        'estimated_min',
        'estimated_max',
        'requirements',
        'status',
        'quoted_amount',
        'quotation_number',
        'quotation_subject',
        'quotation_valid_till',
        'quotation_line_items',
        'quotation_discount',
        'quotation_tax_percent',
        'quotation_message',
        'quotation_terms',
        'admin_note',
    ];

    protected $casts = [
        'selected_features' => 'array',
        'budget_level' => 'integer',
        'estimated_amount' => 'integer',
        'estimated_min' => 'integer',
        'estimated_max' => 'integer',
        'quoted_amount' => 'integer',
        'quotation_valid_till' => 'date',
        'quotation_line_items' => 'array',
        'quotation_discount' => 'integer',
        'quotation_tax_percent' => 'decimal:2',
    ];

    public static function statusLabels(): array
    {
        return [
            'submitted' => 'Submitted',
            'reviewing' => 'Reviewing',
            'quoted' => 'Quoted',
            'negotiating' => 'Negotiating',
            'approved' => 'Approved',
            'rejected' => 'Rejected',
        ];
    }

    public function getStatusLabelAttribute(): string
    {
        return self::statusLabels()[$this->status] ?? ucfirst($this->status);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getQuotationSubtotalAttribute(): int
    {
        $items = $this->quotation_line_items ?? [];
        $subtotal = 0;

        foreach ($items as $item) {
            $qty = max(1, (int) ($item['qty'] ?? 1));
            $rate = max(0, (int) ($item['rate'] ?? 0));
            $subtotal += $qty * $rate;
        }

        return $subtotal;
    }

    public function getQuotationTaxAmountAttribute(): int
    {
        $base = max(0, $this->quotation_subtotal - (int) $this->quotation_discount);
        return (int) round($base * ((float) $this->quotation_tax_percent / 100));
    }

    public function getQuotationTotalAttribute(): int
    {
        return max(0, $this->quotation_subtotal - (int) $this->quotation_discount + $this->quotation_tax_amount);
    }
}
