<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'location',
        'type',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    // Scope for active partners
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
