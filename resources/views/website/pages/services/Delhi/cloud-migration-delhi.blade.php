@extends('website.index')

@section('title', 'Cloud Migration Services in Delhi | Enterprise Cloud Consulting')
@section('meta_title', 'Cloud Migration Company in Delhi | Shiva Tech Digital')
@section('meta_description', 'Leading cloud migration services in Delhi for AWS, Azure and GCP. We deliver secure cloud transition, architecture modernization and cost optimization for enterprises and startups.')
@section('meta_keywords', 'cloud migration delhi, aws migration delhi, azure migration delhi, gcp migration delhi, enterprise cloud consulting delhi')

@section('canonical')
<link rel="canonical" href="https://shivatechdigital.com/services/cloud-migration-delhi">
@endsection

@push('additional-meta')
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<link rel="canonical" href="https://shivatechdigital.com/services/cloud-migration-delhi">
<script type="application/ld+json">
{
	"@@context": "https://schema.org",
	"@@type": "LocalBusiness",
	"name": "Shiva Tech Digital",
	"url": "https://shivatechdigital.com/services/cloud-migration-delhi",
	"telephone": "+91-7007294764",
	"address": {
		"@@type": "PostalAddress",
		"addressLocality": "Delhi",
		"addressRegion": "Delhi",
		"addressCountry": "IN"
	},
	"geo": {
		"@@type": "GeoCoordinates",
		"latitude": 28.6139,
		"longitude": 77.2090
	},
	"areaServed": [
		"Delhi",
		"New Delhi",
		"Delhi NCR"
	]
}
</script>
<script type="application/ld+json">
{
	"@@context": "https://schema.org",
	"@@type": "BreadcrumbList",
	"itemListElement": [
		{
			"@@type": "ListItem",
			"position": 1,
			"name": "Home",
			"item": "https://shivatechdigital.com/"
		},
		{
			"@@type": "ListItem",
			"position": 2,
			"name": "Services",
			"item": "https://shivatechdigital.com/services"
		},
		{
			"@@type": "ListItem",
			"position": 3,
			"name": "Cloud Migration Delhi",
			"item": "https://shivatechdigital.com/services/cloud-migration-delhi"
		}
	]
}
</script>
@endpush

@push('styles')
<style>
:root {
	--cm-bg: #f8fafc;
	--cm-surface: #ffffff;
	--cm-border: #dbe4ef;
	--cm-text: #0f172a;
	--cm-muted: #5f6f86;
	--cm-shadow: 0 14px 36px rgba(15, 23, 42, 0.08);
	--cm-shadow-hover: 0 18px 42px rgba(15, 23, 42, 0.14);
}

.cloud-hero,
.city-cloud-hero,
.gx-cloud-hero,
.gbd-cloud-hero {
	min-height: 82vh;
	display: flex;
	align-items: center;
	position: relative;
	isolation: isolate;
	overflow: hidden;
	border-bottom: 1px solid rgba(255, 255, 255, 0.12);
}

.cloud-hero::before,
.city-cloud-hero::before,
.gx-cloud-hero::before,
.gbd-cloud-hero::before {
	content: "";
	position: absolute;
	inset: -30% -10% auto auto;
	width: 440px;
	height: 440px;
	border-radius: 999px;
	background: radial-gradient(circle, rgba(255, 255, 255, 0.28), rgba(255, 255, 255, 0));
	pointer-events: none;
	z-index: -1;
}

.cloud-badge,
.city-badge,
.gx-badge,
.gbd-badge {
	display: inline-flex;
	align-items: center;
	padding: 8px 16px;
	border-radius: 999px;
	font-size: 0.74rem;
	font-weight: 700;
	letter-spacing: 0.6px;
	text-transform: uppercase;
	margin-bottom: 18px;
	backdrop-filter: blur(4px);
}

.cloud-title,
.city-title,
.gx-title,
.gbd-title {
	font-size: clamp(2rem, 4.8vw, 3.4rem);
	font-weight: 800;
	line-height: 1.08;
	margin-bottom: 16px;
	text-wrap: balance;
}

.cloud-lead,
.city-lead,
.gx-lead,
.gbd-lead {
	max-width: 760px;
	line-height: 1.78;
	font-size: 1.04rem;
}

.cloud-cta,
.city-cta {
	display: flex;
	gap: 12px;
	flex-wrap: wrap;
	margin-top: 26px;
}

.btn-cloud-primary,
.btn-cloud-outline,
.cloud-hero .btn,
.city-cloud-hero .btn,
.gx-cloud-hero .btn,
.gbd-cloud-hero .btn {
	border-radius: 12px;
	transition: transform 0.25s ease, box-shadow 0.25s ease, opacity 0.25s ease;
}

.btn-cloud-primary:hover,
.btn-cloud-outline:hover,
.cloud-hero .btn:hover,
.city-cloud-hero .btn:hover,
.gx-cloud-hero .btn:hover,
.gbd-cloud-hero .btn:hover {
	transform: translateY(-2px);
	box-shadow: 0 12px 24px rgba(15, 23, 42, 0.24);
}

.sec-label,
.city-label,
.gx-label,
.gbd-label {
	display: inline-block;
	padding: 7px 15px;
	border-radius: 999px;
	font-size: 0.74rem;
	font-weight: 700;
	letter-spacing: 0.55px;
	text-transform: uppercase;
	margin-bottom: 11px;
}

.sec-title,
.city-heading,
.gx-heading,
.gbd-heading {
	font-size: clamp(1.72rem, 3.6vw, 2.55rem);
	font-weight: 800;
	color: var(--cm-text);
	margin-bottom: 12px;
	text-wrap: balance;
}

.sec-subtitle,
.city-subheading,
.gx-subheading,
.gbd-subheading {
	color: var(--cm-muted);
	line-height: 1.75;
	max-width: 770px;
}

.cloud-card,
.city-card,
.gx-card,
.gbd-card {
	border: 1px solid var(--cm-border);
	border-radius: 16px;
	background: linear-gradient(180deg, #ffffff, #fbfdff);
	padding: 24px;
	height: 100%;
	box-shadow: var(--cm-shadow);
	transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease;
}

.cloud-card:hover,
.city-card:hover,
.gx-card:hover,
.gbd-card:hover {
	transform: translateY(-6px);
	box-shadow: var(--cm-shadow-hover);
	border-color: #bfd2ea;
}

.cloud-card h4,
.city-card h4,
.gx-card h4,
.gbd-card h4 {
	font-size: 1.05rem;
	font-weight: 700;
	margin: 10px 0 8px;
	color: var(--cm-text);
}

.cloud-card p,
.city-card p,
.gx-card p,
.gbd-card p {
	margin: 0;
	color: var(--cm-muted);
	line-height: 1.67;
}

.process-item,
.timeline-step,
.gx-step,
.gbd-step {
	position: relative;
	border-left: 3px solid #3b82f6;
	padding: 0 0 0 14px;
	margin-bottom: 16px;
}

.process-item::before,
.timeline-step::before,
.gx-step::before,
.gbd-step::before {
	content: "";
	position: absolute;
	width: 8px;
	height: 8px;
	border-radius: 99px;
	background: #2563eb;
	left: -6px;
	top: 8px;
}

.process-item h5,
.timeline-step h5,
.gx-step h5,
.gbd-step h5 {
	font-size: 1rem;
	margin-bottom: 6px;
	color: var(--cm-text);
}

.process-item p,
.timeline-step p,
.gx-step p,
.gbd-step p {
	margin: 0;
	color: var(--cm-muted);
	line-height: 1.7;
}

.area-chip,
.zone-pill,
.gx-pill,
.gbd-pill {
	display: inline-flex;
	align-items: center;
	margin: 5px;
	padding: 9px 14px;
	border-radius: 999px;
	font-size: 0.82rem;
	font-weight: 600;
	transition: all 0.2s ease;
}

.area-chip:hover,
.zone-pill:hover,
.gx-pill:hover,
.gbd-pill:hover {
	transform: translateY(-1px);
	filter: saturate(1.12);
}

.faq-item,
.faq-box,
.gx-faq,
.gbd-faq {
	background: var(--cm-surface);
	border: 1px solid var(--cm-border);
	border-radius: 14px;
	margin-bottom: 12px;
	overflow: hidden;
}

.faq-item summary,
.faq-box summary,
.gx-faq summary,
.gbd-faq summary {
	list-style: none;
	cursor: pointer;
	padding: 16px 18px;
	font-weight: 600;
	color: var(--cm-text);
	position: relative;
	padding-right: 40px;
}

.faq-item summary::-webkit-details-marker,
.faq-box summary::-webkit-details-marker,
.gx-faq summary::-webkit-details-marker,
.gbd-faq summary::-webkit-details-marker {
	display: none;
}

.faq-item summary::after,
.faq-box summary::after,
.gx-faq summary::after,
.gbd-faq summary::after {
	content: "+";
	position: absolute;
	right: 16px;
	top: 50%;
	transform: translateY(-50%);
	color: #2563eb;
	font-size: 1.1rem;
	font-weight: 700;
}

.faq-item[open] summary::after,
.faq-box[open] summary::after,
.gx-faq[open] summary::after,
.gbd-faq[open] summary::after {
	content: "-";
}

.faq-item .ans,
.faq-box .answer,
.gx-faq .answer,
.gbd-faq .answer {
	padding: 0 18px 16px;
	color: var(--cm-muted);
	line-height: 1.72;
}

.kpi-table th,
.kpi-table td {
	padding: 12px;
	border: 1px solid var(--cm-border);
}

.kpi-table th {
	background: #eff6ff;
	color: #1e3a8a;
}

@media (max-width: 992px) {
	.cloud-hero,
	.city-cloud-hero,
	.gx-cloud-hero,
	.gbd-cloud-hero {
		min-height: auto;
		padding-top: 110px;
		padding-bottom: 58px;
	}
}

@media (max-width: 768px) {
	.cloud-title,
	.city-title,
	.gx-title,
	.gbd-title {
		line-height: 1.15;
	}

	.cloud-lead,
	.city-lead,
	.gx-lead,
	.gbd-lead {
		font-size: 0.98rem;
	}

	.cloud-card,
	.city-card,
	.gx-card,
	.gbd-card {
		padding: 20px;
	}
}
</style>
@endpush

@section('website.content')
<section class="py-2" style="background:#f8fafc;">
	<div class="container">
		<ol class="breadcrumb mb-0" style="font-size:.88rem;">
			<li class="breadcrumb-item">
				<a href="{{ route('home') }}">Home</a>
			</li>
			<li class="breadcrumb-item">
				<a href="{{ route('services') }}">Services</a>
			</li>
			<li class="breadcrumb-item active">Cloud Migration Delhi</li>
		</ol>
	</div>
</section>

<section class="city-cloud-hero">
	<div class="container">
		<span class="city-badge">Delhi Enterprise Cloud Team</span>
		<h1 class="city-title">Cloud Migration Services in Delhi</h1>
		<p class="city-lead">
			We help Delhi companies move critical applications to cloud platforms with governance,
			compliance, and predictable cost controls. Our cloud migration approach is built for
			enterprise workloads, startup growth velocity, and long-term operational reliability.
		</p>
		<div class="city-cta">
			<a href="{{ route('contact') }}" class="btn btn-success btn-lg">Book Free Consultation</a>
			<a href="tel:+917007294764" class="btn btn-outline-light btn-lg">+91-7007294764</a>
		</div>
	</div>
</section>

<section class="py-5" style="background:#ffffff;">
	<div class="container">
		<div class="text-center mb-5">
			<span class="city-label">Complete Migration Coverage</span>
			<h2 class="city-heading">Cloud Migration Services for Delhi Businesses</h2>
			<p class="city-subheading mx-auto">
				From lift-and-shift to modern cloud-native architecture, we provide end-to-end migration
				delivery with strong control over downtime, security, and post-migration performance.
			</p>
		</div>
		<div class="row g-4">
			<div class="col-lg-3 col-md-6"><div class="city-card"><h4>Infrastructure Discovery</h4><p>Inventory of servers, environments, security posture, and dependency mapping.</p></div></div>
			<div class="col-lg-3 col-md-6"><div class="city-card"><h4>Migration Roadmap</h4><p>Wave plan with execution checkpoints, cutover calendar, and accountability model.</p></div></div>
			<div class="col-lg-3 col-md-6"><div class="city-card"><h4>Application Modernization</h4><p>Rehost, replatform, and refactor options selected per workload requirements.</p></div></div>
			<div class="col-lg-3 col-md-6"><div class="city-card"><h4>Database Transition</h4><p>Replication-first migration with integrity checks, test runs, and rollback safety.</p></div></div>
			<div class="col-lg-3 col-md-6"><div class="city-card"><h4>Security and Compliance</h4><p>IAM governance, encryption standards, audit trails, and policy hardening.</p></div></div>
			<div class="col-lg-3 col-md-6"><div class="city-card"><h4>DevOps Integration</h4><p>CI/CD pipelines, IaC templates, release automation, and approval gates.</p></div></div>
			<div class="col-lg-3 col-md-6"><div class="city-card"><h4>FinOps Optimization</h4><p>Cost visibility, tagging strategy, rightsizing, and recurring spend optimization.</p></div></div>
			<div class="col-lg-3 col-md-6"><div class="city-card"><h4>Managed Operations</h4><p>Monitoring, incident response, patch cycles, and availability improvement programs.</p></div></div>
		</div>
	</div>
</section>

<section class="py-5" style="background:#f8fafc;">
	<div class="container">
		<div class="row g-4">
			<div class="col-lg-6">
				<span class="city-label">Migration Lifecycle</span>
				<h2 class="city-heading">How We Execute Delhi Cloud Projects</h2>
				<div class="timeline-step"><h5>1. Requirement Discovery</h5><p>Stakeholder workshops to define business goals and migration constraints.</p></div>
				<div class="timeline-step"><h5>2. Current State Assessment</h5><p>Architecture review, server utilization, and dependency matrix preparation.</p></div>
				<div class="timeline-step"><h5>3. Target Design and Sizing</h5><p>Cloud architecture with VPC, IAM, storage, database, and observability planning.</p></div>
				<div class="timeline-step"><h5>4. Pilot Wave Delivery</h5><p>Migration of selected workloads to validate security, latency, and support readiness.</p></div>
				<div class="timeline-step"><h5>5. Production Migration Waves</h5><p>Phased cutover with communication plan, backup checkpoints, and risk tracking.</p></div>
				<div class="timeline-step"><h5>6. Validation and Stabilization</h5><p>Performance tests, security checks, and defect resolution under hypercare mode.</p></div>
				<div class="timeline-step"><h5>7. Handover and Documentation</h5><p>Operational runbooks, architecture docs, and incident response workflow handoff.</p></div>
				<div class="timeline-step"><h5>8. Continuous Optimization</h5><p>Monthly reliability and cloud spend improvements driven by usage analytics.</p></div>
			</div>
			<div class="col-lg-6">
				<span class="city-label">Workload Types</span>
				<h3 class="city-heading">Systems We Commonly Migrate</h3>
				<ul class="text-secondary" style="line-height:1.9;">
					<li>Enterprise web portals and business applications</li>
					<li>High transaction ecommerce and payment workflows</li>
					<li>Customer support and CRM integrated systems</li>
					<li>SQL and NoSQL databases with read-heavy traffic</li>
					<li>Containerized microservices and orchestration clusters</li>
					<li>Batch processing systems and queue-based workers</li>
					<li>Analytics stacks and reporting data pipelines</li>
					<li>Document repositories and media storage systems</li>
					<li>APIs with third party vendor integrations</li>
					<li>Disaster recovery and multi-region failover setups</li>
					<li>Hybrid infrastructure with private connectivity needs</li>
					<li>Legacy systems requiring phased modernization</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="py-5" style="background:#ffffff;">
	<div class="container">
		<div class="text-center mb-5">
			<span class="city-label">Industry Focus</span>
			<h2 class="city-heading">Cloud Migration Expertise in Delhi Sectors</h2>
			<p class="city-subheading mx-auto">Domain-aligned cloud transformation aligned with uptime, compliance, and growth goals.</p>
		</div>
		<div class="row g-4">
			<div class="col-lg-4 col-md-6"><div class="city-card"><h4>Government and Public Services</h4><p>Secure migration approach with policy controls and traceable audit logs.</p></div></div>
			<div class="col-lg-4 col-md-6"><div class="city-card"><h4>Finance and Insurance</h4><p>High-confidence migration for data-sensitive and transaction-critical applications.</p></div></div>
			<div class="col-lg-4 col-md-6"><div class="city-card"><h4>Healthcare</h4><p>Protected health data workflows with backup, encryption, and high availability.</p></div></div>
			<div class="col-lg-4 col-md-6"><div class="city-card"><h4>Retail and Commerce</h4><p>Elastic infrastructure for campaign spikes and omnichannel user demand.</p></div></div>
			<div class="col-lg-4 col-md-6"><div class="city-card"><h4>Education Platforms</h4><p>Scalable video and assessment systems with uptime-focused deployment models.</p></div></div>
			<div class="col-lg-4 col-md-6"><div class="city-card"><h4>SaaS Products</h4><p>Rapid release frameworks and globally scalable architecture for growth-stage teams.</p></div></div>
		</div>
	</div>
</section>

<section class="py-5" style="background:#f8fafc;">
	<div class="container text-center">
		<span class="city-label">Areas We Serve</span>
		<h2 class="city-heading">Cloud Migration Across Delhi</h2>
		<p class="city-subheading mx-auto mb-4">Serving cloud migration projects across Delhi business and technology corridors.</p>
		<span class="zone-pill">Connaught Place</span>
		<span class="zone-pill">Nehru Place</span>
		<span class="zone-pill">South Delhi</span>
		<span class="zone-pill">East Delhi</span>
		<span class="zone-pill">Dwarka</span>
		<span class="zone-pill">Saket</span>
		<span class="zone-pill">Rohini</span>
		<span class="zone-pill">Aerocity</span>
	</div>
</section>

<section class="py-5" style="background:#ffffff;">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-9">
				<div class="text-center mb-4">
					<span class="city-label">FAQs</span>
					<h2 class="city-heading">Cloud Migration FAQs - Delhi</h2>
				</div>
				<details class="faq-box"><summary>How much does cloud migration cost in Delhi?</summary><div class="answer">Cost depends on workload size, architecture complexity, compliance needs, and migration strategy. We provide transparent estimates after discovery.</div></details>
				<details class="faq-box"><summary>Can you migrate legacy enterprise applications?</summary><div class="answer">Yes. We support rehost, replatform, and gradual refactor methods for legacy systems.</div></details>
				<details class="faq-box"><summary>Do you support AWS, Azure, and Google Cloud?</summary><div class="answer">Yes, we provide provider-neutral architecture recommendations based on your use case.</div></details>
				<details class="faq-box"><summary>Do you provide migration with compliance alignment?</summary><div class="answer">Yes, we integrate audit, access controls, logging, and backup strategy into delivery.</div></details>
				<details class="faq-box"><summary>What if we need zero downtime migration?</summary><div class="answer">We design phased cutover and replication-led plans to keep user-facing impact minimal.</div></details>
				<details class="faq-box"><summary>Do you offer post migration support?</summary><div class="answer">Yes, we provide managed operations, reliability tuning, and cost optimization after go-live.</div></details>
			</div>
		</div>
	</div>
</section>

<section class="py-5" style="background:#f8fafc;">
	<div class="container text-center">
		<h2 class="city-heading">Related Location Pages</h2>
		<div class="d-flex flex-wrap justify-content-center gap-2 mt-3">
			<a href="{{ route('services.cloud-migration-noida') }}" class="badge rounded-pill text-bg-light border p-2">Cloud Migration Noida</a>
			<a href="{{ route('services.cloud-migration-gurgaon') }}" class="badge rounded-pill text-bg-light border p-2">Cloud Migration Gurgaon</a>
			<a href="{{ route('services.cloud-migration-ghaziabad') }}" class="badge rounded-pill text-bg-light border p-2">Cloud Migration Ghaziabad</a>
			<a href="{{ route('services.cloud') }}" class="badge rounded-pill text-bg-light border p-2">Cloud Solutions</a>
		</div>
	</div>
</section>
@endsection
