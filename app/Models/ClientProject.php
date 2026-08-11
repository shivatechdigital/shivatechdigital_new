<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ClientProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'project_type',
        'status',
        'progress',
        'start_date',
        'estimated_delivery_date',
        'last_updated_at',
        'client_note',
        'milestones',
        'is_active',
    ];

    protected $casts = [
        'milestones' => 'array',
        'start_date' => 'date',
        'estimated_delivery_date' => 'date',
        'last_updated_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public static function statusLabels(): array
    {
        return [
            'planning' => 'Planning',
            'in_progress' => 'In Progress',
            'in_review' => 'In Review',
            'qa_testing' => 'QA Testing',
            'completed' => 'Completed',
            'on_hold' => 'On Hold',
        ];
    }

    public function getStatusLabelAttribute(): string
    {
        return self::statusLabels()[$this->status] ?? Str::title(str_replace('_', ' ', $this->status));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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

            if (empty($model->last_updated_at)) {
                $model->last_updated_at = now();
            }
        });

        static::updating(function (self $model) {
            $model->last_updated_at = now();
        });
    }
}
