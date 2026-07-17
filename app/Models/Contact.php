<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'service',
        'subject',
        'message',
        'status',
        'ip_address',
        'admin_notes',
        'read_at'
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    // Scope for new contacts
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    // Scope for unread contacts
    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    // Mark as read
    public function markAsRead()
    {
        if (!$this->read_at) {
            $this->update([
                'read_at' => now(),
                'status' => 'read'
            ]);
        }
    }

    // Get status badge color
    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'new' => 'bg-primary',
            'read' => 'bg-info',
            'replied' => 'bg-success',
            'archived' => 'bg-secondary',
            default => 'bg-secondary'
        };
    }

    // Get service name
    public function getServiceNameAttribute()
    {
        return match($this->service) {
            'web' => 'Web Application',
            'mobile' => 'Mobile Application',
            'marketing' => 'Digital Marketing',
            'seo' => 'SEO Services',
            'ui' => 'UI/UX Design',
            'other' => 'Other',
            default => $this->service
        };
    }
}