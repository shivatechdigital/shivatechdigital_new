<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'title',
        'price_label',
        'description',
        'features',
        'is_popular',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'features' => 'array',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
    ];

    public static function categoryLabels(): array
    {
        return [
            'website' => 'Website',
            'mobile' => 'Mobile App',
            'seo' => 'SEO / Marketing',
            'maintenance' => 'Maintenance',
        ];
    }

    public function getCategoryLabelAttribute(): string
    {
        return self::categoryLabels()[$this->category] ?? ucfirst($this->category);
    }
}
