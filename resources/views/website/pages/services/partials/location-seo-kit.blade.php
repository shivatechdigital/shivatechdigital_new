@php
    $mode = $mode ?? 'content';
    $serviceKey = $serviceKey ?? null;
    $cityKey = $cityKey ?? null;

    $serviceConfig = [
        'web' => [
            'label' => 'Web Development',
            'route' => 'web-development',
            'hub_title' => 'Web Development',
            'hub_text' => 'SEO-ready websites, ecommerce builds, and conversion-focused UI UX for local business growth.',
            'intent_copy' => 'These FAQs target commercial search intent around best, affordable, custom, SEO-friendly, and modern website development.',
        ],
        'mobile' => [
            'label' => 'Mobile App Development',
            'route' => 'mobile-app',
            'hub_title' => 'Mobile App Development',
            'hub_text' => 'Android iOS app design and scalable backend development for product-driven teams.',
            'intent_copy' => 'These FAQs target intent around best, affordable, scalable, user-friendly, and launch-ready app development.',
        ],
        'cloud' => [
            'label' => 'Cloud Migration',
            'route' => 'cloud-migration',
            'hub_title' => 'Cloud Migration',
            'hub_text' => 'AWS Azure GCP migration, modernization, and cloud optimization support for reliability and scale.',
            'intent_copy' => 'These FAQs target intent around best, affordable, secure, low-risk, and scalable cloud migration services.',
        ],
    ];

    $cityConfig = [
        'noida' => [
            'label' => 'Noida',
            'market' => 'startup and technology corridors around Sector 62, Sector 63, and Noida Expressway',
            'audience' => 'startups, SaaS teams, and growth-focused businesses',
            'priority' => 'speed-to-market, SEO visibility, and scalable delivery',
        ],
        'delhi' => [
            'label' => 'Delhi',
            'market' => 'enterprise, public-sector, and multi-stakeholder business environments across Delhi',
            'audience' => 'enterprises, funded startups, and service-driven organizations',
            'priority' => 'governance, reliability, and structured execution',
        ],
        'gurgaon' => [
            'label' => 'Gurgaon',
            'market' => 'product, corporate, and technology teams in Cyber City, Golf Course Road, and surrounding hubs',
            'audience' => 'product companies, funded startups, and enterprise teams',
            'priority' => 'modern product experience, performance, and growth readiness',
        ],
        'ghaziabad' => [
            'label' => 'Ghaziabad',
            'market' => 'local brands, expanding SMEs, and service businesses across fast-growing commercial zones',
            'audience' => 'SMEs, local brands, and operationally focused business owners',
            'priority' => 'cost control, dependable execution, and long-term support',
        ],
    ];

    if (! isset($serviceConfig[$serviceKey], $cityConfig[$cityKey])) {
        return;
    }

    $service = $serviceConfig[$serviceKey];
    $city = $cityConfig[$cityKey];
    $cityLabel = $city['label'];

    $serviceLinks = [
        'web' => [
            'route' => 'services.web-development-' . $cityKey,
            'title' => 'Web Development in ' . $cityLabel,
            'text' => 'SEO-ready websites, ecommerce builds, and conversion-focused UI UX for local business growth.',
        ],
        'mobile' => [
            'route' => 'services.mobile-app-' . $cityKey,
            'title' => 'Mobile App Development in ' . $cityLabel,
            'text' => 'Android iOS app design and scalable backend development for product-driven teams.',
        ],
        'cloud' => [
            'route' => 'services.cloud-migration-' . $cityKey,
            'title' => 'Cloud Migration in ' . $cityLabel,
            'text' => 'AWS Azure GCP migration, modernization, and cloud optimization support for reliability and scale.',
        ],
    ];

    $proofSnippets = [
        'web' => [
            'headline' => 'Mini Case Study Snapshot',
            'title' => $cityLabel . ' Website Growth Example',
            'text' => 'A typical ' . strtolower($cityLabel) . ' website project starts with a conversion-first structure, intent-focused service pages, and a lightweight build process so the business can improve discoverability and lead quality without unnecessary delays.',
            'result' => 'Outcome focus: faster loading pages, stronger service visibility, and better enquiry flow.',
            'quote' => 'The website felt more premium, easier to navigate, and better aligned with the kind of customers we wanted to attract.',
            'quote_role' => 'Business stakeholder, ' . $cityLabel,
        ],
        'mobile' => [
            'headline' => 'Product Launch Snapshot',
            'title' => $cityLabel . ' App MVP Example',
            'text' => 'For mobile app projects in ' . $cityLabel . ', we usually prioritize MVP scope, onboarding clarity, backend stability, and analytics readiness so businesses can validate product demand before adding heavier feature layers.',
            'result' => 'Outcome focus: cleaner launches, stronger retention paths, and easier feature scaling.',
            'quote' => 'We were able to launch with the right core features first and expand after real user feedback instead of guessing everything upfront.',
            'quote_role' => 'Product team, ' . $cityLabel,
        ],
        'cloud' => [
            'headline' => 'Migration Planning Snapshot',
            'title' => $cityLabel . ' Cloud Transition Example',
            'text' => 'Cloud migration work in ' . $cityLabel . ' is usually planned around audit, migration waves, rollback safety, and post-migration governance so operational risk stays controlled during infrastructure change.',
            'result' => 'Outcome focus: safer rollout, better cost visibility, and stronger operational resilience.',
            'quote' => 'The migration roadmap was practical for our internal team and gave us more confidence about cost, risk, and long-term manageability.',
            'quote_role' => 'Technology lead, ' . $cityLabel,
        ],
    ];

    $proof = $proofSnippets[$serviceKey];

    $ctaConfig = [
        'web' => [
            'eyebrow' => 'Project CTA',
            'title' => 'Need a Website That Converts in ' . $cityLabel . '?',
            'text' => 'If your team needs a business website, ecommerce store, or custom web platform in ' . $cityLabel . ', we can turn the scope into a practical launch roadmap with design, development, and SEO alignment from the start.',
            'primary' => 'Talk About Your Website Project',
            'secondary' => 'Call Our Web Team',
        ],
        'mobile' => [
            'eyebrow' => 'Launch CTA',
            'title' => 'Planning a Mobile App Launch in ' . $cityLabel . '?',
            'text' => 'If you want to build an MVP, customer app, internal workflow app, or scalable mobile product in ' . $cityLabel . ', we can help define features, timeline, release plan, and post-launch growth steps.',
            'primary' => 'Discuss Your App Idea',
            'secondary' => 'Speak to App Experts',
        ],
        'cloud' => [
            'eyebrow' => 'Migration CTA',
            'title' => 'Need a Safer Cloud Migration Plan in ' . $cityLabel . '?',
            'text' => 'If your organization is planning server migration, infrastructure modernization, or a phased move to AWS, Azure, or GCP in ' . $cityLabel . ', we can help map risk, sequence, and operational readiness.',
            'primary' => 'Request Cloud Migration Plan',
            'secondary' => 'Talk to Cloud Specialists',
        ],
    ];

    $cta = $ctaConfig[$serviceKey];

    if ($serviceKey === 'web') {
        $faqs = [
            [
                'q' => 'What makes your web development service in ' . $cityLabel . ' a strong fit for ' . $city['audience'] . '?',
                'a' => 'Our web projects are shaped around the buying behavior and competition level in ' . $city['market'] . ', with a clear focus on ' . $city['priority'] . '.',
            ],
            [
                'q' => 'Do you offer affordable website development packages in ' . $cityLabel . ' without reducing quality?',
                'a' => 'Yes. We structure scope in phases, prioritize high-impact pages first, and recommend practical technology choices so businesses in ' . $cityLabel . ' can launch faster without overspending.',
            ],
            [
                'q' => 'Can you design an attractive and modern website for businesses in ' . $cityLabel . '?',
                'a' => 'Yes. We combine strong visual design, conversion-focused page structure, and mobile-first UX so the website feels modern while still supporting leads and search visibility.',
            ],
            [
                'q' => 'Will the website be SEO-friendly from the beginning?',
                'a' => 'Yes. We plan the build around page speed, crawlable structure, metadata, internal linking, mobile usability, and intent-focused content so the website is ready for long-term SEO growth.',
            ],
            [
                'q' => 'Can you build custom business websites and ecommerce platforms in ' . $cityLabel . '?',
                'a' => 'Yes. We build corporate websites, lead generation websites, ecommerce stores, landing pages, and custom portal experiences based on your sales model and audience.',
            ],
            [
                'q' => 'How long does a typical website development project take?',
                'a' => 'Timeline depends on the number of templates, custom features, approvals, and integrations. Smaller websites move faster, while complex builds are delivered in milestone-based phases.',
            ],
            [
                'q' => 'Do you improve old websites or only build new ones?',
                'a' => 'We do both. If an existing site in ' . $cityLabel . ' has strong content or rankings, we can redesign, optimize, and rebuild it without losing valuable search equity.',
            ],
            [
                'q' => 'Do you provide support and maintenance after the site goes live?',
                'a' => 'Yes. We provide updates, bug fixes, speed improvements, content support, uptime monitoring, and iterative optimization after launch.',
            ],
            [
                'q' => 'Can the website scale as our business grows?',
                'a' => 'Yes. We plan architecture, CMS flexibility, integrations, and performance so your website can support additional pages, traffic, campaigns, and product expansion over time.',
            ],
        ];
    } elseif ($serviceKey === 'mobile') {
        $faqs = [
            [
                'q' => 'Why do businesses in ' . $cityLabel . ' choose your mobile app development team?',
                'a' => 'We align product planning with the needs of ' . $city['audience'] . ' and focus on intuitive UX, stable releases, and scalable backend systems that support app growth after launch.',
            ],
            [
                'q' => 'Do you offer affordable app development packages in ' . $cityLabel . '?',
                'a' => 'Yes. We structure MVP, growth, and full-scale plans so businesses can control cost, validate demand early, and expand features in a disciplined way.',
            ],
            [
                'q' => 'Can you build attractive, easy-to-use mobile apps for customers in ' . $cityLabel . '?',
                'a' => 'Yes. We design modern app flows, clean UI systems, and friction-free navigation so the final product feels polished and easy to adopt.',
            ],
            [
                'q' => 'Do you build Android and iOS apps along with backend systems?',
                'a' => 'Yes. We handle frontend app interfaces, admin panels, APIs, notifications, analytics, and scalable backend architecture as part of complete delivery.',
            ],
            [
                'q' => 'How do you keep app performance and user experience balanced?',
                'a' => 'We prioritize fast loading, predictable flows, lightweight UI patterns, and test-driven refinement so the app remains smooth even as feature depth grows.',
            ],
            [
                'q' => 'How long does mobile app development usually take?',
                'a' => 'Project duration depends on the number of platforms, user roles, custom integrations, and approval cycles. We usually break execution into discovery, build, test, and launch phases.',
            ],
            [
                'q' => 'Can you launch an MVP first and scale later?',
                'a' => 'Yes. For many ' . $cityLabel . ' businesses, launching an MVP first is the smartest route because it reduces initial risk and helps validate demand before deeper investment.',
            ],
            [
                'q' => 'Do you support app maintenance and version updates after launch?',
                'a' => 'Yes. We provide bug fixes, store updates, analytics review, UI improvements, and feature rollout planning after release.',
            ],
            [
                'q' => 'Can your app architecture handle future growth and integrations?',
                'a' => 'Yes. We plan for authentication, API scaling, notifications, reporting, and third-party connections so the product can grow without a full rebuild.',
            ],
        ];
    } else {
        $faqs = [
            [
                'q' => 'Why is your cloud migration service relevant for businesses in ' . $cityLabel . '?',
                'a' => 'We plan migration around the needs of ' . $city['audience'] . ', with a strong focus on ' . $city['priority'] . ', business continuity, and long-term cloud governance.',
            ],
            [
                'q' => 'Do you offer affordable cloud migration planning in ' . $cityLabel . '?',
                'a' => 'Yes. We reduce unnecessary spend by phasing migrations, right-sizing workloads, choosing appropriate managed services, and avoiding over-engineered infrastructure.',
            ],
            [
                'q' => 'Can you migrate to cloud without major business disruption?',
                'a' => 'Yes. We use audit-led planning, staged migration waves, backup strategy, rollback readiness, and validation checkpoints to reduce operational risk.',
            ],
            [
                'q' => 'Do you support AWS, Azure, and Google Cloud migrations?',
                'a' => 'Yes. We support AWS, Azure, and GCP based on your workload profile, compliance expectations, internal skill set, and future scaling needs.',
            ],
            [
                'q' => 'Can you migrate applications, databases, and file systems together?',
                'a' => 'Yes. We handle application migration, database movement, backup planning, storage transfer, network setup, and access control alignment as one coordinated project.',
            ],
            [
                'q' => 'How long does a cloud migration project usually take?',
                'a' => 'The timeline depends on application complexity, data size, testing needs, and downtime tolerance. We normally break work into discovery, pilot, migration waves, and stabilization.',
            ],
            [
                'q' => 'Will you also optimize cloud cost after migration?',
                'a' => 'Yes. Post-migration optimization is a core part of our process, including rightsizing, usage review, storage tuning, and governance controls.',
            ],
            [
                'q' => 'Do you provide cloud monitoring and support after go-live?',
                'a' => 'Yes. We provide monitoring setup, alerting, incident support, maintenance guidance, and operational improvements after migration is complete.',
            ],
            [
                'q' => 'Can the migrated environment support future scale and security requirements?',
                'a' => 'Yes. We design cloud environments around resilience, observability, access control, and scalable infrastructure so future growth does not require another major rework.',
            ],
        ];
    }

    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array_map(function ($faq) {
            return [
                '@type' => 'Question',
                'name' => $faq['q'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['a'],
                ],
            ];
        }, $faqs),
    ];
@endphp

@if ($mode === 'schema')
<!-- SEO-FAQ-SCHEMA-START -->
<script type="application/ld+json">{!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>
<!-- SEO-FAQ-SCHEMA-END -->
@else
<!-- SEO-FAQ-BLOCK-START -->
<section class="py-5" style="background:linear-gradient(180deg,#f8fafc 0%,#ffffff 100%); border-top:1px solid #e2e8f0;">
  <div class="container">
    <div class="text-center mb-4">
      <span style="display:inline-block; padding:6px 14px; border-radius:999px; background:#dbeafe; color:#1e3a8a; font-size:.75rem; font-weight:700; letter-spacing:.4px; text-transform:uppercase;">Intent FAQs</span>
      <h2 style="font-weight:800; color:#0f172a; margin-top:12px;">{{ $service['label'] }} FAQs - {{ $cityLabel }}</h2>
      <p class="text-secondary mx-auto" style="max-width:760px; line-height:1.75;">{{ $service['intent_copy'] }} These answers are tailored for {{ $city['market'] }}.</p>
    </div>
    <div class="mx-auto" style="max-width:920px;">
      @foreach ($faqs as $faq)
      <details class="mb-3" style="border:1px solid #e2e8f0; border-radius:12px; background:#ffffff; box-shadow:0 6px 16px rgba(15,23,42,.05);">
        <summary style="padding:14px 16px; font-weight:600; cursor:pointer; color:#0f172a;">{{ $faq['q'] }}</summary>
        <div style="padding:0 16px 14px; color:#64748b; line-height:1.72;">{{ $faq['a'] }}</div>
      </details>
      @endforeach
    </div>
  </div>
</section>

<section class="py-5" style="background:#fff7ed; border-top:1px solid #fed7aa; border-bottom:1px solid #ffedd5;">
    <div class="container">
        <div class="text-center mb-4">
            <span style="display:inline-block; padding:6px 14px; border-radius:999px; background:#ffedd5; color:#9a3412; font-size:.75rem; font-weight:700; letter-spacing:.4px; text-transform:uppercase;">Local Proof</span>
            <h2 style="font-weight:800; color:#7c2d12; margin-top:12px;">{{ $service['label'] }} Trust Signals in {{ $cityLabel }}</h2>
            <p class="text-secondary mx-auto" style="max-width:760px; line-height:1.75;">This section gives the page a more grounded local-commercial feel so decision makers in {{ $cityLabel }} do not read it like a generic template.</p>
        </div>

        <div class="row g-4 align-items-stretch">
            <div class="col-lg-7">
                <div class="h-100 p-4" style="background:#ffffff; border:1px solid #fdba74; border-radius:16px; box-shadow:0 10px 24px rgba(124,45,18,.08);">
                    <span style="display:inline-block; padding:5px 12px; border-radius:999px; background:#fff7ed; color:#c2410c; font-size:.72rem; font-weight:700; text-transform:uppercase; letter-spacing:.4px;">{{ $proof['headline'] }}</span>
                    <h3 style="font-size:1.28rem; font-weight:800; color:#7c2d12; margin:16px 0 12px;">{{ $proof['title'] }}</h3>
                    <p class="text-secondary mb-3" style="line-height:1.78;">{{ $proof['text'] }}</p>
                    <div style="padding:14px 16px; background:#fffaf5; border:1px dashed #fdba74; border-radius:12px; color:#9a3412; font-weight:600;">{{ $proof['result'] }}</div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="h-100 p-4" style="background:linear-gradient(180deg,#fffaf5 0%,#ffffff 100%); border:1px solid #fed7aa; border-radius:16px; box-shadow:0 10px 24px rgba(124,45,18,.08); display:flex; flex-direction:column; justify-content:center;">
                    <div style="font-size:2rem; line-height:1; color:#fb923c; margin-bottom:14px;">"</div>
                    <p style="font-size:1rem; line-height:1.8; color:#7c2d12; font-weight:600; margin-bottom:16px;">{{ $proof['quote'] }}</p>
                    <div style="font-size:.84rem; color:#9a3412; text-transform:uppercase; letter-spacing:.4px;">{{ $proof['quote_role'] }}</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background:#ffffff; border-top:1px solid #eef2f7;">
  <div class="container">
    <div class="text-center mb-4">
      <span style="display:inline-block; padding:6px 14px; border-radius:999px; background:#ecfeff; color:#0f766e; font-size:.75rem; font-weight:700; letter-spacing:.4px; text-transform:uppercase;">Internal Link Map</span>
      <h2 style="font-weight:800; color:#0f172a; margin-top:12px;">{{ $cityLabel }} Service Hub</h2>
      <p class="text-secondary mx-auto" style="max-width:760px; line-height:1.75;">Users exploring {{ strtolower($service['label']) }} in {{ $cityLabel }} often compare related digital services before contacting. These links strengthen topical depth and improve internal discovery.</p>
    </div>

    <div class="row g-4">
      @foreach ($serviceLinks as $link)
      <div class="col-lg-4 col-md-6">
        <a href="{{ route($link['route']) }}" style="text-decoration:none;">
          <div class="h-100 p-4" style="border:1px solid #dbe4ef; border-radius:14px; background:#ffffff; box-shadow:0 8px 20px rgba(15,23,42,.06);">
            <h3 style="font-size:1.05rem; font-weight:700; color:#0f172a;">{{ $link['title'] }}</h3>
            <p class="mb-0 text-secondary">{{ $link['text'] }}</p>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="py-5" style="background:linear-gradient(135deg,#0f172a 0%,#1e293b 100%); border-top:1px solid rgba(255,255,255,.08);">
    <div class="container text-center">
        <span style="display:inline-block; padding:6px 14px; border-radius:999px; background:rgba(255,255,255,.08); color:#bfdbfe; font-size:.75rem; font-weight:700; letter-spacing:.4px; text-transform:uppercase;">{{ $cta['eyebrow'] }}</span>
        <h2 style="font-weight:800; color:#ffffff; margin-top:14px; margin-bottom:14px;">{{ $cta['title'] }}</h2>
        <p class="mx-auto" style="max-width:760px; color:rgba(255,255,255,.78); line-height:1.78;">{{ $cta['text'] }}</p>
        <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
            <a href="{{ route('contact') }}" style="display:inline-flex; align-items:center; justify-content:center; padding:13px 24px; border-radius:12px; text-decoration:none; font-weight:700; color:#0f172a; background:#f8fafc;">{{ $cta['primary'] }}</a>
            <a href="tel:+917007294764" style="display:inline-flex; align-items:center; justify-content:center; padding:13px 24px; border-radius:12px; text-decoration:none; font-weight:700; color:#ffffff; border:1px solid rgba(255,255,255,.22);">{{ $cta['secondary'] }}</a>
        </div>
    </div>
</section>
<!-- SEO-FAQ-BLOCK-END -->
@endif