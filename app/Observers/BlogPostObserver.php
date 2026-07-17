<?php

namespace App\Observers;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Artisan;

class BlogPostObserver
{
    public function created(BlogPost $post): void
    {
        if ($post->status === 'published') {
            Artisan::call('sitemap:generate');
        }
    }

    public function updated(BlogPost $post): void
    {
        if ($post->status === 'published') {
            Artisan::call('sitemap:generate');
        }
    }
}