<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;
use App\Models\ServiceMeta;

class FaqsSection extends Component
{
    public string $pageSlug;
    public string $sectionTitle;
    public string $sectionSubtitle;
    public array $faqs;

    public function __construct(
        string $pageSlug,
        string $sectionTitle = 'Frequently Asked Questions',
        string $sectionSubtitle = 'Common questions answered'
    ) {
        $this->pageSlug = $pageSlug;
        $this->sectionTitle = $sectionTitle;
        $this->sectionSubtitle = $sectionSubtitle;
        $this->faqs = $this->loadFaqs($pageSlug);
    }

    private function loadFaqs(string $slug): array
    {
        // Cache for performance
        return Cache::remember(
            "page_faqs_{$slug}",
            now()->addMinutes(5),
            function () use ($slug) {
                $page = ServiceMeta::where('page_slug', $slug)->first();
                
                if (!$page || !$page->faq_schema) {
                    return [];
                }

                $faqData = json_decode($page->faq_schema, true);
                
                if (!isset($faqData['mainEntity'])) {
                    return [];
                }

                $faqs = [];
                foreach ($faqData['mainEntity'] as $item) {
                    $faqs[] = [
                        'question' => $item['name'] ?? '',
                        'answer' => $item['acceptedAnswer']['text'] ?? ''
                    ];
                }

                return $faqs;
            }
        );
    }

    public function render(): View|Closure|string
    {
        return view('components.faqs-section');
    }
}