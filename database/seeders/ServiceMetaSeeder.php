<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceMeta;
use Illuminate\Support\Facades\DB;

class ServiceMetaSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🚀 Seeding Service Meta data...');

        $pages = $this->getPagesData();

        $created = 0;
        $updated = 0;
        $skipped = 0;

        foreach ($pages as $pageData) {
            $existing = ServiceMeta::where('page_slug', $pageData['page_slug'])->first();

            if ($existing) {
                // Update existing
                $existing->update($pageData);
                $existing->seo_score = $existing->calculateSeoScore();
                $existing->save();
                $updated++;
                $this->command->line("  ✓ Updated: {$pageData['page_slug']}");
            } else {
                // Create new
                $page = ServiceMeta::create($pageData);
                $page->seo_score = $page->calculateSeoScore();
                $page->save();
                $created++;
                $this->command->line("  ✓ Created: {$pageData['page_slug']}");
            }
        }

        $this->command->info('');
        $this->command->info("✅ Seeding complete!");
        $this->command->info("   Created: {$created}");
        $this->command->info("   Updated: {$updated}");
        $this->command->info("   Total: " . ServiceMeta::count());
    }

    /**
     * Get all pages data with SEO meta
     */
    private function getPagesData(): array
    {
        $baseUrl = 'https://shivatechdigital.com';
        $ogImage = "{$baseUrl}/web_assets/img/og-default.jpg";

        return [
            // ============================================
            // STATIC PAGES
            // ============================================
            [
                'page_slug' => 'home',
                'page_type' => 'static',
                'page_url' => $baseUrl . '/',
                'meta_title' => 'Web Development & Digital Marketing Company in Noida | Shiva Tech Digital',
                'meta_description' => 'Top web development, mobile app development & digital marketing company in Noida, Delhi NCR. Affordable startup-friendly pricing. Get free consultation today!',
                'meta_keywords' => 'web development company noida, digital marketing agency noida, mobile app development delhi ncr, seo company noida, laravel developer noida',
                'focus_keyword' => 'web development company noida',
                'og_title' => 'Shiva Tech Digital - Web Development & Digital Marketing Noida',
                'og_description' => 'Affordable web development, app development, and digital marketing services in Noida, Delhi NCR.',
                'og_image' => $ogImage,
                'h1_tag' => 'Transform Your Business with Digital Excellence',
                'target_keywords' => [
                    'web development company noida',
                    'digital marketing agency delhi ncr',
                    'mobile app development noida',
                    'seo services noida',
                    'affordable web developer noida'
                ],
                'canonical_url' => $baseUrl . '/',
                'last_updated_by' => 'manual',
                'page_description' => 'Homepage showcasing all services - web development, app development, digital marketing, SEO, and cloud solutions.',
            ],

            [
                'page_slug' => 'about',
                'page_type' => 'static',
                'page_url' => $baseUrl . '/about',
                'meta_title' => 'About Us | Web Development Company Noida | Shiva Tech Digital',
                'meta_description' => 'Learn about Shiva Tech Digital, an affordable web development, mobile app & digital marketing startup in Noida, Delhi NCR. Startup-friendly pricing, direct founder access.',
                'meta_keywords' => 'about shiva tech digital, web development company noida, affordable web developer, mobile app agency noida, digital marketing startup delhi ncr',
                'focus_keyword' => 'about shiva tech digital',
                'og_title' => 'About Shiva Tech Digital | Startup-Friendly Agency Noida',
                'og_description' => 'Startup-friendly web development agency in Noida. Affordable pricing, direct founder access, fast delivery.',
                'og_image' => "{$baseUrl}/web_assets/img/og-about.jpg",
                'h1_tag' => 'Transforming Businesses Through Innovation',
                'target_keywords' => [
                    'about shiva tech digital',
                    'web development company noida',
                    'startup friendly agency',
                    'noida digital agency'
                ],
                'canonical_url' => $baseUrl . '/about',
                'last_updated_by' => 'manual',
                'page_description' => 'About page introducing Shiva Tech Digital - founders, mission, vision, team, and why choose us.',
            ],

            [
                'page_slug' => 'contact',
                'page_type' => 'static',
                'page_url' => $baseUrl . '/contact',
                'meta_title' => 'Contact Us | Web Development Company Noida | Shiva Tech Digital',
                'meta_description' => 'Contact Shiva Tech Digital for web development, mobile apps, SEO & digital marketing in Noida. Call +91-7007294764 or email info@shivatechdigital.com. Free consultation!',
                'meta_keywords' => 'contact shiva tech digital, web developer noida contact, digital marketing agency phone, hire web developer noida',
                'focus_keyword' => 'contact web development company noida',
                'og_title' => 'Contact Shiva Tech Digital | Noida Web Development Agency',
                'og_description' => 'Get in touch for web development, app development, and digital marketing services in Noida.',
                'og_image' => $ogImage,
                'h1_tag' => "Let's Build Something Amazing Together",
                'target_keywords' => [
                    'contact web developer noida',
                    'hire digital marketing agency',
                    'noida web development company contact'
                ],
                'canonical_url' => $baseUrl . '/contact',
                'last_updated_by' => 'manual',
                'page_description' => 'Contact page with phone, email, address, and contact form for inquiries.',
            ],

            [
                'page_slug' => 'portfolio',
                'page_type' => 'static',
                'page_url' => $baseUrl . '/portfolio',
                'meta_title' => 'Our Portfolio | Web Development Projects | Shiva Tech Digital Noida',
                'meta_description' => 'Explore Shiva Tech Digital portfolio - 250+ successful web development, mobile app, and digital marketing projects. See our work for startups & enterprises in Delhi NCR.',
                'meta_keywords' => 'web development portfolio noida, mobile app projects, digital marketing case studies, shiva tech digital work',
                'focus_keyword' => 'web development portfolio',
                'og_title' => 'Portfolio | Shiva Tech Digital - 250+ Projects Delivered',
                'og_description' => 'Browse our portfolio of web development, mobile app, and digital marketing projects.',
                'og_image' => $ogImage,
                'h1_tag' => 'Our Work Speaks for Itself',
                'target_keywords' => [
                    'web development portfolio',
                    'mobile app portfolio noida',
                    'digital agency case studies'
                ],
                'canonical_url' => $baseUrl . '/portfolio',
                'last_updated_by' => 'manual',
                'page_description' => 'Portfolio showcasing all completed projects across web development, mobile apps, and digital marketing.',
            ],

            [
                'page_slug' => 'blog',
                'page_type' => 'static',
                'page_url' => $baseUrl . '/blog',
                'meta_title' => 'Blog | Web Development, SEO & Digital Marketing Tips | Shiva Tech Digital',
                'meta_description' => 'Read latest articles on web development, mobile apps, SEO, digital marketing, and tech trends. Expert insights from Shiva Tech Digital Noida team.',
                'meta_keywords' => 'web development blog, seo tips, digital marketing articles, tech blog noida, laravel tutorials',
                'focus_keyword' => 'web development blog',
                'og_title' => 'Tech Blog | Web Development & Digital Marketing Insights',
                'og_description' => 'Latest articles on web development, SEO, digital marketing, and technology trends.',
                'og_image' => $ogImage,
                'h1_tag' => 'Insights & Expert Articles',
                'target_keywords' => [
                    'web development blog',
                    'seo tips blog',
                    'digital marketing articles india'
                ],
                'canonical_url' => $baseUrl . '/blog',
                'last_updated_by' => 'manual',
                'page_description' => 'Blog listing page with articles on web development, SEO, digital marketing, and tech tutorials.',
            ],

            // ============================================
            // SERVICES INDEX
            // ============================================
            [
                'page_slug' => 'services',
                'page_type' => 'service',
                'page_url' => $baseUrl . '/services',
                'meta_title' => 'Our Services | Web Development, Apps & Digital Marketing Noida',
                'meta_description' => 'Complete digital services - web development, mobile apps, SEO, digital marketing, cloud solutions in Noida. Affordable, fast delivery for startups & SMEs.',
                'meta_keywords' => 'digital services noida, web development services, mobile app services, seo services delhi ncr, digital marketing services',
                'focus_keyword' => 'digital services noida',
                'og_title' => 'Digital Services | Shiva Tech Digital Noida',
                'og_description' => 'All digital services under one roof - web, apps, SEO, marketing, cloud.',
                'og_image' => $ogImage,
                'h1_tag' => 'Complete Digital Solutions for Your Business',
                'target_keywords' => [
                    'digital services noida',
                    'web development services',
                    'all digital solutions'
                ],
                'canonical_url' => $baseUrl . '/services',
                'last_updated_by' => 'manual',
                'page_description' => 'Main services page listing all 16+ digital services offered.',
            ],

            // ============================================
            // SERVICE PAGES (DEVELOPMENT)
            // ============================================
            [
                'page_slug' => 'services/web-development',
                'page_type' => 'service',
                'page_url' => $baseUrl . '/services/web-development',
                'meta_title' => 'Web Development Company in Noida | Laravel & React Experts',
                'meta_description' => 'Best web development company in Noida offering Laravel, React, Vue.js, Node.js development. Custom websites, web apps for startups. Affordable pricing, fast delivery.',
                'meta_keywords' => 'web development noida, laravel developer noida, react developer delhi ncr, custom website development, web application development noida',
                'focus_keyword' => 'web development noida',
                'og_title' => 'Web Development Services Noida | Laravel & React Experts',
                'og_description' => 'Professional web development services in Noida using latest technologies.',
                'og_image' => $ogImage,
                'h1_tag' => 'Professional Web Development Services in Noida',
                'target_keywords' => [
                    'web development noida',
                    'laravel developer noida',
                    'react developer delhi ncr',
                    'custom website development',
                    'web application company noida'
                ],
                'canonical_url' => $baseUrl . '/services/web-development',
                'last_updated_by' => 'manual',
                'page_description' => 'Web development service page - Laravel, React, Vue.js, Node.js development for startups and enterprises.',
            ],

            [
                'page_slug' => 'services/mobile-app-development',
                'page_type' => 'service',
                'page_url' => $baseUrl . '/services/mobile-app-development',
                'meta_title' => 'Mobile App Development Company Noida | iOS & Android Apps',
                'meta_description' => 'Top mobile app development company in Noida. iOS, Android, Flutter, React Native app development. Affordable startup-friendly pricing. Free consultation available.',
                'meta_keywords' => 'mobile app development noida, android app developer, ios app development delhi ncr, flutter app development, react native developer noida',
                'focus_keyword' => 'mobile app development noida',
                'og_title' => 'Mobile App Development Noida | iOS & Android Experts',
                'og_description' => 'Custom mobile app development for iOS and Android platforms.',
                'og_image' => $ogImage,
                'h1_tag' => 'Mobile App Development Services in Noida',
                'target_keywords' => [
                    'mobile app development noida',
                    'android app developer noida',
                    'ios app development delhi ncr',
                    'flutter developer noida',
                    'react native app development'
                ],
                'canonical_url' => $baseUrl . '/services/mobile-app-development',
                'last_updated_by' => 'manual',
                'page_description' => 'Mobile app development for iOS, Android, Flutter, React Native platforms.',
            ],

            [
                'page_slug' => 'services/ui-ux-design',
                'page_type' => 'service',
                'page_url' => $baseUrl . '/services/ui-ux-design',
                'meta_title' => 'UI/UX Design Services Noida | Web & App Design Agency',
                'meta_description' => 'Professional UI/UX design services in Noida for websites & mobile apps. User-centered design, Figma prototypes, wireframes. Boost conversions with great design.',
                'meta_keywords' => 'ui ux design noida, web design agency, app design services, figma designer noida, user experience design delhi ncr',
                'focus_keyword' => 'ui ux design noida',
                'og_title' => 'UI/UX Design Services | Shiva Tech Digital Noida',
                'og_description' => 'Beautiful, user-friendly UI/UX design for web and mobile applications.',
                'og_image' => $ogImage,
                'h1_tag' => 'UI/UX Design Services That Convert',
                'target_keywords' => [
                    'ui ux design noida',
                    'web design agency noida',
                    'app design services delhi ncr',
                    'figma designer noida'
                ],
                'canonical_url' => $baseUrl . '/services/ui-ux-design',
                'last_updated_by' => 'manual',
                'page_description' => 'UI/UX design services for websites, web apps, and mobile applications.',
            ],

            [
                'page_slug' => 'services/ecommerce-development',
                'page_type' => 'service',
                'page_url' => $baseUrl . '/services/ecommerce-development',
                'meta_title' => 'E-commerce Website Development Noida | Shopify & WooCommerce',
                'meta_description' => 'E-commerce website development in Noida. Shopify, WooCommerce, Magento, custom online stores. Mobile-friendly, SEO-optimized e-commerce solutions for businesses.',
                'meta_keywords' => 'ecommerce development noida, shopify developer, woocommerce developer noida, online store development, custom ecommerce website delhi ncr',
                'focus_keyword' => 'ecommerce development noida',
                'og_title' => 'E-commerce Development Noida | Online Store Experts',
                'og_description' => 'Build your online store with Shopify, WooCommerce, or custom solutions.',
                'og_image' => $ogImage,
                'h1_tag' => 'E-commerce Website Development Services',
                'target_keywords' => [
                    'ecommerce development noida',
                    'shopify developer noida',
                    'woocommerce developer delhi ncr',
                    'online store development'
                ],
                'canonical_url' => $baseUrl . '/services/ecommerce-development',
                'last_updated_by' => 'manual',
                'page_description' => 'E-commerce development for Shopify, WooCommerce, Magento, and custom solutions.',
            ],

            // ============================================
            // SERVICE PAGES (DIGITAL MARKETING)
            // ============================================
            [
                'page_slug' => 'services/digital-marketing',
                'page_type' => 'service',
                'page_url' => $baseUrl . '/services/digital-marketing',
                'meta_title' => 'Digital Marketing Agency in Noida | SEO, PPC, Social Media',
                'meta_description' => 'Best digital marketing agency in Noida offering SEO, PPC, social media, content marketing services. Grow your business online. Affordable packages for startups.',
                'meta_keywords' => 'digital marketing agency noida, digital marketing services delhi ncr, online marketing noida, digital marketing company noida sector 62',
                'focus_keyword' => 'digital marketing agency noida',
                'og_title' => 'Digital Marketing Agency Noida | Complete Online Marketing',
                'og_description' => 'Full-service digital marketing - SEO, PPC, social media, content marketing.',
                'og_image' => $ogImage,
                'h1_tag' => 'Digital Marketing Services That Drive Results',
                'target_keywords' => [
                    'digital marketing agency noida',
                    'digital marketing services delhi ncr',
                    'online marketing company noida',
                    'best digital marketing noida'
                ],
                'canonical_url' => $baseUrl . '/services/digital-marketing',
                'last_updated_by' => 'manual',
                'page_description' => 'Complete digital marketing services - SEO, PPC, social media, content, email marketing.',
            ],

            [
                'page_slug' => 'services/seo-services',
                'page_type' => 'service',
                'page_url' => $baseUrl . '/services/seo-services',
                'meta_title' => 'SEO Services Company Noida | Best SEO Agency Delhi NCR',
                'meta_description' => 'Top SEO services company in Noida. Google ranking, local SEO, technical SEO, on-page & off-page optimization. Affordable SEO packages for startups & SMEs.',
                'meta_keywords' => 'seo services noida, seo company delhi ncr, best seo agency noida, local seo services, google ranking services noida',
                'focus_keyword' => 'seo services noida',
                'og_title' => 'SEO Services Noida | Rank #1 on Google',
                'og_description' => 'Professional SEO services to rank your website higher on Google.',
                'og_image' => $ogImage,
                'h1_tag' => 'SEO Services to Rank #1 on Google',
                'target_keywords' => [
                    'seo services noida',
                    'seo company delhi ncr',
                    'best seo agency noida',
                    'local seo noida',
                    'google ranking services'
                ],
                'canonical_url' => $baseUrl . '/services/seo-services',
                'last_updated_by' => 'manual',
                'page_description' => 'SEO services - on-page, off-page, technical SEO, local SEO, and content optimization.',
            ],

            [
                'page_slug' => 'services/social-media-marketing',
                'page_type' => 'service',
                'page_url' => $baseUrl . '/services/social-media-marketing',
                'meta_title' => 'Social Media Marketing Agency Noida | Facebook, Instagram',
                'meta_description' => 'Top social media marketing agency in Noida. Facebook, Instagram, LinkedIn, Twitter management. Grow your social presence. Affordable monthly packages available.',
                'meta_keywords' => 'social media marketing noida, smm agency delhi ncr, facebook marketing noida, instagram marketing services, linkedin marketing noida',
                'focus_keyword' => 'social media marketing noida',
                'og_title' => 'Social Media Marketing Noida | Grow Your Brand',
                'og_description' => 'Professional social media management for Facebook, Instagram, LinkedIn.',
                'og_image' => $ogImage,
                'h1_tag' => 'Social Media Marketing That Engages',
                'target_keywords' => [
                    'social media marketing noida',
                    'smm agency delhi ncr',
                    'facebook marketing noida',
                    'instagram marketing'
                ],
                'canonical_url' => $baseUrl . '/services/social-media-marketing',
                'last_updated_by' => 'manual',
                'page_description' => 'Social media marketing services - Facebook, Instagram, LinkedIn, Twitter management.',
            ],

            [
                'page_slug' => 'services/content-marketing',
                'page_type' => 'service',
                'page_url' => $baseUrl . '/services/content-marketing',
                'meta_title' => 'Content Marketing Services Noida | Blog Writing & Strategy',
                'meta_description' => 'Professional content marketing services in Noida. Blog writing, content strategy, copywriting, SEO content. Drive traffic and conversions with great content.',
                'meta_keywords' => 'content marketing noida, blog writing services, content strategy delhi ncr, seo content writing noida, copywriting services',
                'focus_keyword' => 'content marketing noida',
                'og_title' => 'Content Marketing Services Noida | Drive Traffic',
                'og_description' => 'Strategic content marketing to attract, engage, and convert customers.',
                'og_image' => $ogImage,
                'h1_tag' => 'Content Marketing That Converts',
                'target_keywords' => [
                    'content marketing noida',
                    'blog writing services india',
                    'content strategy delhi ncr',
                    'seo content writing'
                ],
                'canonical_url' => $baseUrl . '/services/content-marketing',
                'last_updated_by' => 'manual',
                'page_description' => 'Content marketing services - blog writing, copywriting, content strategy.',
            ],

            // ============================================
            // SERVICE PAGES (OTHERS)
            // ============================================
            [
                'page_slug' => 'services/cloud-solutions',
                'page_type' => 'service',
                'page_url' => $baseUrl . '/services/cloud-solutions',
                'meta_title' => 'Cloud Solutions & Migration Services Noida | AWS, Azure, GCP',
                'meta_description' => 'Cloud solutions and migration services in Noida. AWS, Azure, Google Cloud setup, migration, management. Scalable cloud infrastructure for businesses of all sizes.',
                'meta_keywords' => 'cloud solutions noida, aws services delhi ncr, azure consultant noida, google cloud services, cloud migration noida',
                'focus_keyword' => 'cloud solutions noida',
                'og_title' => 'Cloud Solutions Noida | AWS, Azure, GCP Services',
                'og_description' => 'Cloud migration, setup, and management services for modern businesses.',
                'og_image' => $ogImage,
                'h1_tag' => 'Cloud Solutions for Modern Businesses',
                'target_keywords' => [
                    'cloud solutions noida',
                    'aws services delhi ncr',
                    'azure consultant noida',
                    'cloud migration services'
                ],
                'canonical_url' => $baseUrl . '/services/cloud-solutions',
                'last_updated_by' => 'manual',
                'page_description' => 'Cloud solutions - AWS, Azure, GCP setup, migration, and management.',
            ],

            [
                'page_slug' => 'services/branding-services',
                'page_type' => 'service',
                'page_url' => $baseUrl . '/services/branding-services',
                'meta_title' => 'Branding & Identity Design Services Noida | Logo, Brand Strategy',
                'meta_description' => 'Professional branding services in Noida. Logo design, brand identity, brand strategy, brand guidelines. Build a memorable brand that stands out from competition.',
                'meta_keywords' => 'branding services noida, logo design noida, brand identity delhi ncr, brand strategy services, branding agency noida',
                'focus_keyword' => 'branding services noida',
                'og_title' => 'Branding Services Noida | Build Your Brand',
                'og_description' => 'Complete branding services - logo, identity, strategy, guidelines.',
                'og_image' => $ogImage,
                'h1_tag' => 'Build a Brand That Stands Out',
                'target_keywords' => [
                    'branding services noida',
                    'logo design noida',
                    'brand identity delhi ncr',
                    'branding agency noida'
                ],
                'canonical_url' => $baseUrl . '/services/branding-services',
                'last_updated_by' => 'manual',
                'page_description' => 'Branding services - logo design, brand identity, strategy, and guidelines.',
            ],

            [
                'page_slug' => 'services/graphic-design',
                'page_type' => 'service',
                'page_url' => $baseUrl . '/services/graphic-design',
                'meta_title' => 'Graphic Design Services Noida | Creative Design Agency',
                'meta_description' => 'Professional graphic design services in Noida. Logo, banners, social media graphics, brochures, packaging design. Creative designs that make your brand stand out.',
                'meta_keywords' => 'graphic design noida, graphic designer delhi ncr, banner design services, social media design noida, brochure design',
                'focus_keyword' => 'graphic design noida',
                'og_title' => 'Graphic Design Services Noida | Creative Designs',
                'og_description' => 'Professional graphic design for logos, banners, social media, and print.',
                'og_image' => $ogImage,
                'h1_tag' => 'Creative Graphic Design Services',
                'target_keywords' => [
                    'graphic design noida',
                    'graphic designer delhi ncr',
                    'banner design services',
                    'creative design agency noida'
                ],
                'canonical_url' => $baseUrl . '/services/graphic-design',
                'last_updated_by' => 'manual',
                'page_description' => 'Graphic design services - logos, banners, social media, print, packaging.',
            ],

            [
                'page_slug' => 'services/video-production',
                'page_type' => 'service',
                'page_url' => $baseUrl . '/services/video-production',
                'meta_title' => 'Video Production Services Noida | Corporate & Marketing Videos',
                'meta_description' => 'Professional video production services in Noida. Corporate videos, product videos, marketing videos, animations, social media videos. High-quality video content.',
                'meta_keywords' => 'video production noida, video editing services, corporate video noida, marketing video production delhi ncr, animation services',
                'focus_keyword' => 'video production noida',
                'og_title' => 'Video Production Services Noida | Corporate Videos',
                'og_description' => 'Professional video production for marketing, corporate, and social media.',
                'og_image' => $ogImage,
                'h1_tag' => 'Video Production That Tells Your Story',
                'target_keywords' => [
                    'video production noida',
                    'corporate video noida',
                    'marketing video delhi ncr',
                    'video editing services'
                ],
                'canonical_url' => $baseUrl . '/services/video-production',
                'last_updated_by' => 'manual',
                'page_description' => 'Video production - corporate, marketing, product, animation videos.',
            ],

            [
                'page_slug' => 'services/maintenance-support',
                'page_type' => 'service',
                'page_url' => $baseUrl . '/services/maintenance-support',
                'meta_title' => 'Website Maintenance & Support Services Noida | 24/7 Support',
                'meta_description' => 'Website maintenance and support services in Noida. Bug fixes, updates, security, backup, performance optimization. Reliable 24/7 technical support for your website.',
                'meta_keywords' => 'website maintenance noida, web support services, website updates delhi ncr, technical support noida, website security services',
                'focus_keyword' => 'website maintenance noida',
                'og_title' => 'Website Maintenance Services Noida | 24/7 Support',
                'og_description' => 'Reliable website maintenance, updates, and 24/7 technical support.',
                'og_image' => $ogImage,
                'h1_tag' => 'Website Maintenance & Support Services',
                'target_keywords' => [
                    'website maintenance noida',
                    'web support services',
                    'technical support delhi ncr',
                    'website updates noida'
                ],
                'canonical_url' => $baseUrl . '/services/maintenance-support',
                'last_updated_by' => 'manual',
                'page_description' => 'Website maintenance, updates, security, backup, and 24/7 support services.',
            ],
        ];
    }
}