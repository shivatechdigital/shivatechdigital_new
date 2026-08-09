@extends('website.index')

@section('title', 'Cloud Migration Services in Noida | AWS Azure GCP Experts')
@section('meta_title', 'Cloud Migration Company in Noida | Shiva Tech Digital')
@section('meta_description', 'Top cloud migration company in Noida for AWS, Azure and GCP. Zero-downtime migration, secure architecture, DR setup and cloud cost optimization for startups and enterprises.')
@section('meta_keywords', 'cloud migration noida, aws migration noida, azure migration noida, gcp migration noida, cloud consulting noida, server migration noida, cloud architect noida')

@section('canonical')
<link rel="canonical" href="https://shivatechdigital.com/services/cloud-migration-noida">
@endsection

@push('additional-meta')
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<link rel="canonical" href="https://shivatechdigital.com/services/cloud-migration-noida">
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "LocalBusiness",
  "name": "Shiva Tech Digital",
  "url": "https://shivatechdigital.com/services/cloud-migration-noida",
  "telephone": "+91-7007294764",
  "address": {
    "@@type": "PostalAddress",
    "addressLocality": "Noida",
    "addressRegion": "Uttar Pradesh",
    "addressCountry": "IN"
  },
  "geo": {
    "@@type": "GeoCoordinates",
    "latitude": 28.6139,
    "longitude": 77.3910
  },
  "areaServed": [
    "Noida",
    "Greater Noida",
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
      "name": "Cloud Migration Noida",
      "item": "https://shivatechdigital.com/services/cloud-migration-noida"
    }
  ]
}
</script>
@endpush

@push('styles')
<style>
.cloud-hero {
  min-height: 84vh;
  display: flex;
  align-items: center;
  background: linear-gradient(135deg, rgba(15,23,42,0.92), rgba(29,78,216,0.78)), url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=1600&q=85') center/cover no-repeat;
  padding: 115px 0 65px;
}

.cloud-badge {
  display:inline-block;
  padding:7px 16px;
  border-radius:999px;
  background:rgba(59,130,246,.2);
  border:1px solid rgba(147,197,253,.45);
  color:#bfdbfe;
  font-size:.75rem;
  font-weight:700;
  letter-spacing:.5px;
  text-transform:uppercase;
  margin-bottom:16px;
}

.cloud-title {
  color:#fff;
  font-size:clamp(2rem,4.8vw,3.4rem);
  font-weight:800;
  line-height:1.12;
  margin-bottom:14px;
}

.cloud-lead {
  color:rgba(255,255,255,.84);
  max-width:700px;
  line-height:1.75;
}

.cloud-cta {
  display:flex;
  gap:12px;
  flex-wrap:wrap;
  margin-top:24px;
}

.btn-cloud-primary {
  display:inline-flex;
  align-items:center;
  gap:8px;
  padding:13px 24px;
  border-radius:11px;
  text-decoration:none;
  color:#fff;
  background:linear-gradient(135deg,#2563eb,#1d4ed8);
  font-weight:700;
}

.btn-cloud-outline {
  display:inline-flex;
  align-items:center;
  gap:8px;
  padding:12px 22px;
  border-radius:11px;
  text-decoration:none;
  color:#fff;
  border:1px solid rgba(255,255,255,.4);
}

.sec-label {
  display:inline-block;
  padding:6px 15px;
  border-radius:999px;
  background:#eff6ff;
  color:#1d4ed8;
  font-size:.76rem;
  font-weight:700;
  text-transform:uppercase;
  letter-spacing:.5px;
  margin-bottom:10px;
}

.sec-title {
  font-size:clamp(1.7rem,3.6vw,2.5rem);
  font-weight:800;
  color:#0f172a;
  margin-bottom:12px;
}

.sec-subtitle {
  color:#64748b;
  line-height:1.7;
  max-width:760px;
}

.cloud-card {
  border:1px solid #e2e8f0;
  border-radius:14px;
  background:#fff;
  padding:24px;
  height:100%;
  box-shadow:0 4px 16px rgba(15,23,42,.05);
}

.cloud-card h4 {
  font-size:1.02rem;
  font-weight:700;
  margin:10px 0 8px;
  color:#0f172a;
}

.cloud-card p {
  margin:0;
  color:#64748b;
  font-size:.9rem;
}

.process-item {
  border-left:3px solid #2563eb;
  padding:0 0 0 14px;
  margin-bottom:16px;
}

.process-item h5 {
  font-size:1rem;
  margin-bottom:6px;
  color:#0f172a;
}

.process-item p {
  margin:0;
  color:#64748b;
  line-height:1.65;
}

.area-chip {
  display:inline-flex;
  align-items:center;
  gap:6px;
  margin:5px;
  padding:8px 14px;
  border-radius:999px;
  border:1px solid #bfdbfe;
  background:#eff6ff;
  color:#1d4ed8;
  font-size:.82rem;
  font-weight:600;
}

.faq-item {
  background:#fff;
  border:1px solid #e2e8f0;
  border-radius:12px;
  margin-bottom:12px;
  overflow:hidden;
}

.faq-item summary {
  list-style:none;
  cursor:pointer;
  padding:16px 18px;
  font-weight:600;
  color:#0f172a;
}

.faq-item summary::-webkit-details-marker {
  display:none;
}

.faq-item .ans {
  padding:0 18px 16px;
  color:#64748b;
  line-height:1.7;
}

.kpi-table th,
.kpi-table td {
  padding:12px;
  border:1px solid #e2e8f0;
}

.kpi-table th {
  background:#eff6ff;
  color:#1e3a8a;
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
      <li class="breadcrumb-item active">Cloud Migration Noida</li>
    </ol>
  </div>
</section>

<section class="cloud-hero">
  <div class="container">
    <span class="cloud-badge">Noida Cloud Experts</span>
    <h1 class="cloud-title">Cloud Migration Services in Noida</h1>
    <p class="cloud-lead">
      Shiva Tech Digital helps Noida startups and enterprises migrate workloads from legacy servers
      to AWS, Azure, and Google Cloud. We focus on zero-downtime migration, stronger security,
      better release velocity, and measurable cloud cost reduction.
    </p>
    <div class="cloud-cta">
      <a href="{{ route('contact') }}" class="btn-cloud-primary">
        <i class="fas fa-rocket"></i>
        Get Free Migration Plan
      </a>
      <a href="tel:+917007294764" class="btn-cloud-outline">
        <i class="fas fa-phone"></i>
        +91-7007294764
      </a>
    </div>
  </div>
</section>

<section class="py-5" style="background:#ffffff;">
  <div class="container">
    <div class="text-center mb-5">
      <span class="sec-label">Why Teams Choose Us</span>
      <h2 class="sec-title">End-to-End Cloud Migration for Noida Businesses</h2>
      <p class="sec-subtitle mx-auto">
        From migration discovery to post-go-live optimization, our team executes reliable cloud
        transformation projects with governance, automation, and performance goals aligned to business outcomes.
      </p>
    </div>
    <div class="row g-4">
      <div class="col-lg-3 col-md-6">
        <div class="cloud-card">
          <i class="fas fa-search"></i>
          <h4>Cloud Readiness Assessment</h4>
          <p>Complete audit of servers, applications, integrations, data flow, and release dependencies.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="cloud-card">
          <i class="fas fa-project-diagram"></i>
          <h4>Migration Blueprint</h4>
          <p>Phased wave plan with risk scoring, go-live calendar, ownership matrix, and communication model.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="cloud-card">
          <i class="fas fa-exchange-alt"></i>
          <h4>Application Migration</h4>
          <p>Rehost, replatform, or refactor execution for web apps, APIs, queues, and backend services.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="cloud-card">
          <i class="fas fa-database"></i>
          <h4>Database Migration</h4>
          <p>Data replication, consistency validation, failback strategy, and transactional cutover planning.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="cloud-card">
          <i class="fas fa-shield-alt"></i>
          <h4>Security Hardening</h4>
          <p>IAM roles, least privilege controls, network segmentation, and encryption policy implementation.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="cloud-card">
          <i class="fas fa-code-branch"></i>
          <h4>DevOps Automation</h4>
          <p>CI/CD pipelines, infrastructure as code, rollback automation, and release quality gates.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="cloud-card">
          <i class="fas fa-chart-line"></i>
          <h4>Cost Optimization</h4>
          <p>Right sizing, storage tiering, reserved plans, and usage governance for lower monthly spend.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="cloud-card">
          <i class="fas fa-headset"></i>
          <h4>Managed Support</h4>
          <p>Ongoing monitoring, SLA support, incident management, and reliability tuning after migration.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5" style="background:#f8fafc;">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <span class="sec-label">Migration Process</span>
        <h2 class="sec-title">Our 8-Step Cloud Migration Workflow</h2>
        <div class="process-item">
          <h5>1. Discovery Workshop</h5>
          <p>Business goals, compliance requirements, and critical workload mapping.</p>
        </div>
        <div class="process-item">
          <h5>2. Application Dependency Mapping</h5>
          <p>Inter-service, network, and data dependency analysis to avoid cutover surprises.</p>
        </div>
        <div class="process-item">
          <h5>3. Target Architecture Design</h5>
          <p>Landing zone design with network, IAM, backup, logging, and DR policies.</p>
        </div>
        <div class="process-item">
          <h5>4. Pilot Migration</h5>
          <p>Controlled migration of low-risk systems to validate process and performance.</p>
        </div>
        <div class="process-item">
          <h5>5. Main Migration Waves</h5>
          <p>Execution in planned waves with frequent checkpoints and stakeholder reporting.</p>
        </div>
        <div class="process-item">
          <h5>6. Testing and Verification</h5>
          <p>Functional, load, and security testing to certify production readiness.</p>
        </div>
        <div class="process-item">
          <h5>7. Cutover and Hypercare</h5>
          <p>Controlled go-live with rapid issue handling and rollback readiness.</p>
        </div>
        <div class="process-item">
          <h5>8. Optimization and Governance</h5>
          <p>Post migration cost governance, performance tuning, and operational playbooks.</p>
        </div>
      </div>
      <div class="col-lg-6">
        <span class="sec-label">What We Migrate</span>
        <h3 class="sec-title">Workload Coverage for Noida Teams</h3>
        <ul class="text-secondary" style="line-height:1.9;">
          <li>Laravel, Node.js, Python, and Java web applications</li>
          <li>Customer portals and high-traffic ecommerce stores</li>
          <li>MySQL, PostgreSQL, SQL Server, and MongoDB databases</li>
          <li>Microservices and containerized Kubernetes workloads</li>
          <li>Background workers, queue systems, and schedulers</li>
          <li>Data lakes, analytics pipelines, and ETL jobs</li>
          <li>Windows and Linux virtual machine environments</li>
          <li>File storage systems and document archives</li>
          <li>API gateways and external integration layers</li>
          <li>Legacy monolithic applications requiring phased modernization</li>
          <li>Hybrid infrastructure with VPN and private network links</li>
          <li>Disaster recovery and multi-region resilience architectures</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="py-5" style="background:#ffffff;">
  <div class="container">
    <div class="text-center mb-5">
      <span class="sec-label">Industry Expertise</span>
      <h2 class="sec-title">Cloud Transformation Across Key Noida Sectors</h2>
      <p class="sec-subtitle mx-auto">
        We build cloud roadmaps based on data sensitivity, uptime requirements, and business continuity goals.
      </p>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6"><div class="cloud-card"><h4>SaaS & Product Startups</h4><p>Scalable architecture for user growth, rapid releases, and global performance.</p></div></div>
      <div class="col-lg-4 col-md-6"><div class="cloud-card"><h4>Fintech Platforms</h4><p>Secure identity, audit trails, and resilient processing layers for compliance-ready growth.</p></div></div>
      <div class="col-lg-4 col-md-6"><div class="cloud-card"><h4>Healthcare Systems</h4><p>Protected data migration with backup controls and reliable availability for patient workflows.</p></div></div>
      <div class="col-lg-4 col-md-6"><div class="cloud-card"><h4>Retail & Ecommerce</h4><p>Elastic infrastructure for sale spikes, catalog operations, and payment reliability.</p></div></div>
      <div class="col-lg-4 col-md-6"><div class="cloud-card"><h4>EdTech Platforms</h4><p>Video, exam, and content delivery infrastructure with uptime and cost governance.</p></div></div>
      <div class="col-lg-4 col-md-6"><div class="cloud-card"><h4>Enterprise IT</h4><p>Legacy modernization, data center exit planning, and hybrid cloud continuity.</p></div></div>
    </div>
  </div>
</section>

<section class="py-5" style="background:#f8fafc;">
  <div class="container">
    <div class="row g-4 align-items-start">
      <div class="col-lg-6">
        <span class="sec-label">Cloud Stack</span>
        <h2 class="sec-title">Platforms and Tools We Use</h2>
        <ul class="text-secondary" style="line-height:1.9;">
          <li>AWS: EC2, ECS, EKS, RDS, S3, CloudFront, Route53, IAM, CloudWatch</li>
          <li>Azure: Virtual Machines, AKS, App Service, SQL Database, Blob Storage</li>
          <li>Google Cloud: GKE, Compute Engine, Cloud SQL, Cloud Storage, IAM</li>
          <li>IaC: Terraform, CloudFormation, Bicep for repeatable infrastructure</li>
          <li>CI/CD: GitHub Actions, GitLab CI, Jenkins, and deployment guardrails</li>
          <li>Monitoring: Datadog, Grafana, Prometheus, and cloud native observability</li>
          <li>Security: WAF setup, key management, secret rotation, and policy auditing</li>
        </ul>
      </div>
      <div class="col-lg-6">
        <span class="sec-label">Delivery Models</span>
        <h3 class="sec-title">Engagement Options</h3>
        <div class="cloud-card mb-3">
          <h4>Fixed Scope Migration</h4>
          <p>Defined timeline and deliverables for predictable migration of selected workloads.</p>
        </div>
        <div class="cloud-card mb-3">
          <h4>Dedicated Cloud Team</h4>
          <p>Long-term migration and optimization squad integrated with your engineering team.</p>
        </div>
        <div class="cloud-card">
          <h4>Audit and Advisory</h4>
          <p>Architecture review, security gap analysis, and execution roadmap for internal teams.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5" style="background:#ffffff;">
  <div class="container">
    <div class="text-center mb-4">
      <span class="sec-label">Business Impact</span>
      <h2 class="sec-title">Typical Outcomes After Cloud Migration</h2>
    </div>
    <div class="table-responsive">
      <table class="table kpi-table">
        <thead>
          <tr>
            <th>Metric</th>
            <th>Before Migration</th>
            <th>After Migration</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Release Frequency</td>
            <td>Monthly or ad-hoc</td>
            <td>Weekly or daily with CI/CD</td>
          </tr>
          <tr>
            <td>Infrastructure Scalability</td>
            <td>Manual capacity planning</td>
            <td>Auto scale based on workload</td>
          </tr>
          <tr>
            <td>Availability</td>
            <td>Single zone risk</td>
            <td>Multi zone high availability</td>
          </tr>
          <tr>
            <td>Security Controls</td>
            <td>Limited baseline</td>
            <td>Policy driven and auditable controls</td>
          </tr>
          <tr>
            <td>Cloud Spend Visibility</td>
            <td>Low transparency</td>
            <td>Tag based tracking and budgets</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<section class="py-5" style="background:#f8fafc;">
  <div class="container text-center">
    <span class="sec-label">Service Areas</span>
    <h2 class="sec-title">Cloud Migration Across Noida and NCR</h2>
    <p class="sec-subtitle mx-auto mb-4">
      We support cloud modernization programs across startup hubs and enterprise parks.
    </p>
    <span class="area-chip"><i class="fas fa-map-marker-alt"></i> Sector 62</span>
    <span class="area-chip"><i class="fas fa-map-marker-alt"></i> Sector 63</span>
    <span class="area-chip"><i class="fas fa-map-marker-alt"></i> Sector 125</span>
    <span class="area-chip"><i class="fas fa-map-marker-alt"></i> Sector 18</span>
    <span class="area-chip"><i class="fas fa-map-marker-alt"></i> Noida Expressway</span>
    <span class="area-chip"><i class="fas fa-map-marker-alt"></i> Greater Noida</span>
    <span class="area-chip"><i class="fas fa-map-marker-alt"></i> Pari Chowk</span>
    <span class="area-chip"><i class="fas fa-map-marker-alt"></i> Delhi NCR</span>
  </div>
</section>

<section class="py-5" style="background:#ffffff;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="text-center mb-4">
          <span class="sec-label">FAQs</span>
          <h2 class="sec-title">Cloud Migration FAQs - Noida</h2>
        </div>
        <details class="faq-item">
          <summary>How long does cloud migration take for a mid-size company?</summary>
          <div class="ans">Typical migration takes 3 to 8 weeks depending on application complexity, data volume, and compliance controls.</div>
        </details>
        <details class="faq-item">
          <summary>Can you migrate with minimal downtime?</summary>
          <div class="ans">Yes. We use phased cutover, replication, blue-green patterns, and fallback planning to reduce downtime risk.</div>
        </details>
        <details class="faq-item">
          <summary>Which cloud platform is best for our team?</summary>
          <div class="ans">Choice depends on workload type, budget model, data residency, and your engineering skill set.</div>
        </details>
        <details class="faq-item">
          <summary>Do you also migrate databases and file storage?</summary>
          <div class="ans">Yes, we migrate relational, NoSQL, and file storage systems with validation and rollback safeguards.</div>
        </details>
        <details class="faq-item">
          <summary>Can you optimize our current cloud bill?</summary>
          <div class="ans">Yes, we run cost audits and optimization plans including rightsizing, reservations, and storage optimization.</div>
        </details>
        <details class="faq-item">
          <summary>Do you provide post migration support?</summary>
          <div class="ans">Yes. We offer managed cloud operations, 24x7 monitoring, incident support, and monthly tuning reviews.</div>
        </details>
      </div>
    </div>
  </div>
</section>

<section class="py-5" style="background:#f8fafc;">
  <div class="container text-center">
    <h2 class="sec-title">Related Cloud Location Pages</h2>
    <div class="d-flex flex-wrap justify-content-center gap-2 mt-3">
      <a href="{{ route('services.cloud-migration-delhi') }}" class="badge rounded-pill text-bg-light border p-2">Cloud Migration Delhi</a>
      <a href="{{ route('services.cloud-migration-gurgaon') }}" class="badge rounded-pill text-bg-light border p-2">Cloud Migration Gurgaon</a>
      <a href="{{ route('services.cloud-migration-ghaziabad') }}" class="badge rounded-pill text-bg-light border p-2">Cloud Migration Ghaziabad</a>
      <a href="{{ route('services.cloud') }}" class="badge rounded-pill text-bg-light border p-2">Cloud Solutions</a>
    </div>
  </div>
</section>
@endsection
