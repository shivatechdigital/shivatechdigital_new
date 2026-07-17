<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($tag) {
            $tag->slug = Str::slug($tag->name);
        });
    }

    // public function posts(): BelongsToMany
    // {
    //     return $this->belongsToMany(Post::class);
    // }
    
     public function posts()
    {
        return $this->belongsToMany(BlogPost::class, 'blog_post_tag');
    }

    public function publishedPosts()
    {
        return $this->belongsToMany(BlogPost::class, 'blog_post_tag')
                    ->where('is_published', true);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        if (empty($this->attributes['slug'])) {
            $this->attributes['slug'] = Str::slug($value);
        }
    }

    public function getUrl()
    {
        return route('blog.tag', $this->slug);
    }
}