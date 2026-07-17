<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceMeta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'service_meta';

    protected $fillable = [
        'page_slug',
        'page_type',
        'page_url',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'focus_keyword',
        'canonical_url',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
        'twitter_card',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'schema_markup',
        'breadcrumb_schema',
        'faq_schema',
        'h1_tag',
        'page_description',
        'target_keywords',
        'is_indexable',
        'is_followable',
        'robots_meta',
        'last_updated_by',
        'seo_score',
        'last_optimized_at',
        'current_clicks',
        'current_impressions',
        'current_ctr',
        'current_position',
        'stats_updated_at',
    ];

    protected $casts = [
        'target_keywords' => 'array',
        'is_indexable' => 'boolean',
        'is_followable' => 'boolean',
        'last_optimized_at' => 'datetime',
        'stats_updated_at' => 'datetime',
        'current_ctr' => 'decimal:2',
        'current_position' => 'decimal:2',
    ];

    /**
     * Get meta for a specific page slug
     * Used in blade files
     */
    public static function getForPage(string $slug): ?self
    {
        return static::where('page_slug', $slug)->first();
    }

    /**
     * Get with fallback values
     */
    public static function getWithDefaults(string $slug, array $defaults = []): array
    {
        $meta = static::getForPage($slug);
        
        if (!$meta) {
            return $defaults;
        }

        return [
            'title' => $meta->meta_title ?: ($defaults['title'] ?? config('app.name')),
            'description' => $meta->meta_description ?: ($defaults['description'] ?? ''),
            'keywords' => $meta->meta_keywords ?: ($defaults['keywords'] ?? ''),
            'og_title' => $meta->og_title ?: $meta->meta_title,
            'og_description' => $meta->og_description ?: $meta->meta_description,
            'og_image' => $meta->og_image ?: ($defaults['og_image'] ?? ''),
            'twitter_card' => $meta->twitter_card ?: 'summary_large_image',
            'canonical' => $meta->canonical_url ?: url($slug),
            'robots' => $meta->robots_meta ?: 'index, follow',
            'schema' => $meta->schema_markup,
            'breadcrumb_schema' => $meta->breadcrumb_schema,
            'faq_schema' => $meta->faq_schema,
            'focus_keyword' => $meta->focus_keyword,
            'h1' => $meta->h1_tag,
        ];
    }

    /**
     * Calculate SEO score (basic)
     */
    public function calculateSeoScore(): int
    {
        $score = 0;
        
        // Title check (20 points)
        if ($this->meta_title) {
            $titleLen = strlen($this->meta_title);
            if ($titleLen >= 30 && $titleLen <= 60) $score += 20;
            elseif ($titleLen > 0) $score += 10;
        }
        
        // Description check (20 points)
        if ($this->meta_description) {
            $descLen = strlen($this->meta_description);
            if ($descLen >= 120 && $descLen <= 160) $score += 20;
            elseif ($descLen > 0) $score += 10;
        }
        
        // Focus keyword (15 points)
        if ($this->focus_keyword) {
            $score += 5;
            if (str_contains(strtolower($this->meta_title ?? ''), strtolower($this->focus_keyword))) {
                $score += 5;
            }
            if (str_contains(strtolower($this->meta_description ?? ''), strtolower($this->focus_keyword))) {
                $score += 5;
            }
        }
        
        // OG tags (15 points)
        if ($this->og_title) $score += 5;
        if ($this->og_description) $score += 5;
        if ($this->og_image) $score += 5;
        
        // Schema (15 points)
        if ($this->schema_markup) $score += 10;
        if ($this->faq_schema) $score += 5;
        
        // Keywords (15 points)
        if ($this->target_keywords && count($this->target_keywords) >= 3) $score += 15;
        elseif ($this->meta_keywords) $score += 10;
        
        return min($score, 100);
    }
}