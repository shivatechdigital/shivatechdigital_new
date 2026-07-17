<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_tagline',
        'site_logo',
        'site_icon',
        'site_email',
        'site_phone',
        'site_address',
        'site_url',
        'site_description',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'instagram_url',
        'youtube_url',
        'og_image',
        'footer_text',
        'timezone',
        'site_status',
        'meta_keywords',
        'meta_description',
        'google_analytics',
        'google_verification',
        'whatsapp_number',
        'support_email',
        'business_hours',
        'google_map_embed',
        'meta_title',
    ];

    /**
     * Get the settings instance (singleton pattern)
     */
    public static function getSettings()
    {
        return Cache::remember('site_settings', 3600, function () {
            return self::first() ?? self::create([
                'site_name' => config('app.name', 'Laravel'),
                'site_email' => config('mail.from.address'),
            ]);
        });
    }

    /**
     * Clear settings cache
     */
    public static function clearCache()
    {
        Cache::forget('site_settings');
    }

    /**
     * Boot method to clear cache on save
     */
    protected static function boot()
    {
        parent::boot();

        static::saved(function () {
            self::clearCache();
        });

        static::deleted(function () {
            self::clearCache();
        });
    }
}