<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;
use App\Models\ServiceMeta;

class SeoMeta extends Component
{
    public array $meta;
    public string $pageSlug;
    public ?ServiceMeta $pageMeta;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $pageSlug,
        ?string $defaultTitle = null,
        ?string $defaultDescription = null,
        ?string $defaultImage = null,
        ?string $defaultKeywords = null,
    ) {
        $this->pageSlug = $pageSlug;

        // Load from cache or DB
        $this->pageMeta = $this->loadPageMeta($pageSlug);

        // Build meta array with fallbacks
        $this->meta = $this->buildMetaArray([
            'title' => $defaultTitle ?? 'Shiva Tech Digital | Web Development & Digital Marketing Noida',
            'description' => $defaultDescription ?? 'Affordable web development, mobile app development, and digital marketing services in Noida, Delhi NCR.',
            'image' => $defaultImage ?? url('/web_assets/img/og-default.jpg'),
            'keywords' => $defaultKeywords ?? 'web development, digital marketing, noida',
        ]);
    }

    /**
     * Load page meta with caching (5 min cache)
     */
    private function loadPageMeta(string $slug): ?ServiceMeta
    {
        try {
            return Cache::remember(
                "seo_meta_{$slug}",
                now()->addMinutes(5),
                fn() => ServiceMeta::where('page_slug', $slug)->first()
            );
        } catch (\Exception $e) {
            // Silent fail - don't break the page
            \Log::error("SEO Meta load failed for {$slug}: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Build complete meta array with fallbacks
     */
    private function buildMetaArray(array $defaults): array
    {
        $baseUrl = url('/');
        $currentUrl = url()->current();

        // If no DB record, use all defaults
        if (!$this->pageMeta) {
            return [
                'title' => $defaults['title'],
                'description' => $defaults['description'],
                'keywords' => $defaults['keywords'],
                'canonical' => $currentUrl,
                'robots' => 'index, follow',
                'og_title' => $defaults['title'],
                'og_description' => $defaults['description'],
                'og_image' => $defaults['image'],
                'og_type' => 'website',
                'twitter_card' => 'summary_large_image',
                'twitter_title' => $defaults['title'],
                'twitter_description' => $defaults['description'],
                'twitter_image' => $defaults['image'],
                'schema' => null,
                'breadcrumb_schema' => null,
                'faq_schema' => null,
                'focus_keyword' => null,
                'h1' => null,
            ];
        }

        // Use DB values with fallbacks
        return [
            'title' => $this->pageMeta->meta_title ?: $defaults['title'],
            'description' => $this->pageMeta->meta_description ?: $defaults['description'],
            'keywords' => $this->pageMeta->meta_keywords ?: $defaults['keywords'],
            'canonical' => $this->pageMeta->canonical_url ?: $currentUrl,
            'robots' => $this->pageMeta->robots_meta ?: 'index, follow',
            'og_title' => $this->pageMeta->og_title ?: $this->pageMeta->meta_title ?: $defaults['title'],
            'og_description' => $this->pageMeta->og_description ?: $this->pageMeta->meta_description ?: $defaults['description'],
            'og_image' => $this->pageMeta->og_image ?: $defaults['image'],
            'og_type' => $this->pageMeta->og_type ?: 'website',
            'twitter_card' => $this->pageMeta->twitter_card ?: 'summary_large_image',
            'twitter_title' => $this->pageMeta->twitter_title ?: $this->pageMeta->meta_title ?: $defaults['title'],
            'twitter_description' => $this->pageMeta->twitter_description ?: $this->pageMeta->meta_description ?: $defaults['description'],
            'twitter_image' => $this->pageMeta->twitter_image ?: $this->pageMeta->og_image ?: $defaults['image'],
            'schema' => $this->pageMeta->schema_markup,
            'breadcrumb_schema' => $this->pageMeta->breadcrumb_schema,
            'faq_schema' => $this->pageMeta->faq_schema,
            'focus_keyword' => $this->pageMeta->focus_keyword,
            'h1' => $this->pageMeta->h1_tag,
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.seo-meta');
    }
}
