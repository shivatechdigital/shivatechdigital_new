<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'title', 'slug', 'excerpt', 
        'content', 'featured_image', 'views', 'read_time', 
        'is_published', 'published_at', 'meta_title', 
        'meta_description', 'meta_keywords'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
            $post->read_time = self::calculateReadTime($post->content);
        });

        static::updating(function ($post) {
            $post->read_time = self::calculateReadTime($post->content);
        });
    }

    public static function calculateReadTime($content)
    {
        $wordCount = str_word_count(strip_tags($content));
        return ceil($wordCount / 200); // Average reading speed: 200 words/min
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function allComments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
    }

    public function scopePopular($query, $limit = 5)
    {
        return $query->published()
                    ->orderBy('views', 'desc')
                    ->limit($limit);
    }

    public function relatedPosts($limit = 3)
    {
        return Post::published()
            ->where('category_id', $this->category_id)
            ->where('id', '!=', $this->id)
            ->latest()
            ->limit($limit)
            ->get();
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}