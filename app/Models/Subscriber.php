<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'source',
        'status',
        'unsubscribe_token',
        'subscribed_at',
        'unsubscribed_at',
    ];

    protected $casts = [
        'subscribed_at'   => 'datetime',
        'unsubscribed_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    protected static function booted(): void
    {
        static::creating(function (self $model) {
            if (empty($model->unsubscribe_token)) {
                $model->unsubscribe_token = Str::random(64);
            }
            if (empty($model->subscribed_at)) {
                $model->subscribed_at = now();
            }
        });
    }
}
