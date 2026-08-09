<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Post;

class Comment extends Model
{
    protected $fillable = ['post_id', 'user_id', 'parent_id', 'comment', 'is_approved'];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    public function post()
    {
        return $this->belongsTo(BlogPost::class, 'post_id');
    }

    public function legacyPost(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}