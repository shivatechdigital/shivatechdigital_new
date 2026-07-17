<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceMeta;
use Illuminate\Support\Facades\Cache;

class BrandingFaqsUpdateSeeder extends Seeder
{
    public function run(): void
    {
        $page = ServiceMeta::where('page_slug', 'services/branding-services')->first();
        
        if (!$page) {
            $this->command->error('Branding page not found!');
            return;
        }

        // Better FAQs matching your blade content
        $faqs = [
            [
                'name' => 'How much does branding and logo design cost in Noida?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'At Shiva Tech Digital, our Logo Essentials package starts at ₹25,000, Brand Identity package at ₹75,000, and Complete Branding package at ₹2,00,000. Final pricing depends on scope and complexity. We offer affordable, startup-friendly pricing with flexible payment options including EMI.'
                ]
            ],
            [
                'name' => 'What is included in your branding services?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Our branding services include brand strategy, logo design (multiple concepts + variations), visual identity system (colors, typography, iconography), brand guidelines, corporate identity (business cards, letterheads), social media branding, and optional packaging design. All files and copyrights are transferred to you.'
                ]
            ],
            [
                'name' => 'How long does the branding process take?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Timeline varies by project scope. Logo design typically takes 1-2 weeks, brand identity 3-4 weeks, and complete branding with strategy 6-8 weeks. We follow a strategic process: Discovery, Define, Design, and Deliver. Rush projects can be accommodated for an additional fee.'
                ]
            ],
            [
                'name' => 'Do you offer unlimited revisions for logo design?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Yes! All our branding packages include unlimited revisions. We iterate until you are 100% satisfied with your brand identity. Your satisfaction is guaranteed.'
                ]
            ],
            [
                'name' => 'Will I own the logo and brand assets completely?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Absolutely! Upon project completion and payment, you receive complete ownership of all brand assets including logos, source files (AI, PSD, Figma), guidelines, and all deliverables. Full copyright transfer is included in all packages.'
                ]
            ],
            [
                'name' => 'Can you help with rebranding an existing business?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Yes! We specialize in rebranding services. We conduct a brand audit, analyze what is working, identify areas for improvement, and create an evolved identity that retains your brand equity while modernizing your look. We also help with transition planning.'
                ]
            ],
            [
                'name' => 'What industries do you create brands for?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'We have created brands for diverse industries including Technology & SaaS, Retail & E-commerce, Healthcare & Wellness, Finance & Banking, Food & Beverage, Education, Real Estate, Travel & Hospitality, Fitness & Sports, Beauty & Cosmetics, Professional Services, and Startups.'
                ]
            ],
            [
                'name' => 'What design tools do you use for branding?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'We use industry-standard tools including Adobe Illustrator, Photoshop, InDesign for design; Figma and Sketch for digital; After Effects and Lottie for animation; and Blender/Cinema 4D for 3D mockups. All deliverables are in formats you can use anywhere.'
                ]
            ]
        ];

        $faqSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $faqs
        ];

        $page->faq_schema = json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        $page->save();

        Cache::flush();

        $this->command->info('✅ Branding FAQs updated successfully!');
        $this->command->info('   Total FAQs: ' . count($faqs));
    }
}