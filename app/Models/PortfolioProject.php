<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PortfolioProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'image',
        'project_url',
        'client_name',
        'technologies',
        'is_featured',
        'is_active',
        'order',
    ];

    protected $casts = [
        'technologies' => 'array',
        'is_featured'  => 'boolean',
        'is_active'    => 'boolean',
        'order'        => 'integer',
    ];

    public static function categoryLabels(): array
    {
        return [
            'web'       => 'Web Apps',
            'mobile'    => 'Mobile Apps',
            'marketing' => 'Digital Marketing',
            'design'    => 'UI/UX Design',
            'ecommerce' => 'E-commerce',
        ];
    }

    public function getCategoryLabelAttribute(): string
    {
        return self::categoryLabels()[$this->category] ?? ucfirst($this->category);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->where('is_active', true);
    }

    protected static function booted(): void
    {
        static::creating(function (self $model) {
            if (empty($model->slug)) {
                $base = Str::slug($model->title);
                $slug = $base;
                $i    = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $base . '-' . $i++;
                }
                $model->slug = $slug;
            }
        });
    }
}
