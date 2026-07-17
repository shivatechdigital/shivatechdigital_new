<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceMeta;
use Illuminate\Support\Facades\Cache;

class ServiceSchemasSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🚀 Adding comprehensive schemas + FAQs for all service pages...');

        $allData = $this->getAllPageData();

        $updated = 0;
        $notFound = 0;

        foreach ($allData as $slug => $data) {
            $page = ServiceMeta::where('page_slug', $slug)->first();
            
            if (!$page) {
                $this->command->warn("  ⚠ Page not found: {$slug}");
                $notFound++;
                continue;
            }

            $updates = [];

            if (isset($data['schema'])) {
                $updates['schema_markup'] = $data['schema'];
            }
            
            if (isset($data['breadcrumb'])) {
                $updates['breadcrumb_schema'] = $data['breadcrumb'];
            }
            
            if (isset($data['faq'])) {
                $updates['faq_schema'] = $data['faq'];
            }

            $page->update($updates);
            $page->seo_score = $page->calculateSeoScore();
            $page->save();

            $updated++;
            $this->command->line("  ✓ Updated: {$slug}");
        }

        // Clear cache so changes appear immediately
        Cache::flush();
        
        $this->command->info('');
        $this->command->info("✅ Completed!");
        $this->command->info("   Updated: {$updated}");
        $this->command->info("   Not Found: {$notFound}");
    }

    private function getAllPageData(): array
    {
        $orgId = "https://shivatechdigital.com/#organization";
        $websiteId = "https://shivatechdigital.com/#website";
        
        return [
            // ============================================
            // 1. WEB DEVELOPMENT
            // ============================================
            'services/web-development' => [
                'schema' => $this->jsonEncode([
                    "@context" => "https://schema.org",
                    "@type" => "Service",
                    "@id" => "https://shivatechdigital.com/services/web-development#service",
                    "name" => "Web Development Services in Noida",
                    "description" => "Professional web development services using Laravel, React, Vue.js, Node.js. Custom websites, web applications for startups and enterprises in Noida, Delhi NCR.",
                    "provider" => ["@id" => $orgId],
                    "areaServed" => [
                        ["@type" => "City", "name" => "Noida"],
                        ["@type" => "City", "name" => "Delhi"],
                        ["@type" => "City", "name" => "Gurgaon"],
                        ["@type" => "Country", "name" => "India"]
                    ],
                    "serviceType" => "Web Development",
                    "offers" => [
                        "@type" => "AggregateOffer",
                        "priceCurrency" => "INR",
                        "lowPrice" => "25000",
                        "highPrice" => "500000",
                        "offerCount" => "5"
                    ],
                    "hasOfferCatalog" => [
                        "@type" => "OfferCatalog",
                        "name" => "Web Development Packages",
                        "itemListElement" => [
                            ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Landing Page Development"]],
                            ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Business Website Development"]],
                            ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Custom Web Application"]],
                            ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "E-commerce Website"]],
                            ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Web Portal Development"]]
                        ]
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "4.9",
                        "reviewCount" => "47",
                        "bestRating" => "5"
                    ]
                ]),
                
                'breadcrumb' => $this->breadcrumb([
                    ['Home', '/'],
                    ['Services', '/services'],
                    ['Web Development', '/services/web-development']
                ]),
                
                'faq' => $this->faqSchema([
                    [
                        'What technologies do you use for web development?',
                        'We use modern technologies including Laravel, React.js, Vue.js, Node.js, PHP, MySQL, and PostgreSQL. We choose the best stack based on your project requirements - speed, scalability, and budget.'
                    ],
                    [
                        'How much does a website cost in Noida?',
                        'Website costs vary based on requirements: Landing pages start at ₹25,000, business websites at ₹50,000-1,50,000, e-commerce websites at ₹75,000-3,00,000, and custom web applications at ₹2,00,000+. Contact us for a free quote.'
                    ],
                    [
                        'How long does web development take?',
                        'Project timelines: Landing page (3-5 days), Business website (1-2 weeks), E-commerce website (3-4 weeks), Custom web application (8-12 weeks). We provide detailed timelines after understanding your requirements.'
                    ],
                    [
                        'Do you provide responsive mobile-friendly websites?',
                        'Yes! All our websites are 100% mobile-responsive and work perfectly on all devices - desktops, tablets, and smartphones. We follow mobile-first design principles for better user experience and SEO.'
                    ],
                    [
                        'Will you provide website maintenance after launch?',
                        'Absolutely! We offer flexible maintenance packages including bug fixes, security updates, content updates, backups, performance optimization, and 24/7 technical support. Maintenance starts at ₹3,000/month.'
                    ],
                    [
                        'Do you provide hosting and domain services?',
                        'Yes, we can help you with hosting setup (we recommend Hostinger, AWS, or DigitalOcean based on your needs) and domain registration. We can also migrate your existing website to better hosting if needed.'
                    ],
                    [
                        'Will my website be SEO-optimized?',
                        'Yes! Every website we build comes with on-page SEO optimization including meta tags, schema markup, fast loading speed, mobile responsiveness, clean URLs, and XML sitemap. We can also provide ongoing SEO services.'
                    ]
                ])
            ],

            // ============================================
            // 2. MOBILE APP DEVELOPMENT
            // ============================================
            'services/mobile-app-development' => [
                'schema' => $this->jsonEncode([
                    "@context" => "https://schema.org",
                    "@type" => "Service",
                    "@id" => "https://shivatechdigital.com/services/mobile-app-development#service",
                    "name" => "Mobile App Development Services in Noida",
                    "description" => "Top mobile app development company in Noida. iOS, Android, Flutter, React Native app development for startups and enterprises.",
                    "provider" => ["@id" => $orgId],
                    "areaServed" => [
                        ["@type" => "City", "name" => "Noida"],
                        ["@type" => "City", "name" => "Delhi"],
                        ["@type" => "Country", "name" => "India"]
                    ],
                    "serviceType" => "Mobile App Development",
                    "offers" => [
                        "@type" => "AggregateOffer",
                        "priceCurrency" => "INR",
                        "lowPrice" => "100000",
                        "highPrice" => "2000000",
                        "offerCount" => "4"
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "4.8",
                        "reviewCount" => "35",
                        "bestRating" => "5"
                    ]
                ]),
                
                'breadcrumb' => $this->breadcrumb([
                    ['Home', '/'],
                    ['Services', '/services'],
                    ['Mobile App Development', '/services/mobile-app-development']
                ]),
                
                'faq' => $this->faqSchema([
                    [
                        'What platforms do you develop apps for?',
                        'We develop apps for iOS (iPhone, iPad), Android (all devices), and cross-platform using Flutter and React Native. Cross-platform development saves 40-50% cost while delivering native-like performance.'
                    ],
                    [
                        'How much does mobile app development cost?',
                        'App costs depend on complexity: Basic app (₹1,00,000-3,00,000), Medium complexity app (₹3,00,000-7,00,000), Complex app with backend (₹7,00,000-20,00,000+). We offer startup packages with EMI options.'
                    ],
                    [
                        'How long does app development take?',
                        'Typical timelines: MVP/Simple app (8-10 weeks), Medium complexity (12-16 weeks), Enterprise app (20-30 weeks). We use agile methodology with bi-weekly demos so you see progress regularly.'
                    ],
                    [
                        'Should I choose native or cross-platform development?',
                        'Native (Swift/Kotlin) is best for performance-heavy apps and platform-specific features. Cross-platform (Flutter/React Native) is best for faster delivery, lower cost, and reaching both iOS and Android. We recommend based on your needs.'
                    ],
                    [
                        'Will you help with App Store and Play Store submission?',
                        'Yes! We handle the complete app submission process - creating developer accounts, preparing screenshots, writing descriptions, ASO (App Store Optimization), and submission to both Apple App Store and Google Play Store.'
                    ],
                    [
                        'Do you provide post-launch support and updates?',
                        'Yes, we offer comprehensive maintenance including bug fixes, OS updates compatibility, feature additions, performance optimization, and analytics monitoring. Maintenance packages start at ₹10,000/month.'
                    ]
                ])
            ],

            // ============================================
            // 3. DIGITAL MARKETING
            // ============================================
            'services/digital-marketing' => [
                'schema' => $this->jsonEncode([
                    "@context" => "https://schema.org",
                    "@type" => "Service",
                    "@id" => "https://shivatechdigital.com/services/digital-marketing#service",
                    "name" => "Digital Marketing Services in Noida",
                    "description" => "Full-service digital marketing agency in Noida offering SEO, PPC, social media, content marketing, and email marketing services.",
                    "provider" => ["@id" => $orgId],
                    "areaServed" => [
                        ["@type" => "City", "name" => "Noida"],
                        ["@type" => "City", "name" => "Delhi"],
                        ["@type" => "Country", "name" => "India"]
                    ],
                    "serviceType" => "Digital Marketing",
                    "offers" => [
                        "@type" => "AggregateOffer",
                        "priceCurrency" => "INR",
                        "lowPrice" => "15000",
                        "highPrice" => "200000",
                        "offerCount" => "6"
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "4.9",
                        "reviewCount" => "52",
                        "bestRating" => "5"
                    ]
                ]),
                
                'breadcrumb' => $this->breadcrumb([
                    ['Home', '/'],
                    ['Services', '/services'],
                    ['Digital Marketing', '/services/digital-marketing']
                ]),
                
                'faq' => $this->faqSchema([
                    [
                        'What digital marketing services do you offer?',
                        'We offer complete digital marketing: SEO (Search Engine Optimization), PPC (Google Ads, Facebook Ads), Social Media Marketing, Content Marketing, Email Marketing, Influencer Marketing, and Marketing Analytics.'
                    ],
                    [
                        'How much do digital marketing services cost?',
                        'Monthly packages: Starter (₹15,000-25,000), Growth (₹25,000-50,000), Pro (₹50,000-1,00,000), Enterprise (₹1,00,000+). We customize packages based on your goals, industry, and competition.'
                    ],
                    [
                        'How long does it take to see results from digital marketing?',
                        'Results timeline: PPC/Google Ads (1-2 weeks for traffic), Social media engagement (1-2 months), SEO results (3-6 months for significant ranking improvements), Content marketing (3-12 months for authority building).'
                    ],
                    [
                        'Do you provide monthly reports and analytics?',
                        'Yes! We provide detailed monthly reports with metrics like traffic, rankings, conversions, ROI, social media engagement, and ad performance. Weekly catch-up calls also available for transparency.'
                    ],
                    [
                        'Can you guarantee #1 ranking on Google?',
                        'No legitimate agency can guarantee #1 ranking (Google itself says this). However, we have a proven track record of improving rankings for 95% of our clients within 6 months using white-hat SEO techniques.'
                    ],
                    [
                        'Do you work with small businesses and startups?',
                        'Yes! We specialize in startups and SMEs. We offer flexible packages, transparent pricing, and direct founder access. Our startup-friendly approach has helped 100+ small businesses grow online.'
                    ]
                ])
            ],

            // ============================================
            // 4. SEO SERVICES
            // ============================================
            'services/seo-services' => [
                'schema' => $this->jsonEncode([
                    "@context" => "https://schema.org",
                    "@type" => "Service",
                    "@id" => "https://shivatechdigital.com/services/seo-services#service",
                    "name" => "SEO Services in Noida",
                    "description" => "Professional SEO services to rank your website higher on Google. On-page SEO, technical SEO, local SEO, and link building services in Noida.",
                    "provider" => ["@id" => $orgId],
                    "areaServed" => [
                        ["@type" => "City", "name" => "Noida"],
                        ["@type" => "City", "name" => "Delhi"],
                        ["@type" => "Country", "name" => "India"]
                    ],
                    "serviceType" => "Search Engine Optimization",
                    "offers" => [
                        "@type" => "AggregateOffer",
                        "priceCurrency" => "INR",
                        "lowPrice" => "10000",
                        "highPrice" => "100000",
                        "offerCount" => "4"
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "4.9",
                        "reviewCount" => "63",
                        "bestRating" => "5"
                    ]
                ]),
                
                'breadcrumb' => $this->breadcrumb([
                    ['Home', '/'],
                    ['Services', '/services'],
                    ['SEO Services', '/services/seo-services']
                ]),
                
                'faq' => $this->faqSchema([
                    [
                        'What is included in your SEO services?',
                        'Our SEO services include: Technical SEO audit, On-page optimization, Content optimization, Keyword research, Competitor analysis, Local SEO, Link building, Schema markup, Monthly reporting, and Google Search Console setup.'
                    ],
                    [
                        'How much do SEO services cost in Noida?',
                        'Monthly SEO packages: Local SEO (₹10,000-20,000), Standard SEO (₹20,000-40,000), Advanced SEO (₹40,000-75,000), Enterprise SEO (₹75,000+). One-time SEO audit available at ₹15,000.'
                    ],
                    [
                        'How long does SEO take to show results?',
                        'SEO is a long-term strategy. You\'ll see initial improvements in 2-3 months, significant ranking improvements in 4-6 months, and dominant rankings in 6-12 months. Local SEO usually shows faster results (1-3 months).'
                    ],
                    [
                        'Do you provide local SEO for businesses in Noida?',
                        'Yes! Local SEO is one of our specialties. We optimize Google My Business, get local citations, build location-based content, manage reviews, and target "near me" searches for businesses in Noida, Delhi NCR.'
                    ],
                    [
                        'Will you use black-hat SEO techniques?',
                        'Never! We only use white-hat SEO techniques approved by Google. Black-hat techniques may give quick results but will get your site penalized or banned. We focus on sustainable, long-term ranking improvements.'
                    ],
                    [
                        'Do I need SEO if I run Google Ads?',
                        'Yes, you need both! Google Ads gives instant traffic but stops when you stop paying. SEO gives organic traffic that compounds over time. Best strategy: Use ads for quick wins while building SEO for long-term traffic.'
                    ]
                ])
            ],

            // ============================================
            // 5. UI/UX DESIGN
            // ============================================
            'services/ui-ux-design' => [
                'schema' => $this->jsonEncode([
                    "@context" => "https://schema.org",
                    "@type" => "Service",
                    "@id" => "https://shivatechdigital.com/services/ui-ux-design#service",
                    "name" => "UI/UX Design Services in Noida",
                    "description" => "Professional UI/UX design services for websites and mobile apps. User-centered design, Figma prototypes, wireframes.",
                    "provider" => ["@id" => $orgId],
                    "areaServed" => [
                        ["@type" => "City", "name" => "Noida"],
                        ["@type" => "City", "name" => "Delhi"]
                    ],
                    "serviceType" => "UI/UX Design",
                    "offers" => [
                        "@type" => "AggregateOffer",
                        "priceCurrency" => "INR",
                        "lowPrice" => "20000",
                        "highPrice" => "300000",
                        "offerCount" => "4"
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "4.8",
                        "reviewCount" => "28",
                        "bestRating" => "5"
                    ]
                ]),
                
                'breadcrumb' => $this->breadcrumb([
                    ['Home', '/'],
                    ['Services', '/services'],
                    ['UI/UX Design', '/services/ui-ux-design']
                ]),
                
                'faq' => $this->faqSchema([
                    [
                        'What is the difference between UI and UX design?',
                        'UI (User Interface) focuses on visual design - colors, typography, buttons, layout. UX (User Experience) focuses on user journey, research, wireframes, and overall experience. Both are essential for successful digital products.'
                    ],
                    [
                        'What tools do you use for UI/UX design?',
                        'We use industry-standard tools: Figma (primary), Adobe XD, Sketch for design; Miro for collaboration; InVision for prototyping; UserTesting for usability testing; and Hotjar for behavior analysis.'
                    ],
                    [
                        'How much does UI/UX design cost?',
                        'Costs vary by scope: Landing page design (₹20,000-50,000), Website design (₹50,000-1,50,000), Mobile app design (₹75,000-2,50,000), Complete brand UI/UX (₹1,50,000-5,00,000+). Includes revisions and source files.'
                    ],
                    [
                        'How long does the UI/UX design process take?',
                        'Typical timelines: Landing page (1-2 weeks), Small website (3-4 weeks), Large website (6-8 weeks), Mobile app (4-6 weeks). Includes research, wireframes, design iterations, and prototypes.'
                    ],
                    [
                        'Do you provide design source files (Figma files)?',
                        'Yes! You get complete ownership including Figma source files, design system, style guide, all assets, and documentation. We also provide design handoff to developers with proper specifications.'
                    ],
                    [
                        'Can you redesign my existing website or app?',
                        'Absolutely! Redesign projects often have higher ROI. We start with UX audit of your current design, analyze user behavior, conduct usability testing, and create modern redesign that improves conversions and user satisfaction.'
                    ]
                ])
            ],

            // ============================================
            // 6. E-COMMERCE DEVELOPMENT
            // ============================================
            'services/ecommerce-development' => [
                'schema' => $this->jsonEncode([
                    "@context" => "https://schema.org",
                    "@type" => "Service",
                    "@id" => "https://shivatechdigital.com/services/ecommerce-development#service",
                    "name" => "E-commerce Website Development in Noida",
                    "description" => "E-commerce website development services. Shopify, WooCommerce, Magento, and custom online stores.",
                    "provider" => ["@id" => $orgId],
                    "areaServed" => [
                        ["@type" => "City", "name" => "Noida"],
                        ["@type" => "Country", "name" => "India"]
                    ],
                    "serviceType" => "E-commerce Development",
                    "offers" => [
                        "@type" => "AggregateOffer",
                        "priceCurrency" => "INR",
                        "lowPrice" => "35000",
                        "highPrice" => "800000",
                        "offerCount" => "4"
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "4.8",
                        "reviewCount" => "31",
                        "bestRating" => "5"
                    ]
                ]),
                
                'breadcrumb' => $this->breadcrumb([
                    ['Home', '/'],
                    ['Services', '/services'],
                    ['E-commerce Development', '/services/ecommerce-development']
                ]),
                
                'faq' => $this->faqSchema([
                    [
                        'Which e-commerce platform is best for my business?',
                        'Depends on your needs: Shopify (easiest, best for beginners), WooCommerce (flexible, WordPress-based), Magento (powerful, large stores), Custom build (full control, unique features). We help you choose based on budget, features, and growth plans.'
                    ],
                    [
                        'How much does e-commerce website development cost?',
                        'Costs: Basic Shopify store (₹35,000-75,000), WooCommerce store (₹50,000-1,50,000), Custom e-commerce (₹2,00,000-8,00,000), Multi-vendor marketplace (₹3,00,000+). Includes payment gateway, shipping, and basic SEO.'
                    ],
                    [
                        'Which payment gateways do you integrate?',
                        'We integrate all major Indian payment gateways: Razorpay, Paytm, PayU, CCAvenue, Instamojo, PhonePe Business. Also international: Stripe, PayPal. UPI, cards, net banking, wallets, EMI - all supported.'
                    ],
                    [
                        'Do you provide product photography and content?',
                        'We don\'t provide photography in-house but partner with photographers in Noida. We do help with product descriptions, SEO content, category structuring, and product import from existing systems.'
                    ],
                    [
                        'Can you integrate inventory management and shipping?',
                        'Yes! We integrate with leading inventory systems (Zoho, Unicommerce, Vinculum) and shipping partners (Shiprocket, Delhivery, Bluedart, FedEx, DTDC). Automated order processing and tracking included.'
                    ],
                    [
                        'Will my e-commerce site be SEO-friendly?',
                        'Absolutely! E-commerce SEO is critical for success. We include: schema markup for products, optimized URLs, fast loading, mobile-responsive design, sitemap, breadcrumbs, and proper category structure. Additional SEO services available.'
                    ]
                ])
            ],

            // ============================================
            // 7. SOCIAL MEDIA MARKETING
            // ============================================
            'services/social-media-marketing' => [
                'schema' => $this->jsonEncode([
                    "@context" => "https://schema.org",
                    "@type" => "Service",
                    "@id" => "https://shivatechdigital.com/services/social-media-marketing#service",
                    "name" => "Social Media Marketing Services in Noida",
                    "description" => "Professional social media management for Facebook, Instagram, LinkedIn, Twitter.",
                    "provider" => ["@id" => $orgId],
                    "areaServed" => [
                        ["@type" => "City", "name" => "Noida"],
                        ["@type" => "Country", "name" => "India"]
                    ],
                    "serviceType" => "Social Media Marketing",
                    "offers" => [
                        "@type" => "AggregateOffer",
                        "priceCurrency" => "INR",
                        "lowPrice" => "8000",
                        "highPrice" => "75000",
                        "offerCount" => "4"
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "4.8",
                        "reviewCount" => "42",
                        "bestRating" => "5"
                    ]
                ]),
                
                'breadcrumb' => $this->breadcrumb([
                    ['Home', '/'],
                    ['Services', '/services'],
                    ['Social Media Marketing', '/services/social-media-marketing']
                ]),
                
                'faq' => $this->faqSchema([
                    [
                        'Which social media platforms do you manage?',
                        'We manage all major platforms: Facebook, Instagram, LinkedIn, Twitter (X), YouTube, Pinterest, and Threads. We recommend platforms based on your target audience and business type.'
                    ],
                    [
                        'How much does social media marketing cost?',
                        'Monthly packages: Basic (₹8,000-15,000 - 2 platforms), Standard (₹15,000-30,000 - 3-4 platforms with ads), Premium (₹30,000-50,000 - all platforms + influencers), Enterprise (₹50,000+ - complete strategy).'
                    ],
                    [
                        'How many posts will you create per month?',
                        'Typical content output: Basic (12-15 posts/platform), Standard (20-25 posts/platform), Premium (30+ posts/platform). Includes static posts, carousels, reels, stories, and ad creatives.'
                    ],
                    [
                        'Do you run paid ads on social media?',
                        'Yes! We run Facebook Ads, Instagram Ads, LinkedIn Ads, and Twitter Ads. We handle targeting, creative design, budget management, A/B testing, and optimization for best ROI. Ad spend is separate from management fees.'
                    ],
                    [
                        'How long does it take to grow social media following?',
                        'Realistic growth: 200-500 followers/month organically, 1000-5000 followers/month with paid ads. But quality matters more than quantity - engaged followers convert better than vanity numbers.'
                    ],
                    [
                        'Do you provide monthly analytics reports?',
                        'Yes! Detailed monthly reports with metrics: reach, impressions, engagement rate, follower growth, top posts, demographics, lead generation, and ad performance. Strategy adjustments based on data.'
                    ]
                ])
            ],

            // ============================================
            // 8. CONTENT MARKETING
            // ============================================
            'services/content-marketing' => [
                'schema' => $this->jsonEncode([
                    "@context" => "https://schema.org",
                    "@type" => "Service",
                    "@id" => "https://shivatechdigital.com/services/content-marketing#service",
                    "name" => "Content Marketing Services in Noida",
                    "description" => "Strategic content marketing to attract, engage, and convert customers. Blog writing, copywriting, content strategy.",
                    "provider" => ["@id" => $orgId],
                    "serviceType" => "Content Marketing",
                    "offers" => [
                        "@type" => "AggregateOffer",
                        "priceCurrency" => "INR",
                        "lowPrice" => "5000",
                        "highPrice" => "100000",
                        "offerCount" => "5"
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "4.7",
                        "reviewCount" => "25",
                        "bestRating" => "5"
                    ]
                ]),
                
                'breadcrumb' => $this->breadcrumb([
                    ['Home', '/'],
                    ['Services', '/services'],
                    ['Content Marketing', '/services/content-marketing']
                ]),
                
                'faq' => $this->faqSchema([
                    [
                        'What types of content do you create?',
                        'We create all content types: Blog articles, SEO articles, website copy, social media content, email newsletters, video scripts, case studies, whitepapers, press releases, product descriptions, and landing page copy.'
                    ],
                    [
                        'How much does content writing cost?',
                        'Pricing: Blog post 500 words (₹1,500-3,000), Blog post 1500 words (₹3,500-6,000), Website page (₹2,000-5,000), Long-form content 3000+ words (₹8,000-15,000). Bulk discounts available.'
                    ],
                    [
                        'Will the content be SEO-optimized?',
                        'Yes! All content includes: keyword research, on-page SEO, meta descriptions, header tags, internal linking, alt text suggestions, schema-friendly structure, and search intent matching.'
                    ],
                    [
                        'Is the content original and plagiarism-free?',
                        '100% original content guaranteed. We use Copyscape and Grammarly Premium to verify originality. We never use AI-generated content without human editing and personalization for your brand voice.'
                    ],
                    [
                        'How many revisions do you provide?',
                        'We provide 2 free revisions per content piece. Additional revisions at minimal cost. Most clients are happy with first or second draft as we thoroughly understand requirements upfront.'
                    ],
                    [
                        'Can you write in industry-specific niches?',
                        'Yes! Our writers specialize in: Technology, SaaS, E-commerce, Healthcare, Finance, Real Estate, Education, Travel, Food, Fashion, B2B, Marketing, and more. We assign domain expert writers based on your industry.'
                    ]
                ])
            ],

            // ============================================
            // 9. CLOUD SOLUTIONS
            // ============================================
            'services/cloud-solutions' => [
                'schema' => $this->jsonEncode([
                    "@context" => "https://schema.org",
                    "@type" => "Service",
                    "@id" => "https://shivatechdigital.com/services/cloud-solutions#service",
                    "name" => "Cloud Solutions & Migration Services in Noida",
                    "description" => "Cloud migration and management services. AWS, Azure, Google Cloud setup, migration, and optimization.",
                    "provider" => ["@id" => $orgId],
                    "serviceType" => "Cloud Computing Services",
                    "offers" => [
                        "@type" => "AggregateOffer",
                        "priceCurrency" => "INR",
                        "lowPrice" => "25000",
                        "highPrice" => "500000",
                        "offerCount" => "4"
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "4.9",
                        "reviewCount" => "18",
                        "bestRating" => "5"
                    ]
                ]),
                
                'breadcrumb' => $this->breadcrumb([
                    ['Home', '/'],
                    ['Services', '/services'],
                    ['Cloud Solutions', '/services/cloud-solutions']
                ]),
                
                'faq' => $this->faqSchema([
                    [
                        'Which cloud platforms do you work with?',
                        'We specialize in: AWS (Amazon Web Services), Microsoft Azure, Google Cloud Platform (GCP), DigitalOcean, and Linode. We help you choose the right platform based on cost, features, and scalability needs.'
                    ],
                    [
                        'What cloud services do you offer?',
                        'Complete cloud services: Cloud setup and architecture, Migration from on-premise to cloud, Server management, Database management, Backup and disaster recovery, Cost optimization, Security configuration, and 24/7 monitoring.'
                    ],
                    [
                        'How much does cloud migration cost?',
                        'Migration costs vary: Small business migration (₹25,000-75,000), Medium business (₹75,000-2,00,000), Enterprise migration (₹2,00,000-10,00,000+). Includes assessment, planning, execution, and post-migration support.'
                    ],
                    [
                        'How long does cloud migration take?',
                        'Typical timelines: Simple website migration (1-2 weeks), Application migration (2-4 weeks), Database migration (1-3 weeks), Complete enterprise migration (1-6 months). We do zero-downtime migrations when possible.'
                    ],
                    [
                        'Can you help reduce my cloud bills?',
                        'Yes! Our cloud cost optimization services typically save 30-50% on monthly bills through: Right-sizing instances, Reserved instance planning, Removing unused resources, Auto-scaling setup, and Cost monitoring dashboards.'
                    ],
                    [
                        'Do you provide ongoing cloud management?',
                        'Yes! We offer managed cloud services: 24/7 monitoring, Security patching, Performance optimization, Cost management, Backup management, and Disaster recovery. Monthly packages from ₹15,000.'
                    ]
                ])
            ],

            // ============================================
            // 10. BRANDING SERVICES
            // ============================================
            'services/branding-services' => [
                'schema' => $this->jsonEncode([
                    "@context" => "https://schema.org",
                    "@type" => "Service",
                    "@id" => "https://shivatechdigital.com/services/branding-services#service",
                    "name" => "Branding & Identity Design Services in Noida",
                    "description" => "Complete branding services including logo design, brand identity, brand strategy, and brand guidelines.",
                    "provider" => ["@id" => $orgId],
                    "serviceType" => "Branding Services",
                    "offers" => [
                        "@type" => "AggregateOffer",
                        "priceCurrency" => "INR",
                        "lowPrice" => "5000",
                        "highPrice" => "300000",
                        "offerCount" => "4"
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "4.8",
                        "reviewCount" => "22",
                        "bestRating" => "5"
                    ]
                ]),
                
                'breadcrumb' => $this->breadcrumb([
                    ['Home', '/'],
                    ['Services', '/services'],
                    ['Branding Services', '/services/branding-services']
                ]),
                
                'faq' => $this->faqSchema([
                    [
                        'What is included in branding services?',
                        'Complete branding includes: Logo design, brand color palette, typography, brand voice and messaging, brand guidelines document, business card design, letterhead, social media templates, and brand strategy documentation.'
                    ],
                    [
                        'How much does logo design cost?',
                        'Logo design packages: Basic logo (₹5,000-10,000), Professional logo with variations (₹15,000-25,000), Premium branding package (₹35,000-75,000), Complete brand identity (₹75,000-3,00,000+).'
                    ],
                    [
                        'How many logo concepts will I receive?',
                        'You get: Basic package (3 concepts, 2 revisions), Professional (5 concepts, unlimited revisions), Premium (7+ concepts, unlimited revisions, complete brand kit). All include source files in vector formats.'
                    ],
                    [
                        'Will I get logo source files?',
                        'Yes! You receive all source files: AI (Illustrator), EPS, PDF (vector), PNG (transparent), JPG (various sizes), favicon, and social media versions. Complete ownership and copyright transferred to you.'
                    ],
                    [
                        'How long does branding take?',
                        'Timelines: Logo only (1 week), Basic branding (2 weeks), Complete brand identity (3-4 weeks), Full brand strategy with research (6-8 weeks). Includes brand discovery, design, and refinement phases.'
                    ],
                    [
                        'Do you provide rebranding services?',
                        'Yes! Rebranding for existing businesses is one of our specialties. We analyze your current brand, conduct market research, redesign while maintaining brand equity, and provide transition plans for smooth rebranding.'
                    ]
                ])
            ],

            // ============================================
            // 11. GRAPHIC DESIGN
            // ============================================
            'services/graphic-design' => [
                'schema' => $this->jsonEncode([
                    "@context" => "https://schema.org",
                    "@type" => "Service",
                    "@id" => "https://shivatechdigital.com/services/graphic-design#service",
                    "name" => "Graphic Design Services in Noida",
                    "description" => "Professional graphic design services for logos, banners, social media, print, packaging.",
                    "provider" => ["@id" => $orgId],
                    "serviceType" => "Graphic Design",
                    "offers" => [
                        "@type" => "AggregateOffer",
                        "priceCurrency" => "INR",
                        "lowPrice" => "1000",
                        "highPrice" => "50000",
                        "offerCount" => "6"
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "4.7",
                        "reviewCount" => "33",
                        "bestRating" => "5"
                    ]
                ]),
                
                'breadcrumb' => $this->breadcrumb([
                    ['Home', '/'],
                    ['Services', '/services'],
                    ['Graphic Design', '/services/graphic-design']
                ]),
                
                'faq' => $this->faqSchema([
                    [
                        'What graphic design services do you offer?',
                        'Complete graphic design: Logos, business cards, brochures, flyers, banners, social media graphics, infographics, packaging design, book covers, presentations, posters, and digital ads.'
                    ],
                    [
                        'How much do graphic design services cost?',
                        'Pricing per design: Social media post (₹500-1,500), Banner/Flyer (₹1,500-5,000), Brochure (₹5,000-15,000), Infographic (₹3,000-10,000), Packaging design (₹10,000-50,000). Bulk packages available.'
                    ],
                    [
                        'How fast can you deliver designs?',
                        'Turnaround times: Simple designs (24-48 hours), Medium complexity (3-5 days), Complex designs (1-2 weeks). Rush delivery available at 50% extra charge for urgent needs.'
                    ],
                    [
                        'Do you provide source files?',
                        'Yes! You receive all editable source files: AI, PSD, INDD, or Figma files. Plus exported formats in PNG, JPG, PDF, EPS as needed. Complete ownership transferred to you.'
                    ],
                    [
                        'How many revisions are included?',
                        'Standard projects include 2-3 revisions. Premium projects include unlimited revisions. We typically nail the design in first or second iteration through thorough briefing and understanding.'
                    ],
                    [
                        'Can you match my existing brand style?',
                        'Absolutely! We work with your brand guidelines, colors, fonts, and visual style. Share your brand book or existing materials and we\'ll create new designs that perfectly match your brand identity.'
                    ]
                ])
            ],

            // ============================================
            // 12. VIDEO PRODUCTION
            // ============================================
            'services/video-production' => [
                'schema' => $this->jsonEncode([
                    "@context" => "https://schema.org",
                    "@type" => "Service",
                    "@id" => "https://shivatechdigital.com/services/video-production#service",
                    "name" => "Video Production Services in Noida",
                    "description" => "Professional video production for corporate, marketing, product videos, animations, and social media.",
                    "provider" => ["@id" => $orgId],
                    "serviceType" => "Video Production",
                    "offers" => [
                        "@type" => "AggregateOffer",
                        "priceCurrency" => "INR",
                        "lowPrice" => "5000",
                        "highPrice" => "500000",
                        "offerCount" => "5"
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "4.7",
                        "reviewCount" => "19",
                        "bestRating" => "5"
                    ]
                ]),
                
                'breadcrumb' => $this->breadcrumb([
                    ['Home', '/'],
                    ['Services', '/services'],
                    ['Video Production', '/services/video-production']
                ]),
                
                'faq' => $this->faqSchema([
                    [
                        'What types of videos do you produce?',
                        'We produce: Corporate videos, product demos, explainer videos, animated videos, testimonial videos, social media reels, YouTube content, training videos, event coverage, and ad films.'
                    ],
                    [
                        'How much does video production cost?',
                        'Costs vary: Simple animation (₹5,000-15,000), Social media reel (₹3,000-10,000), Explainer video (₹15,000-50,000), Corporate video (₹50,000-2,00,000), Premium ad film (₹2,00,000+).'
                    ],
                    [
                        'Do you provide scripting and storyboarding?',
                        'Yes! Complete service includes: Concept development, scriptwriting, storyboarding, voiceover artist coordination, music selection, and final video editing. We can also work with your provided script.'
                    ],
                    [
                        'How long does video production take?',
                        'Timelines: Simple animation (1-2 weeks), Corporate video (3-4 weeks), Complex product video (4-6 weeks), Ad film (6-8 weeks). Includes pre-production, shooting, and post-production phases.'
                    ],
                    [
                        'Can you make videos for multiple social platforms?',
                        'Yes! We optimize one video for multiple platforms: YouTube (16:9), Instagram Reels (9:16), Facebook (1:1 or 16:9), TikTok (9:16), LinkedIn (16:9). Single shoot, multiple deliverables.'
                    ],
                    [
                        'Do you provide voiceover services?',
                        'Yes, we have a network of professional voiceover artists in Hindi, English, and regional languages. AI voiceover also available for budget projects. We help select the right voice based on your brand.'
                    ]
                ])
            ],

            // ============================================
            // 13. MAINTENANCE & SUPPORT
            // ============================================
            'services/maintenance-support' => [
                'schema' => $this->jsonEncode([
                    "@context" => "https://schema.org",
                    "@type" => "Service",
                    "@id" => "https://shivatechdigital.com/services/maintenance-support#service",
                    "name" => "Website Maintenance & Support Services in Noida",
                    "description" => "Reliable website maintenance, updates, security, backup, and 24/7 technical support services.",
                    "provider" => ["@id" => $orgId],
                    "serviceType" => "Website Maintenance",
                    "offers" => [
                        "@type" => "AggregateOffer",
                        "priceCurrency" => "INR",
                        "lowPrice" => "3000",
                        "highPrice" => "50000",
                        "offerCount" => "4"
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "4.9",
                        "reviewCount" => "44",
                        "bestRating" => "5"
                    ]
                ]),
                
                'breadcrumb' => $this->breadcrumb([
                    ['Home', '/'],
                    ['Services', '/services'],
                    ['Maintenance & Support', '/services/maintenance-support']
                ]),
                
                'faq' => $this->faqSchema([
                    [
                        'What is included in website maintenance?',
                        'Complete maintenance: Security updates, plugin/theme updates, backups (daily/weekly), bug fixes, content updates, performance optimization, broken link checks, uptime monitoring, and 24/7 support.'
                    ],
                    [
                        'How much does website maintenance cost?',
                        'Monthly packages: Basic (₹3,000-7,000), Standard (₹7,000-15,000), Pro (₹15,000-30,000), Enterprise (₹30,000+). Includes hours of dedicated support based on package level.'
                    ],
                    [
                        'Do you maintain websites you didn\'t build?',
                        'Yes! We maintain websites built by others. We start with a thorough audit, identify issues, fix immediate problems, then provide ongoing maintenance. WordPress, Laravel, custom sites - all supported.'
                    ],
                    [
                        'How often do you backup websites?',
                        'Backup frequency: Daily for e-commerce sites, weekly for business websites. Backups stored in multiple locations (cloud + local). Restore time under 30 minutes in case of issues.'
                    ],
                    [
                        'What if my website gets hacked?',
                        'We provide emergency hack recovery: malware removal, security hardening, Google blacklist removal, vulnerability patching, and security audit. Available 24/7 for emergencies. Prevention better than cure - we offer security packages.'
                    ],
                    [
                        'Do you handle WordPress maintenance specifically?',
                        'Yes! WordPress maintenance is one of our specialties: core updates, theme/plugin updates, security audits, malware scans, database optimization, speed optimization, and WooCommerce maintenance. Free trial available.'
                    ]
                ])
            ],

            // ============================================
            // 14. SERVICES INDEX
            // ============================================
            'services' => [
                'schema' => $this->jsonEncode([
                    "@context" => "https://schema.org",
                    "@type" => "CollectionPage",
                    "@id" => "https://shivatechdigital.com/services#collectionpage",
                    "url" => "https://shivatechdigital.com/services",
                    "name" => "Our Services | Shiva Tech Digital Noida",
                    "description" => "Complete digital services - web development, mobile apps, SEO, digital marketing, cloud solutions in Noida.",
                    "isPartOf" => ["@id" => $websiteId],
                    "inLanguage" => "en-IN"
                ]),
                
                'breadcrumb' => $this->breadcrumb([
                    ['Home', '/'],
                    ['Services', '/services']
                ]),
                
                'faq' => $this->faqSchema([
                    [
                        'What services does Shiva Tech Digital offer?',
                        'We offer 13+ digital services: Web Development, Mobile App Development, UI/UX Design, E-commerce Development, Digital Marketing, SEO Services, Social Media Marketing, Content Marketing, Cloud Solutions, Branding, Graphic Design, Video Production, and Maintenance Support.'
                    ],
                    [
                        'Do you provide all services under one roof?',
                        'Yes! Shiva Tech Digital is a full-service agency. From idea to launch and beyond - we handle everything: strategy, design, development, marketing, and maintenance. Single point of contact for all digital needs.'
                    ],
                    [
                        'Can I combine multiple services for better pricing?',
                        'Absolutely! Bundle packages save 20-30% compared to individual services. Popular combos: Website + SEO + Social Media, App + Backend + Marketing, Branding + Website + Digital Marketing. Custom packages available.'
                    ],
                    [
                        'Do you work with international clients?',
                        'Yes! We serve clients globally: USA, UK, Canada, Australia, UAE, Singapore. We work in different time zones and use Slack/Zoom for seamless communication. Multi-currency invoicing available.'
                    ],
                    [
                        'What industries do you specialize in?',
                        'We work across industries: SaaS, E-commerce, Healthcare, Education, Real Estate, Finance, Travel, Food & Beverage, Manufacturing, Professional Services, and Startups. Industry-specific expertise available.'
                    ]
                ])
            ],
        ];
    }

    /**
     * Helper: Generate breadcrumb schema
     */
    private function breadcrumb(array $items): string
    {
        $baseUrl = "https://shivatechdigital.com";
        $list = [];
        
        foreach ($items as $index => $item) {
            $list[] = [
                "@type" => "ListItem",
                "position" => $index + 1,
                "name" => $item[0],
                "item" => $baseUrl . $item[1]
            ];
        }

        return $this->jsonEncode([
            "@context" => "https://schema.org",
            "@type" => "BreadcrumbList",
            "itemListElement" => $list
        ]);
    }

    /**
     * Helper: Generate FAQ schema
     */
    private function faqSchema(array $faqs): string
    {
        $entities = [];
        
        foreach ($faqs as $faq) {
            $entities[] = [
                "@type" => "Question",
                "name" => $faq[0],
                "acceptedAnswer" => [
                    "@type" => "Answer",
                    "text" => $faq[1]
                ]
            ];
        }

        return $this->jsonEncode([
            "@context" => "https://schema.org",
            "@type" => "FAQPage",
            "mainEntity" => $entities
        ]);
    }

    /**
     * Helper: JSON encode with proper flags
     */
    private function jsonEncode(array $data): string
    {
        return json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}