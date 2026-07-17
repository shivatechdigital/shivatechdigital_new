<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $faqs = [
            [
                'question' => 'How long does it take to build a custom website?',
                'answer' => 'The timeline depends on the complexity of your project. A simple website takes 2-4 weeks, while complex web applications can take 2-6 months. We provide detailed timelines during our initial consultation.'
            ],
            [
                'question' => 'What technologies do you use for web development?',
                'answer' => 'We use modern technologies including React, Angular, Vue.js for frontend, and Node.js, Laravel, Django, .NET for backend. We choose the best stack based on your project requirements.'
            ],
            [
                'question' => 'Do you provide website maintenance after launch?',
                'answer' => 'Yes, we offer comprehensive maintenance packages including security updates, performance optimization, content updates, and 24/7 technical support.'
            ],
            [
                'question' => 'Can you redesign my existing website?',
                'answer' => 'Absolutely! We specialize in website redesigns that improve user experience, performance, and conversions while maintaining your brand identity.'
            ],
            [
                'question' => 'Do you build responsive websites?',
                'answer' => 'Yes, all our websites are fully responsive and optimized for all devices including desktops, tablets, and mobile phones.'
            ]
        ];

        $relatedServices = [
            ['name' => 'UI/UX Design', 'route' => 'services.ui-ux', 'icon' => 'fas fa-paint-brush'],
            ['name' => 'E-commerce Development', 'route' => 'services.ecommerce', 'icon' => 'fas fa-shopping-cart'],
            ['name' => 'SEO Services', 'route' => 'services.seo', 'icon' => 'fas fa-search'],
        ];
        return view('website.pages.services.index', compact('faqs', 'relatedServices'));
    }

    public function webDevelopment()
    {
        $faqs = [
            [
                'question' => 'How long does it take to build a custom website?',
                'answer' => 'The timeline depends on the complexity of your project. A simple website takes 2-4 weeks, while complex web applications can take 2-6 months. We provide detailed timelines during our initial consultation.'
            ],
            [
                'question' => 'What technologies do you use for web development?',
                'answer' => 'We use modern technologies including React, Angular, Vue.js for frontend, and Node.js, Laravel, Django, .NET for backend. We choose the best stack based on your project requirements.'
            ],
            [
                'question' => 'Do you provide website maintenance after launch?',
                'answer' => 'Yes, we offer comprehensive maintenance packages including security updates, performance optimization, content updates, and 24/7 technical support.'
            ],
            [
                'question' => 'Can you redesign my existing website?',
                'answer' => 'Absolutely! We specialize in website redesigns that improve user experience, performance, and conversions while maintaining your brand identity.'
            ],
            [
                'question' => 'Do you build responsive websites?',
                'answer' => 'Yes, all our websites are fully responsive and optimized for all devices including desktops, tablets, and mobile phones.'
            ]
        ];

        $relatedServices = [
            ['name' => 'UI/UX Design', 'route' => 'services.ui-ux', 'icon' => 'fas fa-paint-brush'],
            ['name' => 'E-commerce Development', 'route' => 'services.ecommerce', 'icon' => 'fas fa-shopping-cart'],
            ['name' => 'SEO Services', 'route' => 'services.seo', 'icon' => 'fas fa-search'],
        ];

        return view('website.pages.services.web-development', compact('faqs', 'relatedServices'));
    }

    public function mobileAppDevelopment()
    {
        $faqs = [
            [
                'question' => 'Should I build a native or cross-platform app?',
                'answer' => 'It depends on your requirements. Native apps offer best performance for complex applications, while cross-platform (React Native, Flutter) is cost-effective for simpler apps that need to work on both iOS and Android.'
            ],
            [
                'question' => 'How much does mobile app development cost?',
                'answer' => 'Costs vary based on complexity. Simple apps start from ₹2-5 lakhs, medium complexity apps ₹5-15 lakhs, and complex enterprise apps can go higher. We provide detailed quotes after understanding your requirements.'
            ],
            [
                'question' => 'Do you help with app store submission?',
                'answer' => 'Yes, we handle the complete app store submission process for both Apple App Store and Google Play Store, including optimization for better visibility.'
            ],
            [
                'question' => 'Can you develop apps for both iOS and Android?',
                'answer' => 'Yes, we develop native iOS apps (Swift), native Android apps (Kotlin), and cross-platform apps using React Native and Flutter.'
            ],
            [
                'question' => 'Do you provide post-launch support?',
                'answer' => 'Yes, we offer ongoing maintenance, bug fixes, feature updates, and technical support to ensure your app runs smoothly.'
            ]
        ];

        $relatedServices = [
            ['name' => 'Web Development', 'route' => 'services.web-development', 'icon' => 'fas fa-globe'],
            ['name' => 'UI/UX Design', 'route' => 'services.ui-ux', 'icon' => 'fas fa-paint-brush'],
            ['name' => 'Cloud Solutions', 'route' => 'services.cloud', 'icon' => 'fas fa-cloud'],
        ];

        return view('website.pages.services.mobile-app-development', compact('faqs', 'relatedServices'));
    }

    public function uiUxDesign()
    {
        $faqs = [
            [
                'question' => 'What is the difference between UI and UX design?',
                'answer' => 'UX (User Experience) design focuses on the overall feel and usability of a product, including user research and journey mapping. UI (User Interface) design focuses on the visual elements like colors, typography, and interactive elements.'
            ],
            [
                'question' => 'Why is UI/UX design important for my business?',
                'answer' => 'Good UI/UX design increases user satisfaction, reduces bounce rates, improves conversions, and builds brand loyalty. Studies show every $1 invested in UX returns $100.'
            ],
            [
                'question' => 'What deliverables will I receive?',
                'answer' => 'You will receive wireframes, high-fidelity mockups, interactive prototypes, design system documentation, and all source files in Figma/Adobe XD format.'
            ],
            [
                'question' => 'How long does the UI/UX design process take?',
                'answer' => 'A typical UI/UX project takes 4-8 weeks depending on complexity. This includes research, wireframing, prototyping, and multiple revision rounds.'
            ],
            [
                'question' => 'Do you conduct user research?',
                'answer' => 'Yes, we conduct comprehensive user research including surveys, interviews, competitor analysis, and usability testing to inform our design decisions.'
            ]
        ];

        $relatedServices = [
            ['name' => 'Web Development', 'route' => 'services.web-development', 'icon' => 'fas fa-globe'],
            ['name' => 'Branding Services', 'route' => 'services.branding', 'icon' => 'fas fa-palette'],
            ['name' => 'Mobile App Development', 'route' => 'services.mobile-app', 'icon' => 'fas fa-mobile-alt'],
        ];

        return view('website.pages.services.ui-ux-design', compact('faqs', 'relatedServices'));
    }

    public function ecommerce()
    {
        $faqs = [
            [
                'question' => 'Which e-commerce platform do you recommend?',
                'answer' => 'We recommend platforms based on your needs: Shopify for quick launches, WooCommerce for WordPress integration, Magento for enterprise-level stores, and custom solutions for unique requirements.'
            ],
            [
                'question' => 'Can you migrate my existing store?',
                'answer' => 'Yes, we provide complete e-commerce migration services including products, customers, orders, and SEO data migration with minimal downtime.'
            ],
            [
                'question' => 'Do you integrate payment gateways?',
                'answer' => 'Yes, we integrate all major payment gateways including Razorpay, PayU, Stripe, PayPal, and bank transfer options.'
            ],
            [
                'question' => 'Will my e-commerce store be mobile-friendly?',
                'answer' => 'Absolutely! All our e-commerce stores are fully responsive and optimized for mobile shopping, which accounts for over 60% of online purchases.'
            ],
            [
                'question' => 'Do you provide inventory management solutions?',
                'answer' => 'Yes, we implement robust inventory management systems with real-time tracking, low stock alerts, and integration with your supply chain.'
            ]
        ];

        $relatedServices = [
            ['name' => 'Digital Marketing', 'route' => 'services.digital-marketing', 'icon' => 'fas fa-bullhorn'],
            ['name' => 'SEO Services', 'route' => 'services.seo', 'icon' => 'fas fa-search'],
            ['name' => 'Web Development', 'route' => 'services.web-development', 'icon' => 'fas fa-globe'],
        ];

        return view('website.pages.services.ecommerce', compact('faqs', 'relatedServices'));
    }

    public function digitalMarketing()
    {
        $faqs = [
            [
                'question' => 'What digital marketing services do you offer?',
                'answer' => 'We offer comprehensive digital marketing including SEO, PPC advertising, social media marketing, content marketing, email marketing, and conversion rate optimization.'
            ],
            [
                'question' => 'How soon can I expect results?',
                'answer' => 'PPC and social media ads can show immediate results. SEO typically takes 3-6 months for significant improvements. We provide monthly reports to track progress.'
            ],
            [
                'question' => 'Do you provide monthly reports?',
                'answer' => 'Yes, we provide detailed monthly reports covering traffic, conversions, ROI, and key performance metrics with actionable insights.'
            ],
            [
                'question' => 'What is your pricing model?',
                'answer' => 'We offer flexible pricing including monthly retainers, project-based pricing, and performance-based models. Pricing depends on scope and goals.'
            ],
            [
                'question' => 'Can you work with my existing marketing team?',
                'answer' => 'Absolutely! We can collaborate with your in-house team, providing specialized expertise and additional bandwidth as needed.'
            ]
        ];

        $relatedServices = [
            ['name' => 'SEO Services', 'route' => 'services.seo', 'icon' => 'fas fa-search'],
            ['name' => 'Social Media Marketing', 'route' => 'services.social-media', 'icon' => 'fab fa-facebook'],
            ['name' => 'Content Marketing', 'route' => 'services.content', 'icon' => 'fas fa-pen'],
        ];

        return view('website.pages.services.digital-marketing', compact('faqs', 'relatedServices'));
    }

    public function seoServices()
    {
        $faqs = [
            [
                'question' => 'How long does SEO take to show results?',
                'answer' => 'SEO is a long-term strategy. You may see initial improvements in 1-3 months, but significant results typically appear in 4-6 months. Competitive industries may take longer.'
            ],
            [
                'question' => 'Do you guarantee first page rankings?',
                'answer' => 'We don\'t guarantee specific rankings as search algorithms are complex. However, we have a proven track record of significantly improving rankings and organic traffic for our clients.'
            ],
            [
                'question' => 'What SEO techniques do you use?',
                'answer' => 'We use only white-hat SEO techniques including keyword research, on-page optimization, technical SEO, quality link building, and content optimization.'
            ],
            [
                'question' => 'Do you provide local SEO services?',
                'answer' => 'Yes, we specialize in local SEO including Google My Business optimization, local citations, and location-based keyword targeting.'
            ],
            [
                'question' => 'How do you measure SEO success?',
                'answer' => 'We track keyword rankings, organic traffic, domain authority, conversion rates, and ROI using tools like Google Analytics and Search Console.'
            ]
        ];

        $relatedServices = [
            ['name' => 'Digital Marketing', 'route' => 'services.digital-marketing', 'icon' => 'fas fa-bullhorn'],
            ['name' => 'Content Marketing', 'route' => 'services.content', 'icon' => 'fas fa-pen'],
            ['name' => 'Web Development', 'route' => 'services.web-development', 'icon' => 'fas fa-globe'],
        ];

        return view('website.pages.services.seo-services', compact('faqs', 'relatedServices'));
    }

    public function socialMedia()
    {
        $faqs = [
            [
                'question' => 'Which social media platforms do you manage?',
                'answer' => 'We manage all major platforms including Facebook, Instagram, LinkedIn, Twitter, YouTube, Pinterest, and TikTok based on your target audience.'
            ],
            [
                'question' => 'Do you create content for social media?',
                'answer' => 'Yes, we create complete social media content including graphics, videos, reels, stories, and written posts tailored to each platform.'
            ],
            [
                'question' => 'How often will you post on my accounts?',
                'answer' => 'Posting frequency depends on your package. Typically, we recommend 3-5 posts per week for optimal engagement, plus stories and reels.'
            ],
            [
                'question' => 'Do you handle paid social media advertising?',
                'answer' => 'Yes, we create and manage paid campaigns on Facebook, Instagram, LinkedIn, and other platforms with detailed targeting and optimization.'
            ],
            [
                'question' => 'How do you measure social media success?',
                'answer' => 'We track engagement rates, follower growth, reach, website traffic, leads generated, and ROI from social media activities.'
            ]
        ];

        $relatedServices = [
            ['name' => 'Content Marketing', 'route' => 'services.content', 'icon' => 'fas fa-pen'],
            ['name' => 'Digital Marketing', 'route' => 'services.digital-marketing', 'icon' => 'fas fa-bullhorn'],
            ['name' => 'Video Production', 'route' => 'services.video', 'icon' => 'fas fa-video'],
        ];

        return view('website.pages.services.social-media', compact('faqs', 'relatedServices'));
    }

    public function contentMarketing()
    {
        $faqs = [
            [
                'question' => 'What types of content do you create?',
                'answer' => 'We create blog posts, articles, whitepapers, case studies, infographics, videos, podcasts, social media content, and email newsletters.'
            ],
            [
                'question' => 'How do you ensure content is SEO-friendly?',
                'answer' => 'All content is optimized with targeted keywords, proper heading structure, meta descriptions, and internal linking following SEO best practices.'
            ],
            [
                'question' => 'Do you provide content strategy?',
                'answer' => 'Yes, we develop comprehensive content strategies including audience research, content calendars, topic clusters, and distribution plans.'
            ],
            [
                'question' => 'How often should I publish new content?',
                'answer' => 'Consistency is key. We recommend publishing 2-4 blog posts per month minimum, with regular social media updates and email newsletters.'
            ],
            [
                'question' => 'Can you write for technical industries?',
                'answer' => 'Yes, our team includes specialized writers for technology, healthcare, finance, legal, and other technical industries.'
            ]
        ];

        $relatedServices = [
            ['name' => 'SEO Services', 'route' => 'services.seo', 'icon' => 'fas fa-search'],
            ['name' => 'Social Media Marketing', 'route' => 'services.social-media', 'icon' => 'fab fa-facebook'],
            ['name' => 'Branding Services', 'route' => 'services.branding', 'icon' => 'fas fa-palette'],
        ];

        return view('website.pages.services.content-marketing', compact('faqs', 'relatedServices'));
    }

    public function cloudSolutions()
    {
        $faqs = [
            [
                'question' => 'Which cloud platforms do you work with?',
                'answer' => 'We work with all major cloud providers including AWS, Microsoft Azure, Google Cloud Platform, and DigitalOcean.'
            ],
            [
                'question' => 'Can you migrate our existing infrastructure to cloud?',
                'answer' => 'Yes, we provide complete cloud migration services with minimal downtime, including assessment, planning, migration, and optimization.'
            ],
            [
                'question' => 'How do you ensure cloud security?',
                'answer' => 'We implement comprehensive security measures including encryption, access controls, monitoring, backup strategies, and compliance with industry standards.'
            ],
            [
                'question' => 'Will cloud solutions reduce our IT costs?',
                'answer' => 'In most cases, yes. Cloud solutions eliminate hardware costs, reduce maintenance, and allow you to pay only for resources used.'
            ],
            [
                'question' => 'Do you provide ongoing cloud management?',
                'answer' => 'Yes, we offer managed cloud services including monitoring, optimization, security updates, and 24/7 support.'
            ]
        ];

        $relatedServices = [
            ['name' => 'Web Development', 'route' => 'services.web-development', 'icon' => 'fas fa-globe'],
            ['name' => 'Maintenance & Support', 'route' => 'services.maintenance', 'icon' => 'fas fa-tools'],
            ['name' => 'Mobile App Development', 'route' => 'services.mobile-app', 'icon' => 'fas fa-mobile-alt'],
        ];

        return view('website.pages.services.cloud-solutions', compact('faqs', 'relatedServices'));
    }

    public function maintenance()
    {
        $faqs = [
            [
                'question' => 'What does website maintenance include?',
                'answer' => 'Our maintenance includes security updates, plugin updates, performance optimization, backups, uptime monitoring, content updates, and bug fixes.'
            ],
            [
                'question' => 'How quickly do you respond to issues?',
                'answer' => 'Critical issues are addressed within 1-2 hours. Standard requests are handled within 24-48 hours depending on your support plan.'
            ],
            [
                'question' => 'Do you provide 24/7 support?',
                'answer' => 'Yes, our premium plans include 24/7 emergency support. Standard plans include business hours support with emergency escalation options.'
            ],
            [
                'question' => 'Can you maintain websites built by others?',
                'answer' => 'Yes, we can take over maintenance for existing websites. We start with a thorough audit to understand the current state and required improvements.'
            ],
            [
                'question' => 'How often do you backup websites?',
                'answer' => 'We perform daily automatic backups with 30-day retention. Critical sites can have more frequent backups based on requirements.'
            ]
        ];

        $relatedServices = [
            ['name' => 'Web Development', 'route' => 'services.web-development', 'icon' => 'fas fa-globe'],
            ['name' => 'Cloud Solutions', 'route' => 'services.cloud', 'icon' => 'fas fa-cloud'],
            ['name' => 'SEO Services', 'route' => 'services.seo', 'icon' => 'fas fa-search'],
        ];

        return view('website.pages.services.maintenance', compact('faqs', 'relatedServices'));
    }

    public function branding()
    {
        $faqs = [
            [
                'question' => 'What is included in a branding package?',
                'answer' => 'Our branding packages include brand strategy, logo design, color palette, typography, brand guidelines, business cards, letterheads, and social media assets.'
            ],
            [
                'question' => 'How long does the branding process take?',
                'answer' => 'A complete branding project typically takes 4-8 weeks depending on scope. Logo design alone takes 2-3 weeks including revisions.'
            ],
            [
                'question' => 'Can you rebrand an existing business?',
                'answer' => 'Yes, we specialize in both new brand creation and rebranding existing businesses while maintaining brand equity.'
            ],
            [
                'question' => 'How many logo concepts do you provide?',
                'answer' => 'We typically provide 3-5 initial concepts with multiple revision rounds until you\'re completely satisfied.'
            ],
            [
                'question' => 'Do you provide brand guidelines?',
                'answer' => 'Yes, every branding project includes comprehensive brand guidelines covering logo usage, colors, typography, and visual style.'
            ]
        ];

        $relatedServices = [
            ['name' => 'UI/UX Design', 'route' => 'services.ui-ux', 'icon' => 'fas fa-paint-brush'],
            ['name' => 'Graphic Design', 'route' => 'services.graphic-design', 'icon' => 'fas fa-palette'],
            ['name' => 'Digital Marketing', 'route' => 'services.digital-marketing', 'icon' => 'fas fa-bullhorn'],
        ];

        return view('website.pages.services.branding', compact('faqs', 'relatedServices'));
    }

    public function graphicDesign()
    {
        $faqs = [
            [
                'question' => 'What graphic design services do you offer?',
                'answer' => 'We offer logo design, marketing materials, brochures, flyers, social media graphics, infographics, packaging design, and print design.'
            ],
            [
                'question' => 'What file formats will I receive?',
                'answer' => 'You\'ll receive files in all necessary formats including AI, EPS, PDF, PNG, JPG, and SVG for both print and digital use.'
            ],
            [
                'question' => 'How many revisions are included?',
                'answer' => 'Our packages include 2-5 revision rounds depending on the project. We work until you\'re completely satisfied with the design.'
            ],
            [
                'question' => 'Can you work with our brand guidelines?',
                'answer' => 'Absolutely! We ensure all designs adhere to your existing brand guidelines for consistency across all materials.'
            ],
            [
                'question' => 'Do you design for print and digital?',
                'answer' => 'Yes, we create designs optimized for both print (CMYK) and digital (RGB) use, ensuring quality across all mediums.'
            ]
        ];

        $relatedServices = [
            ['name' => 'Branding Services', 'route' => 'services.branding', 'icon' => 'fas fa-palette'],
            ['name' => 'UI/UX Design', 'route' => 'services.ui-ux', 'icon' => 'fas fa-paint-brush'],
            ['name' => 'Social Media Marketing', 'route' => 'services.social-media', 'icon' => 'fab fa-facebook'],
        ];

        return view('website.pages.services.graphic-design', compact('faqs', 'relatedServices'));
    }

    public function videoProduction()
    {
        $faqs = [
            [
                'question' => 'What types of videos do you produce?',
                'answer' => 'We produce explainer videos, product demos, corporate videos, testimonials, social media videos, animated videos, and YouTube content.'
            ],
            [
                'question' => 'Do you provide scripting services?',
                'answer' => 'Yes, we offer complete video production including concept development, scripting, storyboarding, filming, and post-production.'
            ],
            [
                'question' => 'How long does video production take?',
                'answer' => 'Simple videos take 1-2 weeks, while complex productions can take 4-8 weeks depending on scope and requirements.'
            ],
            [
                'question' => 'Do you provide motion graphics?',
                'answer' => 'Yes, we create 2D and 3D motion graphics, animations, and visual effects for all types of video content.'
            ],
            [
                'question' => 'What is your pricing model for videos?',
                'answer' => 'Pricing depends on video length, complexity, and production requirements. We provide detailed quotes after understanding your needs.'
            ]
        ];

        $relatedServices = [
            ['name' => 'Social Media Marketing', 'route' => 'services.social-media', 'icon' => 'fab fa-facebook'],
            ['name' => 'Content Marketing', 'route' => 'services.content', 'icon' => 'fas fa-pen'],
            ['name' => 'Digital Marketing', 'route' => 'services.digital-marketing', 'icon' => 'fas fa-bullhorn'],
        ];

        return view('website.pages.services.video-production', compact('faqs', 'relatedServices'));
    }
}