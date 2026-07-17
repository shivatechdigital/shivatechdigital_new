<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BlogPost extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'blog_posts';

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'author_name',
        'featured_image',
        'image_alt',
        'views',
        'reading_time',
        'word_count',
        'status',
        'is_published',
        'is_featured',
        'allow_comments',
        'published_at',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'focus_keyword',
        'article_type',
        'article_section',
        'og_title',
        'og_description',
        'og_image',
        'twitter_card',
        'breadcrumbs',
        'faq_schema',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'allow_comments' => 'boolean',
        'published_at' => 'datetime',
        'breadcrumbs' => 'array',
        'faq_schema' => 'array',
        'views' => 'integer',
        'reading_time' => 'integer',
        'word_count' => 'integer',
    ];

    protected $appends = [
        'formatted_date',
        'read_time_text',
        'excerpt_or_content',
    ];

    // ============================================
    // RELATIONSHIPS
    // ============================================

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_post_tag');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id')
                    ->whereNull('parent_id')
                    ->latest();
    }

    // ============================================
    // ACCESSORS
    // ============================================

    public function getFormattedDateAttribute()
    {
        return $this->published_at 
            ? $this->published_at->format('F d, Y') 
            : $this->created_at->format('F d, Y');
    }

    public function getReadTimeTextAttribute()
    {
        return $this->reading_time . ' min read';
    }

    public function getExcerptOrContentAttribute()
    {
        if ($this->excerpt) {
            return $this->excerpt;
        }
        return Str::limit(strip_tags($this->content), 160);
    }

    public function getMetaTitleOrTitleAttribute()
    {
        return $this->meta_title ?: $this->title;
    }

    public function getMetaDescriptionOrExcerptAttribute()
    {
        return $this->meta_description ?: $this->excerpt_or_content;
    }

    public function getOgTitleOrMetaTitleAttribute()
    {
        return $this->og_title ?: $this->meta_title_or_title;
    }

    public function getOgDescriptionOrMetaDescriptionAttribute()
    {
        return $this->og_description ?: $this->meta_description_or_excerpt;
    }

    public function getOgImageOrFeaturedImageAttribute()
    {
        return $this->og_image ?: $this->featured_image;
    }

    // ============================================
    // SCOPES
    // ============================================

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                    ->where('status', 'published')
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    public function scopePopular($query)
    {
        return $query->orderBy('views', 'desc');
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeByTag($query, $tagId)
    {
        return $query->whereHas('tags', function($q) use ($tagId) {
            $q->where('tags.id', $tagId);
        });
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%')
              ->orWhere('content', 'like', '%' . $search . '%')
              ->orWhere('excerpt', 'like', '%' . $search . '%')
              ->orWhere('meta_keywords', 'like', '%' . $search . '%');
        });
    }

    // ============================================
    // MUTATORS
    // ============================================

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        
        // Auto-generate slug if not set
        if (empty($this->attributes['slug'])) {
            $this->attributes['slug'] = Str::slug($value);
        }
    }

    public function setSlugAttribute($value)
    {
        // Ensure slug is unique
        $slug = Str::slug($value);
        $originalSlug = $slug;
        $count = 1;
        
        while (static::where('slug', $slug)->where('id', '!=', $this->id ?? 0)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }
        
        $this->attributes['slug'] = $slug;
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = $value;
        
        // Auto-calculate word count
        $text = strip_tags($value);
        $words = str_word_count($text);
        $this->attributes['word_count'] = $words;
        
        // Auto-calculate reading time (average 225 words per minute)
        $this->attributes['reading_time'] = max(1, ceil($words / 225));
    }

    public function setExcerptAttribute($value)
    {
        $this->attributes['excerpt'] = $value ?: null;
    }

    // ============================================
    // METHODS
    // ============================================

    /**
     * Increment view count
     */
    public function incrementViews()
    {
        $this->increment('views');
    }

    /**
     * Check if post is published
     */
    public function isPublished()
    {
        return $this->is_published 
            && $this->status === 'published' 
            && $this->published_at 
            && $this->published_at <= now();
    }

    /**
     * Publish the post
     */
    public function publish()
    {
        $this->update([
            'is_published' => true,
            'status' => 'published',
            'published_at' => $this->published_at ?? now(),
        ]);
    }

    /**
     * Unpublish the post
     */
    public function unpublish()
    {
        $this->update([
            'is_published' => false,
            'status' => 'draft',
        ]);
    }

    /**
     * Get full URL
     */
    public function getUrl()
    {
        return route('blog.show', $this->slug);
    }

    /**
     * Get canonical URL or default URL
     */
    public function getCanonicalUrl()
    {
        return $this->canonical_url ?: $this->getUrl();
    }

    /**
     * Generate breadcrumbs array
     */
    public function getBreadcrumbs()
    {
        if ($this->breadcrumbs) {
            return $this->breadcrumbs;
        }

        return [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Blog', 'url' => route('blog.index')],
            ['name' => $this->category->name, 'url' => route('blog.category', $this->category->slug)],
            ['name' => $this->title, 'url' => $this->getUrl()],
        ];
    }

    /**
     * Generate Article Schema
     */
    public function getArticleSchema()
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => $this->article_type,
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => $this->getCanonicalUrl(),
            ],
            'headline' => $this->meta_title_or_title,
            'description' => $this->meta_description_or_excerpt,
            'image' => $this->featured_image ? url($this->featured_image) : null,
            'author' => [
                '@type' => $this->user->organization ? 'Organization' : 'Person',
                'name' => $this->author_name ?: $this->user->name,
                'url' => url('/about'),
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => config('app.name'),
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => url('/images/logo.png'),
                ],
            ],
            'datePublished' => $this->published_at?->toIso8601String(),
            'dateModified' => $this->updated_at->toIso8601String(),
            'articleSection' => $this->article_section,
            'keywords' => $this->meta_keywords,
            'wordCount' => $this->word_count,
            'timeRequired' => 'PT' . $this->reading_time . 'M',
        ];
    }

    /**
     * Generate Breadcrumb Schema
     */
    public function getBreadcrumbSchema()
    {
        $breadcrumbs = $this->getBreadcrumbs();
        $itemListElement = [];

        foreach ($breadcrumbs as $index => $breadcrumb) {
            $itemListElement[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $breadcrumb['name'],
                'item' => $breadcrumb['url'],
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $itemListElement,
        ];
    }

    /**
     * Get related posts
     */
    public function getRelatedPosts($limit = 3)
    {
        return static::published()
            ->where('id', '!=', $this->id)
            ->where(function($query) {
                $query->where('category_id', $this->category_id)
                      ->orWhereHas('tags', function($q) {
                          $q->whereIn('tags.id', $this->tags->pluck('id'));
                      });
            })
            ->orderBy('published_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get previous post
     */
    public function getPrevious()
    {
        return static::published()
            ->where('published_at', '<', $this->published_at)
            ->orderBy('published_at', 'desc')
            ->first();
    }

    /**
     * Get next post
     */
    public function getNext()
    {
        return static::published()
            ->where('published_at', '>', $this->published_at)
            ->orderBy('published_at', 'asc')
            ->first();
    }

    /**
     * Auto-generate meta fields if empty
     */
    public function autoGenerateSeoFields()
    {
        if (!$this->meta_title) {
            $this->meta_title = Str::limit($this->title, 60);
        }

        if (!$this->meta_description) {
            $this->meta_description = Str::limit($this->excerpt_or_content, 160);
        }

        if (!$this->og_title) {
            $this->og_title = $this->meta_title;
        }

        if (!$this->og_description) {
            $this->og_description = $this->meta_description;
        }

        if (!$this->og_image && $this->featured_image) {
            $this->og_image = $this->featured_image;
        }

        $this->save();
    }

    // ============================================
    // BOOT METHOD
    // ============================================

    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug before creating
        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });

        // Auto-generate SEO fields before saving
        static::saving(function ($post) {
            // Calculate word count and reading time
            if ($post->isDirty('content')) {
                $text = strip_tags($post->content);
                $words = str_word_count($text);
                $post->word_count = $words;
                $post->reading_time = max(1, ceil($words / 225));
            }
        });
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
}