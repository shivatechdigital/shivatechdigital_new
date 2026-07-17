<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\BlogPost;
use App\Models\Category;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate XML sitemap';

    public function handle()
    {
        $sitemap = Sitemap::create();

        // ✅ Homepage
        $sitemap->add(
            Url::create('/')
                ->setPriority(1.0)
                ->setChangeFrequency('daily')
        );

        // ✅ Static pages
        $staticPages = [
            '/about'   => ['priority' => 0.8, 'freq' => 'monthly'],
            '/contact' => ['priority' => 0.7, 'freq' => 'monthly'],
            '/services' => ['priority' => 0.9, 'freq' => 'weekly'],
        ];

        foreach ($staticPages as $path => $meta) {
            $sitemap->add(
                Url::create($path)
                    ->setPriority($meta['priority'])
                    ->setChangeFrequency($meta['freq'])
            );
        }

        // ✅ Sirf published + indexable blog posts
        BlogPost::where('status', 'published')
            ->orderBy('updated_at', 'desc')
            ->each(function (BlogPost $post) use ($sitemap) {
                $sitemap->add(
                    Url::create("/blog/{$post->slug}")
                        ->setLastModificationDate($post->updated_at)
                        ->setPriority(0.8)
                        ->setChangeFrequency('weekly')
                );
            });

        // ✅ Category pages - sirf jinme published posts hain
        Category::withCount(['posts' => function ($query) {
            $query->where('status', 'published');
        }])
        ->having('posts_count', '>', 0)
        ->each(function ($cat) use ($sitemap) {
            $sitemap->add(
                Url::create("/category/{$cat->slug}")  // ← leading slash add kiya
                    ->setLastModificationDate($cat->updated_at)
                    ->setChangeFrequency('weekly')
                    ->setPriority(0.6)
            );
        });

        // to public folder
        $sitemap->writeToFile(public_path('sitemap.xml'));

        // Auto-copy to public_html
        $publicHtmlPath = '/home/u605122432/domains/shivatechdigital.com/public_html/sitemap.xml';
        \File::copy(public_path('sitemap.xml'), $publicHtmlPath);

        
        $this->info('✅ Sitemap generated at /sitemap.xml');
    }
}