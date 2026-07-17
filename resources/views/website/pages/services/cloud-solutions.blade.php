@extends('website.pages.services.index')
{{-- 🔥 SEO SLUG - This loads meta from service_meta table --}}
@section('seo_slug', 'cloud-solutions')


@section('breadcrumb-title', 'Cloud Solutions')
@section('service-category', 'Infrastructure Services')
@section('hero-title', 'Cloud Solutions & Services')
@section('hero-description', 'Accelerate your digital transformation with enterprise-grade cloud solutions. From seamless migration to 24/7 managed services, we help you harness the full power of AWS, Azure, and Google Cloud to drive innovation and reduce costs.')
@section('service-name', 'Cloud Solutions')
@section('service-name-lower', 'cloud solutions')

@section('trust-badge-1', '200+ Cloud Projects')
@section('trust-badge-2', '99.99% Uptime SLA')
@section('trust-badge-3', '40% Avg Cost Savings')

@section('hero-image')
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiZP1ooUetphIft8sxln6QBtFMyiGByJawkw&s" alt="Cloud Solutions & Services - Shiva Tech Digital" class="img-fluid service-hero-img" loading="eager">
@endsection

@section('hero-stats')
<div class="stat-card">
    <h3>200+</h3>
    <p>Cloud Projects</p>
</div>
<div class="stat-card">
    <h3>99.99%</h3>
    <p>Uptime SLA</p>
</div>
<div class="stat-card">
    <h3>40%</h3>
    <p>Avg Cost Savings</p>
</div>
@endsection

@section('service-content')
<!-- Overview Section -->
<section class="service-overview py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="overview-content">
                    <span class="section-badge">About Our Service</span>
                    <h2>Enterprise Cloud Solutions Built for Scale</h2>
                    <p class="lead">At Shiva Tech Digital, we architect cloud solutions that transform businesses. Whether you're migrating from on-premise or optimizing existing cloud infrastructure, we deliver results.</p>
                    <p>With 200+ successful cloud projects, our certified cloud architects and DevOps engineers design, implement, and manage cloud environments that are secure, scalable, and cost-efficient. We're partners with AWS, Microsoft Azure, and Google Cloud.</p>
                    
                    <div class="overview-highlights">
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Multi-Cloud Expertise</h5>
                                <p>AWS, Azure & GCP certified architects</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Zero-Downtime Migration</h5>
                                <p>Seamless transitions without business disruption</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>24/7 Monitoring & Support</h5>
                                <p>Round-the-clock NOC with rapid response</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Cost Optimization</h5>
                                <p>Reduce cloud spend by 30-50% on average</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="overview-image-wrapper">
                    <img src="https://cdn.prod.website-files.com/68ea6aa9b2ec514e9b8b9322/6904d66d3c961b31241b63a8_6364e9fe33d500e517b48385_61955745617b2972558c0266_Cloud%252520Based%252520Computing.jpeg" alt="Enterprise Cloud Infrastructure" class="img-fluid rounded-lg shadow-lg" loading="lazy">
                    <div class="experience-badge">
                        <span class="years">200+</span>
                        <span class="text">Cloud Projects</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cloud Platforms -->
<section class="cloud-platforms py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Platforms</span>
            <h2>Cloud Platforms We Work With</h2>
            <p class="section-subtitle">Certified expertise across all major cloud providers</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="cloud-platform-card aws">
                    <div class="platform-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/93/Amazon_Web_Services_Logo.svg/1280px-Amazon_Web_Services_Logo.svg.png" alt="Amazon Web Services">
                    </div>
                    <h4>Amazon Web Services</h4>
                    <p>The world's most comprehensive cloud platform with 200+ services</p>
                    <div class="platform-services">
                        <span>EC2</span>
                        <span>S3</span>
                        <span>RDS</span>
                        <span>Lambda</span>
                        <span>EKS</span>
                        <span>CloudFront</span>
                    </div>
                    <div class="certification-badge">
                        <i class="fas fa-certificate"></i> AWS Advanced Partner
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="cloud-platform-card azure">
                    <div class="platform-logo">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYriQ-IYumxMGUGRmuz5Q-FDACsxdafu3qSA&s" alt="Microsoft Azure">
                    </div>
                    <h4>Microsoft Azure</h4>
                    <p>Enterprise cloud for hybrid solutions and Microsoft ecosystem</p>
                    <div class="platform-services">
                        <span>VMs</span>
                        <span>App Service</span>
                        <span>AKS</span>
                        <span>Cosmos DB</span>
                        <span>Functions</span>
                        <span>DevOps</span>
                    </div>
                    <div class="certification-badge">
                        <i class="fas fa-certificate"></i> Azure Gold Partner
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="cloud-platform-card gcp">
                    <div class="platform-logo">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvlSEeTBgbDi1rAoN8aW-UeA28nX6i8aoj3Q&s" alt="Google Cloud Platform">
                    </div>
                    <h4>Google Cloud Platform</h4>
                    <p>Data analytics, AI/ML, and Kubernetes-native cloud platform</p>
                    <div class="platform-services">
                        <span>Compute</span>
                        <span>GKE</span>
                        <span>BigQuery</span>
                        <span>Cloud Run</span>
                        <span>Pub/Sub</span>
                        <span>AI Platform</span>
                    </div>
                    <div class="certification-badge">
                        <i class="fas fa-certificate"></i> GCP Partner
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Offered -->
<section class="services-offered py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">What We Offer</span>
            <h2>Our Cloud Services</h2>
            <p class="section-subtitle">End-to-end cloud solutions for your digital transformation</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <h4>Cloud Migration</h4>
                    <p>Seamless migration from on-premise or between clouds with zero downtime and data integrity.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Assessment & Planning</li>
                        <li><i class="fas fa-check"></i> Application Migration</li>
                        <li><i class="fas fa-check"></i> Data Migration</li>
                        <li><i class="fas fa-check"></i> Hybrid Cloud Setup</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-drafting-compass"></i>
                    </div>
                    <h4>Cloud Architecture</h4>
                    <p>Design scalable, secure, and cost-effective cloud architectures aligned with best practices.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Well-Architected Review</li>
                        <li><i class="fas fa-check"></i> Microservices Design</li>
                        <li><i class="fas fa-check"></i> High Availability</li>
                        <li><i class="fas fa-check"></i> Disaster Recovery</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-infinity"></i>
                    </div>
                    <h4>DevOps & CI/CD</h4>
                    <p>Automate your software delivery with modern DevOps practices and robust pipelines.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> CI/CD Pipelines</li>
                        <li><i class="fas fa-check"></i> Infrastructure as Code</li>
                        <li><i class="fas fa-check"></i> Container Orchestration</li>
                        <li><i class="fas fa-check"></i> GitOps Implementation</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-server"></i>
                    </div>
                    <h4>Managed Cloud Services</h4>
                    <p>24/7 monitoring, management, and support so you can focus on your business.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> 24/7 Monitoring</li>
                        <li><i class="fas fa-check"></i> Incident Response</li>
                        <li><i class="fas fa-check"></i> Patch Management</li>
                        <li><i class="fas fa-check"></i> Backup & Recovery</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Cloud Security</h4>
                    <p>Comprehensive security solutions to protect your cloud infrastructure and data.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Security Assessments</li>
                        <li><i class="fas fa-check"></i> Identity & Access Mgmt</li>
                        <li><i class="fas fa-check"></i> Compliance (SOC2, HIPAA)</li>
                        <li><i class="fas fa-check"></i> Threat Detection</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h4>Cost Optimization</h4>
                    <p>Reduce your cloud spend while improving performance and scalability.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Cost Analysis</li>
                        <li><i class="fas fa-check"></i> Right-sizing</li>
                        <li><i class="fas fa-check"></i> Reserved Instances</li>
                        <li><i class="fas fa-check"></i> FinOps Implementation</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technologies & Tools -->
<section class="cloud-technologies py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Technologies</span>
            <h2>Cloud Technologies We Use</h2>
            <p class="section-subtitle">Modern tools and technologies for cloud-native solutions</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
                <div class="tech-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFENc6mCYABRY3JN_kEDJx7ahneMDuSbnHFw&s" alt="Kubernetes">
                    <h5>Kubernetes</h5>
                    <p>Container orchestration</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="150">
                <div class="tech-card">
                    <img src="https://p7.hiclipart.com/preview/852/593/318/using-docker-developing-and-deploying-software-with-containers-application-software-software-deployment-computer-software-github.jpg" alt="Docker">
                    <h5>Docker</h5>
                    <p>Containerization</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="tech-card">
                    <img src="https://icon2.cleanpng.com/20180823/tta/kisspng-product-design-brand-logo-font-devops-5b7f2351134c34.0065974315350587690791.jpg" alt="Terraform">
                    <h5>Terraform</h5>
                    <p>Infrastructure as Code</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="250">
                <div class="tech-card">
                    <img src="https://p7.hiclipart.com/preview/801/466/426/ansible-devops-puppet-chef-configuration-management-becoming-a-chef-thumbnail.jpg" alt="Ansible">
                    <h5>Ansible</h5>
                    <p>Configuration management</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
                <div class="tech-card">
                    <img src="https://e7.pngegg.com/pngimages/180/365/png-clipart-jenkins-devops-continuous-integration-software-development-installation-selenium-text-hand.png" alt="Jenkins">
                    <h5>Jenkins</h5>
                    <p>CI/CD automation</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="350">
                <div class="tech-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSt_VEEBTgAZFhe3V1ogSoEUqlYyxzOlI70VQ&s" alt="GitLab">
                    <h5>GitLab CI</h5>
                    <p>DevOps platform</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
                <div class="tech-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXbjB_xhZl2VnyKzvOb3Bx3TpW8Wf6qejoug&s" alt="Prometheus">
                    <h5>Prometheus</h5>
                    <p>Monitoring</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="450">
                <div class="tech-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp9M37nzQbPP3M_OXFlvZyyks13GJUw88QDg&s" alt="Grafana">
                    <h5>Grafana</h5>
                    <p>Observability</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
                <div class="tech-card">
                    <img src="https://assets.streamlinehq.com/image/private/w_300,h_300,ar_1/f_auto/v1/icons/1/argo-e1igjrrg4noy4q8rgwtags.png/argo-cqux33sc43kaweudnz4we.png?_a=DATAg1AAZAA0" alt="ArgoCD">
                    <h5>ArgoCD</h5>
                    <p>GitOps</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="550">
                <div class="tech-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcqJHcIPTlrlVN5EtSmn_3el_Bi2oS5tz4kw&s" alt="Helm">
                    <h5>Helm</h5>
                    <p>Package management</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
                <div class="tech-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVYfo_a9wX_LQUX-zrYrEFbHbPD4jUfZLxiw&s" alt="HashiCorp Vault">
                    <h5>Vault</h5>
                    <p>Secrets management</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="650">
                <div class="tech-card">
                    <img src="https://p7.hiclipart.com/preview/927/390/521/datadog-computer-software-business-cloud-computing-logo-workout-exercises.jpg" alt="Datadog">
                    <h5>Datadog</h5>
                    <p>APM & monitoring</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Migration Approach -->
<section class="migration-approach py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Our Approach</span>
            <h2>Cloud Migration Methodology</h2>
            <p class="section-subtitle">A proven framework for successful cloud adoption</p>
        </div>
        <div class="migration-phases" data-aos="fade-up">
            <div class="phase-item">
                <div class="phase-number">01</div>
                <div class="phase-icon"><i class="fas fa-search"></i></div>
                <div class="phase-content">
                    <h4>Assess</h4>
                    <p>Discovery, inventory, and readiness assessment</p>
                    <ul>
                        <li>Application portfolio analysis</li>
                        <li>Dependency mapping</li>
                        <li>TCO analysis</li>
                    </ul>
                </div>
            </div>
            <div class="phase-connector"><i class="fas fa-chevron-right"></i></div>
            <div class="phase-item">
                <div class="phase-number">02</div>
                <div class="phase-icon"><i class="fas fa-sitemap"></i></div>
                <div class="phase-content">
                    <h4>Plan</h4>
                    <p>Strategy, architecture, and migration roadmap</p>
                    <ul>
                        <li>Migration strategy (6 Rs)</li>
                        <li>Target architecture</li>
                        <li>Risk mitigation</li>
                    </ul>
                </div>
            </div>
            <div class="phase-connector"><i class="fas fa-chevron-right"></i></div>
            <div class="phase-item">
                <div class="phase-number">03</div>
                <div class="phase-icon"><i class="fas fa-cogs"></i></div>
                <div class="phase-content">
                    <h4>Migrate</h4>
                    <p>Execute migration with minimal disruption</p>
                    <ul>
                        <li>Pilot migration</li>
                        <li>Wave-based migration</li>
                        <li>Data synchronization</li>
                    </ul>
                </div>
            </div>
            <div class="phase-connector"><i class="fas fa-chevron-right"></i></div>
            <div class="phase-item">
                <div class="phase-number">04</div>
                <div class="phase-icon"><i class="fas fa-rocket"></i></div>
                <div class="phase-content">
                    <h4>Optimize</h4>
                    <p>Continuous improvement and modernization</p>
                    <ul>
                        <li>Performance tuning</li>
                        <li>Cost optimization</li>
                        <li>Cloud-native adoption</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="service-benefits py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="benefits-header">
                    <span class="section-badge">Benefits</span>
                    <h2>Why Move to the Cloud?</h2>
                    <p>Cloud computing delivers transformative business value</p>
                </div>
                <div class="cloud-stats mt-4">
                    <div class="stat-item">
                        <span class="stat-number">40%</span>
                        <span class="stat-text">Average infrastructure cost reduction</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">99.99%</span>
                        <span class="stat-text">Uptime SLA with our managed services</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">10x</span>
                        <span class="stat-text">Faster deployment with DevOps</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-rupee-sign"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Reduce Costs</h5>
                            <p>Pay only for what you use. No upfront hardware investment.</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Scale Instantly</h5>
                            <p>Scale up or down in minutes based on demand.</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Global Reach</h5>
                            <p>Deploy globally in seconds with worldwide data centers.</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Enhanced Security</h5>
                            <p>Enterprise-grade security with compliance certifications.</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Faster Innovation</h5>
                            <p>Access cutting-edge services and ship features faster.</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Business Continuity</h5>
                            <p>Built-in disaster recovery and high availability.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Use Cases -->
<section class="cloud-use-cases py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Use Cases</span>
            <h2>Cloud Solutions for Every Need</h2>
            <p class="section-subtitle">Real-world applications of our cloud services</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="use-case-card">
                    <div class="use-case-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <h4>Data Center Migration</h4>
                    <p>Move your entire data center to cloud with zero downtime and 40% cost savings.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="150">
                <div class="use-case-card">
                    <div class="use-case-icon">
                        <i class="fas fa-cubes"></i>
                    </div>
                    <h4>Microservices Architecture</h4>
                    <p>Break monoliths into scalable microservices with Kubernetes orchestration.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="use-case-card">
                    <div class="use-case-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4>Serverless Applications</h4>
                    <p>Build event-driven apps with Lambda, Cloud Functions for infinite scale.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="250">
                <div class="use-case-card">
                    <div class="use-case-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h4>Big Data & Analytics</h4>
                    <p>Process petabytes of data with cloud data warehouses and analytics.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="use-case-card">
                    <div class="use-case-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h4>AI & Machine Learning</h4>
                    <p>Train and deploy ML models using cloud AI platforms and GPUs.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="350">
                <div class="use-case-card">
                    <div class="use-case-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Disaster Recovery</h4>
                    <p>Implement multi-region DR with RPO/RTO guarantees for business continuity.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SLA & Support -->
<section class="sla-support py-5 bg-gradient-dark">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge light">Managed Services</span>
            <h2 class="text-white">24/7 Cloud Management & Support</h2>
            <p class="section-subtitle text-white-50">Round-the-clock monitoring, management, and support for your cloud infrastructure</p>
        </div>
        <div class="row g-4 text-center">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="sla-card">
                    <div class="sla-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>99.99%</h3>
                    <p>Uptime SLA</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="sla-card">
                    <div class="sla-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>24/7</h3>
                    <p>NOC Support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="sla-card">
                    <div class="sla-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>&lt;15 min</h3>
                    <p>Response Time</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="sla-card">
                    <div class="sla-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <h3>Dedicated</h3>
                    <p>Account Manager</p>
                </div>
            </div>
        </div>
        <div class="managed-services-features mt-5" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="features-grid">
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Proactive Monitoring</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Incident Response</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Security Patching</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Backup Management</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Performance Optimization</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Cost Reporting</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Compliance Audits</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Disaster Recovery</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Certifications -->
<section class="certifications py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Certifications</span>
            <h2>Our Cloud Certifications</h2>
            <p class="section-subtitle">Validated expertise from leading cloud providers</p>
        </div>
        <div class="certifications-grid" data-aos="fade-up">
            <div class="cert-item">
                <img src="https://www.novelvista.com/resources/images/course/other/aws-solution-architect-associates-logo.webp" alt="AWS Solutions Architect">
                <span>AWS Solutions Architect</span>
            </div>
            <div class="cert-item">
                <img src="https://img-c.udemycdn.com/open-badges/v2/badge-class/2133622969/image17132671510203826434.png" alt="AWS DevOps Engineer">
                <span>AWS DevOps Engineer</span>
            </div>
            <div class="cert-item">
                <img src="https://img-c.udemycdn.com/open-badges/v2/badge-class/2082659861/azure-administrator-associate-600x60014067246547753667656.png" alt="Azure Administrator">
                <span>Azure Administrator</span>
            </div>
            <div class="cert-item">
                <img src="https://www.thomasmaurer.ch/wp-content/uploads/2019/07/AZ-400-Microsoft-Certified-Azure-DevOps-Engineer.jpg" alt="Azure DevOps Expert">
                <span>Azure DevOps Expert</span>
            </div>
            <div class="cert-item">
                <img src="https://miro.medium.com/1*50iZgSa4igEspkVLg9cjzw.png" alt="GCP Cloud Architect">
                <span>GCP Cloud Architect</span>
            </div>
            <div class="cert-item">
                <img src="https://training.linuxfoundation.org/wp-content/uploads/2018/06/logo_cka_whitetext.png" alt="Kubernetes CKA">
                <span>Kubernetes CKA</span>
            </div>
            <div class="cert-item">
                <img src="https://miro.medium.com/1*ncQpNjnH0uDPrHKBdxzhsw.png" alt="Terraform Associate">
                <span>Terraform Associate</span>
            </div>
            <div class="cert-item">
                <img src="https://devitzone.com/cdn/shop/products/DCA_2048x.gif?v=1655301246" alt="Docker Certified">
                <span>Docker Certified</span>
            </div>
        </div>
    </div>
</section>
@endsection

@section('why-choose-items')
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-certificate"></i>
        </div>
        <h4>Certified Experts</h4>
        <p>50+ cloud certifications across AWS, Azure & GCP</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-chart-line"></i>
        </div>
        <h4>Proven Results</h4>
        <p>200+ successful cloud migrations with zero data loss</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-headset"></i>
        </div>
        <h4>24/7 Support</h4>
        <p>Round-the-clock NOC with &lt;15 min response time</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-piggy-bank"></i>
        </div>
        <h4>Cost Optimization</h4>
        <p>Average 40% reduction in cloud spend</p>
    </div>
</div>
@endsection

@section('process-steps')
<div class="row">
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
        <div class="process-step">
            <div class="step-number">01</div>
            <div class="step-icon"><i class="fas fa-comments"></i></div>
            <h4>Consult</h4>
            <p>Understand goals & challenges</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
        <div class="process-step">
            <div class="step-number">02</div>
            <div class="step-icon"><i class="fas fa-search"></i></div>
            <h4>Assess</h4>
            <p>Analyze current infrastructure</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
        <div class="process-step">
            <div class="step-number">03</div>
            <div class="step-icon"><i class="fas fa-drafting-compass"></i></div>
            <h4>Architect</h4>
            <p>Design cloud solution</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
        <div class="process-step">
            <div class="step-number">04</div>
            <div class="step-icon"><i class="fas fa-cloud-upload-alt"></i></div>
            <h4>Migrate</h4>
            <p>Execute migration</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
        <div class="process-step">
            <div class="step-number">05</div>
            <div class="step-icon"><i class="fas fa-tachometer-alt"></i></div>
            <h4>Optimize</h4>
            <p>Performance & cost tuning</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
        <div class="process-step">
            <div class="step-number">06</div>
            <div class="step-icon"><i class="fas fa-headset"></i></div>
            <h4>Manage</h4>
            <p>24/7 monitoring & support</p>
        </div>
    </div>
</div>
@endsection

@section('pricing-section')
<section class="pricing-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Pricing</span>
            <h2>Cloud Services Pricing</h2>
            <p class="section-subtitle">Flexible engagement models for your cloud journey</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Cloud Consulting</h4>
                        <p>Expert guidance for your cloud strategy</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">50,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Cloud Readiness Assessment</li>
                            <li><i class="fas fa-check"></i> TCO Analysis</li>
                            <li><i class="fas fa-check"></i> Migration Strategy</li>
                            <li><i class="fas fa-check"></i> Architecture Review</li>
                            <li><i class="fas fa-check"></i> Security Assessment</li>
                            <li><i class="fas fa-check"></i> Roadmap & Recommendations</li>
                            <li><i class="fas fa-times text-muted"></i> Implementation</li>
                            <li><i class="fas fa-times text-muted"></i> Managed Services</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="pricing-card featured">
                    <div class="popular-badge">Most Popular</div>
                    <div class="pricing-header">
                        <h4>Cloud Migration</h4>
                        <p>End-to-end migration services</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">3,00,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Complete Assessment</li>
                            <li><i class="fas fa-check"></i> Migration Planning</li>
                            <li><i class="fas fa-check"></i> Infrastructure Setup</li>
                            <li><i class="fas fa-check"></i> Application Migration</li>
                            <li><i class="fas fa-check"></i> Data Migration</li>
                            <li><i class="fas fa-check"></i> Testing & Validation</li>
                            <li><i class="fas fa-check"></i> Go-Live Support</li>
                            <li><i class="fas fa-check"></i> 3 Months Support</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Managed Services</h4>
                        <p>24/7 cloud management & support</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">50,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> 24/7 Monitoring</li>
                            <li><i class="fas fa-check"></i> Incident Management</li>
                            <li><i class="fas fa-check"></i> Security Patching</li>
                            <li><i class="fas fa-check"></i> Backup Management</li>
                            <li><i class="fas fa-check"></i> Performance Optimization</li>
                            <li><i class="fas fa-check"></i> Cost Optimization</li>
                            <li><i class="fas fa-check"></i> Monthly Reporting</li>
                            <li><i class="fas fa-check"></i> Dedicated Account Manager</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <p class="text-muted">* Prices are indicative. Final pricing depends on infrastructure size, complexity & scope. Contact us for a custom quote.</p>
        </div>
        
        <!-- Additional Pricing Options -->
        <div class="additional-pricing mt-5" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="pricing-options-card">
                        <h4><i class="fas fa-users"></i> Need Dedicated Cloud Engineers?</h4>
                        <p>Hire dedicated DevOps engineers and cloud architects on a monthly basis</p>
                        <div class="pricing-options-grid">
                            <div class="option-item">
                                <span class="option-name">Junior Cloud Engineer</span>
                                <span class="option-price">₹60,000/month</span>
                            </div>
                            <div class="option-item">
                                <span class="option-name">Senior DevOps Engineer</span>
                                <span class="option-price">₹1,20,000/month</span>
                            </div>
                            <div class="option-item">
                                <span class="option-name">Cloud Architect</span>
                                <span class="option-price">₹1,80,000/month</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('case-studies-section')
<section class="case-studies-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Case Studies</span>
            <h2>Cloud Success Stories</h2>
            <p class="section-subtitle">Real results from real cloud transformations</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="portfolio-card cloud">
                    <div class="portfolio-image">
                        <img src="https://www.thecommerceshop.com/wp-content/uploads/2025/07/website-migration-detailed-guidelines-scaled.png" alt="E-commerce Cloud Migration" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Case Study</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">E-commerce</span>
                        <h4>AWS Migration for Online Retailer</h4>
                        <p>Migrated from on-premise to AWS, handling 10x traffic during sales</p>
                        <div class="portfolio-results">
                            <span><i class="fas fa-chart-line"></i> 45% Cost Reduction</span>
                            <span><i class="fas fa-tachometer-alt"></i> 3x Faster</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="portfolio-card cloud">
                    <div class="portfolio-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4OoUwQYlXJ53Q44mU3bxvyFzHhs1VkWLlLg&s" alt="FinTech Kubernetes Platform" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Case Study</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">FinTech</span>
                        <h4>Kubernetes Platform for Banking App</h4>
                        <p>Built secure, compliant K8s platform on Azure for financial services</p>
                        <div class="portfolio-results">
                            <span><i class="fas fa-rocket"></i> 10x Faster Deployments</span>
                            <span><i class="fas fa-shield-alt"></i> SOC2 Compliant</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="portfolio-card cloud">
                    <div class="portfolio-image">
                        <img src="https://acropolium.com/img/articles/cloud-computing-healthcare/img04.jpg" alt="Healthcare Cloud Infrastructure" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Case Study</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Healthcare</span>
                        <h4>HIPAA-Compliant Cloud for Hospital</h4>
                        <p>Designed and deployed HIPAA-compliant infrastructure on GCP</p>
                        <div class="portfolio-results">
                            <span><i class="fas fa-clock"></i> 99.99% Uptime</span>
                            <span><i class="fas fa-lock"></i> HIPAA Certified</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('portfolio') }}" class="btn-view-all">
                View All Case Studies <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endsection

@section('testimonials-section')
<section class="testimonials-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Testimonials</span>
            <h2>What Our Clients Say</h2>
            <p class="section-subtitle">Hear from businesses we've helped transform</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"They migrated our entire infrastructure to AWS in 6 weeks with zero downtime. Our cloud costs dropped by 42% while performance improved significantly. Their team is incredibly knowledgeable."</p>
                    <div class="testimonial-author">
                        <img src="https://assets.myntassets.com/dpr_1.5,q_30,w_400,c_limit,fl_progressive/assets/images/16698514/2024/9/4/78f2ea5c-04c5-4fac-a4f5-65834f7998f11725452488510-Peter-England-Men-Black-Solid-Slim-Fit-Single-Breasted-Blaze-1.jpg" alt="Client">
                        <div class="author-info">
                            <h5>Vikram Mehta</h5>
                            <span>CTO, E-commerce Company</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"The DevOps transformation was game-changing. We went from monthly releases to deploying 50+ times a day. Their CI/CD pipeline and Kubernetes setup is rock solid."</p>
                    <div class="testimonial-author">
                        <img src="
https://media.licdn.com/dms/image/v2/D4D03AQG9fpTG4Nxzkw/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1673247965564?e=2147483647&v=beta&t=ioB8zwuFeJXSEzHYJHiAxVKoFJfhyKvdu2iViwyq_0A" alt="Client">
                        <div class="author-info">
                            <h5>Priya Sharma</h5>
                            <span>VP Engineering, SaaS Startup</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="testimonial-text">"Their managed services team is exceptional. We haven't had a single unplanned outage in 18 months. The 24/7 support and proactive monitoring gives us complete peace of mind."</p>
                    <div class="testimonial-author">
                        <img src="https://pharmanovia.com/wp-content/uploads/2023/01/amit-patel-1.jpg" alt="Client">
                        <div class="author-info">
                            <h5>Rajesh Kumar</h5>
                            <span>IT Director, Healthcare Company</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('faqs-section')
    <x-faqs-section 
        page-slug="services/cloud-solutions"
        section-title="Frequently Asked Questions About Cloud Solutions"
        section-subtitle="Answers to common branding questions" />
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // FAQ Accordion
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const icon = this.querySelector('i');
            
            // Close other FAQs
            faqQuestions.forEach(q => {
                if (q !== question) {
                    q.nextElementSibling.classList.remove('show');
                    q.querySelector('i').style.transform = 'rotate(0deg)';
                }
            });
            
            // Toggle current FAQ
            answer.classList.toggle('show');
            icon.style.transform = answer.classList.contains('show') ? 'rotate(180deg)' : 'rotate(0deg)';
        });
    });

    // Lazy loading for images
    const lazyImages = document.querySelectorAll('img[loading="lazy"]');
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const image = entry.target;
                    image.src = image.dataset.src || image.src;
                    image.classList.add('loaded');
                    observer.unobserve(image);
                }
            });
        });
        lazyImages.forEach(img => imageObserver.observe(img));
    }
});
</script>
@endpush