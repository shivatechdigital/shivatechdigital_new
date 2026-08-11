<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_opening_id',
        'name',
        'address',
        'phone',
        'email',
        'resume_path',
        'status',
        'admin_note',
    ];

    public static function statusLabels(): array
    {
        return [
            'submitted' => 'Submitted',
            'reviewing' => 'Reviewing',
            'shortlisted' => 'Shortlisted',
            'rejected' => 'Rejected',
            'hired' => 'Hired',
        ];
    }

    public function getStatusLabelAttribute(): string
    {
        return self::statusLabels()[$this->status] ?? ucfirst($this->status);
    }

    public function job()
    {
        return $this->belongsTo(JobOpening::class, 'job_opening_id');
    }
}
