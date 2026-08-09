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

        // ✅ Static pages + legal pages
        $staticPages = [
            '/about' => ['priority' => 0.8, 'freq' => 'monthly'],
            '/contact' => ['priority' => 0.7, 'freq' => 'monthly'],
            '/services' => ['priority' => 0.9, 'freq' => 'weekly'],
            '/privacy-policy' => ['priority' => 0.4, 'freq' => 'yearly'],
            '/terms-of-service' => ['priority' => 0.4, 'freq' => 'yearly'],
        ];

        foreach ($staticPages as $path => $meta) {
            $sitemap->add(
                Url::create($path)
                    ->setPriority($meta['priority'])
                    ->setChangeFrequency($meta['freq'])
            );
        }

        // ✅ Core service pages
        $servicePages = [
            '/services/web-development' => ['priority' => 0.85, 'freq' => 'weekly'],
            '/services/mobile-app-development' => ['priority' => 0.85, 'freq' => 'weekly'],
            '/services/ui-ux-design' => ['priority' => 0.8, 'freq' => 'weekly'],
            '/services/ecommerce-development' => ['priority' => 0.8, 'freq' => 'weekly'],
            '/services/digital-marketing' => ['priority' => 0.8, 'freq' => 'weekly'],
            '/services/seo-services' => ['priority' => 0.8, 'freq' => 'weekly'],
            '/services/social-media-marketing' => ['priority' => 0.75, 'freq' => 'weekly'],
            '/services/content-marketing' => ['priority' => 0.75, 'freq' => 'weekly'],
            '/services/cloud-solutions' => ['priority' => 0.8, 'freq' => 'weekly'],
            '/services/maintenance-support' => ['priority' => 0.7, 'freq' => 'monthly'],
            '/services/branding-services' => ['priority' => 0.75, 'freq' => 'monthly'],
            '/services/graphic-design' => ['priority' => 0.7, 'freq' => 'monthly'],
            '/services/video-production' => ['priority' => 0.65, 'freq' => 'monthly'],
        ];

        foreach ($servicePages as $path => $meta) {
            $sitemap->add(
                Url::create($path)
                    ->setPriority($meta['priority'])
                    ->setChangeFrequency($meta['freq'])
            );
        }

        // ✅ City service landing pages
        $cityServicePages = [
            '/services/web-development-noida',
            '/services/web-development-delhi',
            '/services/web-development-gurgaon',
            '/services/web-development-ghaziabad',
            '/services/mobile-app-development-noida',
            '/services/mobile-app-development-delhi',
            '/services/mobile-app-development-gurgaon',
            '/services/mobile-app-development-ghaziabad',
            '/services/cloud-migration-noida',
            '/services/cloud-migration-delhi',
            '/services/cloud-migration-gurgaon',
            '/services/cloud-migration-ghaziabad',
        ];

        foreach ($cityServicePages as $path) {
            $sitemap->add(
                Url::create($path)
                    ->setPriority(0.78)
                    ->setChangeFrequency('weekly')
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