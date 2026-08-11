<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobOpening extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'department',
        'location',
        'employment_type',
        'experience_level',
        'salary_range',
        'summary',
        'requirements',
        'responsibilities',
        'is_active',
        'order',
    ];

    protected $casts = [
        'requirements' => 'array',
        'responsibilities' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public static function employmentTypeLabels(): array
    {
        return [
            'full_time' => 'Full Time',
            'part_time' => 'Part Time',
            'contract' => 'Contract',
            'internship' => 'Internship',
            'freelance' => 'Freelance',
        ];
    }

    public function getEmploymentTypeLabelAttribute(): string
    {
        return self::employmentTypeLabels()[$this->employment_type] ?? Str::title(str_replace('_', ' ', $this->employment_type));
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    protected static function booted(): void
    {
        static::creating(function (self $model) {
            if (empty($model->slug)) {
                $base = Str::slug($model->title);
                $slug = $base;
                $i = 1;

                while (static::where('slug', $slug)->exists()) {
                    $slug = $base . '-' . $i++;
                }

                $model->slug = $slug;
            }
        });
    }
}
