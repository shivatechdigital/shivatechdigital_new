// ========================================
// DIGIMAX JAVASCRIPT - OPTIMIZED BUILD
// Performance enhanced + Forced Reflow reduced
// Version: 1.1
// ========================================

(function () {
    'use strict';

    // ========================================
    // Global Variables
    // ========================================
    let autoPlayInterval = null;
    let isScrolling = false;
    let testimonialsAutoPlay = null;

    // ========================================
    // Initialize AOS (Animate On Scroll)
    // ========================================
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100,
            disable: false,
            easing: 'ease-out-cubic'
        });
    }

    // ========================================
    // Utility Functions
    // ========================================

    // Debounce function
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Throttle function
    function throttle(func, limit) {
        let inThrottle;
        return function (...args) {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }

    // ========================================
    // Navbar Scroll Effect
    // ========================================
    const navbar = document.getElementById('mainNav');
    const handleNavbarScroll = throttle(function () {
        if (!navbar) return;
        navbar.classList.toggle('scrolled', window.pageYOffset > 50);
    }, 100);

    // ========================================
    // Counter Animation
    // ========================================
    function animateCounter(element) {
        const target = parseInt(element.getAttribute('data-count'));
        if (isNaN(target)) return;

        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                element.textContent = target + '+';
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current);
            }
        }, 16);
    }

    // Intersection Observer for counters
    function initCounterObserver() {
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.stat-number');
                    counters.forEach(counter => {
                        if (counter.textContent.trim() === '' || counter.textContent.trim() === '0') {
                            animateCounter(counter);
                        }
                    });
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        document.querySelectorAll('.hero-stats, .about-stats, .header-stats, .header-stats-vertical')
            .forEach(section => counterObserver.observe(section));
    }

    // ========================================
    // Portfolio Filter (no layout thrashing, safe)
    // ========================================
    function initPortfolioFilter() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const portfolioItems = document.querySelectorAll('.portfolio-item');
        if (!filterButtons.length) return;

        filterButtons.forEach(button => {
            button.addEventListener('click', function () {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                const filterValue = this.getAttribute('data-filter');

                portfolioItems.forEach(item => {
                    const category = item.getAttribute('data-category');
                    if (filterValue === 'all' || category === filterValue) {
                        item.style.display = 'block';
                        requestAnimationFrame(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'scale(1)';
                        });
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.8)';
                        setTimeout(() => { item.style.display = 'none'; }, 250);
                    }
                });
            });
        });
    }

    // ========================================
    // Contact Form Handling
    // ========================================
    function initContactForm() {
        const contactForm = document.getElementById('contactForm');
        if (!contactForm) return;

        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const formMessage = document.getElementById('form-message');

            const formData = {
                name: document.getElementById('name')?.value.trim(),
                email: document.getElementById('email')?.value.trim(),
                phone: document.getElementById('phone')?.value.trim(),
                service: document.getElementById('service')?.value,
                subject: document.getElementById('subject')?.value.trim(),
                message: document.getElementById('message')?.value.trim()
            };

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!formData.name || !formData.email || !formData.service ||
                !formData.subject || !formData.message) {
                return showFormMessage(formMessage, 'error', 'Please fill all required fields.');
            }

            if (!emailRegex.test(formData.email)) {
                return showFormMessage(formMessage, 'error', 'Invalid email format.');
            }

            showFormMessage(formMessage, 'success',
                'Thank you! Your message was sent successfully.');

            contactForm.reset();

            setTimeout(() => formMessage.style.display = 'none', 5000);
        });
    }

    function showFormMessage(element, type, message) {
        if (!element) return;
        element.className = 'form-message ' + type;
        element.textContent = message;
        element.style.display = 'block';
    }

    // ========================================
    // Smooth Scroll Optimized
    // ========================================
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href === '#' || !document.querySelector(href)) return;

                e.preventDefault();

                const target = document.querySelector(href);
                const offset = 80;
                const topPos = target.getBoundingClientRect().top + window.pageYOffset - offset;

                window.scrollTo({ top: topPos, behavior: 'smooth' });
            });
        });

        // Links inside services page
        document.querySelectorAll('a[href^="services.html#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                const hash = href.split('#')[1];
                const target = document.getElementById(hash);

                if (target && window.location.pathname.includes("services.html")) {
                    e.preventDefault();
                    const offset = 100;
                    const topPos = target.offsetTop - offset;
                    window.scrollTo({ top: topPos, behavior: 'smooth' });
                }
            });
        });
    }
    // ========================================
    // Parallax Effect for Hero Section
    // ========================================
    const handleParallax = throttle(function () {
        const heroSection = document.querySelector('.hero-section');
        if (!heroSection) return;

        const scrolled = window.pageYOffset;
        const parallaxElements = heroSection.querySelectorAll('.hero-image img');

        parallaxElements.forEach(element => {
            element.style.transform = `translateY(${scrolled * 0.3}px)`;
        });
    }, 50);

    // ========================================
    // Mobile Menu Close on Link Click
    // ========================================
    function initMobileMenu() {
        document.querySelectorAll('.navbar-nav .nav-link:not(.dropdown-toggle)').forEach(link => {
            link.addEventListener('click', function () {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                    const navbarToggler = document.querySelector('.navbar-toggler');
                    if (navbarToggler) {
                        navbarToggler.click();
                    }
                }
            });
        });
    }

    // ========================================
    // Service Button Hover Effects
    // ========================================
    function initServiceButtons() {
        document.querySelectorAll('.btn-service').forEach(button => {
            button.addEventListener('mouseenter', function () {
                this.style.transform = 'translateX(5px)';
            });
            button.addEventListener('mouseleave', function () {
                this.style.transform = 'translateX(0)';
            });
        });
    }

    // ========================================
    // Form Input Animation
    // ========================================
    function initFormInputs() {
        document.querySelectorAll('.form-control, .form-select, .form-control-creative').forEach(input => {
            input.addEventListener('focus', function () {
                const parent = this.parentElement;
                if (parent) parent.classList.add('focused');
            });

            input.addEventListener('blur', function () {
                const parent = this.parentElement;
                if (!this.value && parent) parent.classList.remove('focused');
            });
        });
    }

    // ========================================
    // Back to Top Button
    // ========================================
    function initBackToTop() {
        const backToTopButton = document.createElement('button');
        backToTopButton.innerHTML = '<i class="fas fa-arrow-up"></i>';
        backToTopButton.className = 'back-to-top';
        backToTopButton.setAttribute('aria-label', 'Back to top');

        document.body.appendChild(backToTopButton);

        const toggleBackToTop = throttle(function () {
            backToTopButton.style.display = window.pageYOffset > 300 ? 'flex' : 'none';
        }, 200);

        window.addEventListener('scroll', toggleBackToTop);

        backToTopButton.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        backToTopButton.addEventListener('mouseenter', function () {
            this.style.transform = 'translateY(-5px)';
        });

        backToTopButton.addEventListener('mouseleave', function () {
            this.style.transform = 'translateY(0)';
        });
    }

    // ========================================
    // PROCESS TIMELINE WITH MISSILE ANIMATION (Optimized)
    // ========================================
    function initProcessTimeline() {
        const progressBar = document.getElementById('progressBar');
        const processMissile = document.getElementById('processMissile');
        const processSteps = document.querySelectorAll('.process-step-horizontal');
        const flowDots = document.querySelectorAll('.flow-dot');
        const prevBtn = document.getElementById('prevStep');
        const nextBtn = document.getElementById('nextStep');
        const currentPhaseElement = document.getElementById('currentPhase');
        const progressPercentElement = document.getElementById('progressPercent');
        const processSection = document.querySelector('.process-timeline-horizontal');
        const timelineLine = document.querySelector('.timeline-progress-line');

        if (!progressBar || !processSteps.length || !processMissile) return;

        let currentStep = 0;
        const totalSteps = processSteps.length;
        let autoPlayInterval = null;
        const phaseNames = ['Consultation', 'Planning', 'Development', 'Launch'];
        let stepPositions = [];

        // Calculate step positions (layout reads ONLY here)
        function calculateStepPositions() {
            stepPositions = [];
            const isMobile = window.innerWidth < 992;

            if (!isMobile) {
                // Horizontal layout positions
                stepPositions = [0, 33.3, 66.6, 100];
                return;
            }

            if (!timelineLine) return;
            const containerRect = timelineLine.getBoundingClientRect();

            processSteps.forEach(step => {
                const stepCircle = step.querySelector('.step-circle-horizontal');
                if (!stepCircle) {
                    stepPositions.push(0);
                    return;
                }
                const rect = stepCircle.getBoundingClientRect();
                const relativeTop = rect.top - containerRect.top + rect.height / 2;
                const percentage = (relativeTop / containerRect.height) * 100;
                stepPositions.push(Math.min(Math.max(percentage, 0), 100));
            });
        }

        // Activate a step (only writes)
        function activateStep(stepIndex, immediate = false) {
            if (!stepPositions.length) {
                calculateStepPositions();
            }

            if (stepIndex < 0) stepIndex = 0;
            if (stepIndex >= totalSteps) stepIndex = totalSteps - 1;

            currentStep = stepIndex;
            const isMobile = window.innerWidth < 992;

            // Update steps classes
            processSteps.forEach((step, index) => {
                step.classList.remove('active', 'completed');
                if (index < stepIndex) {
                    step.classList.add('completed');
                } else if (index === stepIndex) {
                    step.classList.add('active');
                }
            });

            // Flow dots
            flowDots.forEach((dot, index) => {
                dot.classList.toggle('active', index === stepIndex);
            });

            // Missile movement
            if (processMissile) {
                if (immediate) {
                    processMissile.style.transition = 'none';
                } else {
                    processMissile.style.transition = isMobile
                        ? 'top 2s cubic-bezier(0.4, 0, 0.2, 1)'
                        : 'left 2s cubic-bezier(0.4, 0, 0.2, 1)';
                }

                const pos = stepPositions[stepIndex] ?? 0;

                if (isMobile) {
                    processMissile.style.top = pos + '%';
                } else {
                    processMissile.style.left = pos + '%';
                }

                if (immediate) {
                    setTimeout(() => {
                        processMissile.style.transition = isMobile
                            ? 'top 2s cubic-bezier(0.4, 0, 0.2, 1)'
                            : 'left 2s cubic-bezier(0.4, 0, 0.2, 1)';
                    }, 50);
                }
            }

            // Progress bar
            const progress = (stepIndex / (totalSteps - 1)) * 100;
            if (isMobile) {
                progressBar.style.height = progress + '%';
                progressBar.style.width = '100%';
            } else {
                progressBar.style.width = progress + '%';
                progressBar.style.height = '100%';
            }

            // Status text
            if (currentPhaseElement) currentPhaseElement.textContent = phaseNames[stepIndex];
            if (progressPercentElement) progressPercentElement.textContent = Math.round(progress) + '%';

            // Buttons
            if (prevBtn) {
                prevBtn.style.opacity = stepIndex === 0 ? '0.5' : '1';
                prevBtn.style.cursor = stepIndex === 0 ? 'not-allowed' : 'pointer';
                prevBtn.disabled = stepIndex === 0;
            }
            if (nextBtn) {
                nextBtn.style.opacity = stepIndex === totalSteps - 1 ? '0.5' : '1';
                nextBtn.style.cursor = stepIndex === totalSteps - 1 ? 'not-allowed' : 'pointer';
                nextBtn.disabled = stepIndex === totalSteps - 1;
            }

            // Explosion effect
            if (!immediate) {
                setTimeout(() => {
                    createExplosion(stepIndex);
                }, 2000);
            }
        }

        // Explosion effect
        function createExplosion(stepIndex) {
            const step = processSteps[stepIndex];
            if (!step) return;

            const circle = step.querySelector('.step-circle-horizontal');
            if (!circle) return;

            for (let i = 0; i < 12; i++) {
                const particle = document.createElement('div');
                particle.className = 'explosion-particle';
                particle.style.cssText = `
                    position: absolute;
                    width: 8px;
                    height: 8px;
                    background: radial-gradient(circle, #fff, #6366f1, transparent);
                    border-radius: 50%;
                    top: 50%;
                    left: 50%;
                    pointer-events: none;
                    z-index: 100;
                `;

                circle.appendChild(particle);

                const angle = (i / 12) * Math.PI * 2;
                const distance = 50;
                const x = Math.cos(angle) * distance;
                const y = Math.sin(angle) * distance;

                particle.animate([
                    { transform: 'translate(-50%, -50%) scale(1)', opacity: 1 },
                    { transform: `translate(calc(-50% + ${x}px), calc(-50% + ${y}px)) scale(0)`, opacity: 0 }
                ], {
                    duration: 800,
                    easing: 'cubic-bezier(0.4, 0, 0.2, 1)'
                }).onfinish = () => particle.remove();
            }
        }

        // Auto-play
        function autoPlay() {
            currentStep = (currentStep + 1) % totalSteps;
            activateStep(currentStep);
        }

        function startAutoPlay() {
            stopAutoPlay();
            autoPlayInterval = setInterval(autoPlay, 4000);
        }

        function stopAutoPlay() {
            if (autoPlayInterval) {
                clearInterval(autoPlayInterval);
                autoPlayInterval = null;
            }
        }

        // Init
        calculateStepPositions();
        activateStep(0, true);
        setTimeout(startAutoPlay, 1000);

        // Button controls
        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                if (currentStep > 0) {
                    stopAutoPlay();
                    activateStep(currentStep - 1);
                    setTimeout(startAutoPlay, 6000);
                }
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                if (currentStep < totalSteps - 1) {
                    stopAutoPlay();
                    activateStep(currentStep + 1);
                    setTimeout(startAutoPlay, 6000);
                }
            });
        }

        // Flow dot controls
        flowDots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                stopAutoPlay();
                activateStep(index);
                setTimeout(startAutoPlay, 6000);
            });
        });

        // Step click controls
        processSteps.forEach((step, index) => {
            step.addEventListener('click', () => {
                stopAutoPlay();
                activateStep(index);
                setTimeout(startAutoPlay, 6000);
            });
        });

        // Pause on hover
        if (processSection) {
            processSection.addEventListener('mouseenter', stopAutoPlay);
            processSection.addEventListener('mouseleave', () => {
                setTimeout(startAutoPlay, 2000);
            });
        }

        // Intersection Observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    calculateStepPositions();
                    activateStep(0, true);
                    setTimeout(startAutoPlay, 1000);
                } else {
                    stopAutoPlay();
                }
            });
        }, { threshold: 0.3 });

        if (processSection) {
            observer.observe(processSection);
        }

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (!processSection) return;

            const rect = processSection.getBoundingClientRect();
            const isInView = rect.top < window.innerHeight && rect.bottom >= 0;

            if (!isInView) return;

            if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                if (currentStep > 0) {
                    e.preventDefault();
                    stopAutoPlay();
                    activateStep(currentStep - 1);
                    setTimeout(startAutoPlay, 6000);
                }
            } else if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                if (currentStep < totalSteps - 1) {
                    e.preventDefault();
                    stopAutoPlay();
                    activateStep(currentStep + 1);
                    setTimeout(startAutoPlay, 6000);
                }
            }
        });

        // Resize handling
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                calculateStepPositions();
                activateStep(currentStep, true);
            }, 250);
        });

        // Cleanup
        window.addEventListener('beforeunload', stopAutoPlay);
    }

    // ========================================
    // MEGA MENU ENHANCEMENT
    // ========================================
    function initMegaMenu() {
        const megaDropdown = document.querySelector('.mega-dropdown');
        const megaMenu = document.querySelector('.mega-menu');
        const dropdownToggle = document.getElementById('servicesDropdown');

        if (!megaDropdown || !megaMenu || !dropdownToggle) return;

        let menuTimeout;

        // Desktop hover behavior
        function bindDesktopHover() {
            megaDropdown.addEventListener('mouseenter', onEnter);
            megaDropdown.addEventListener('mouseleave', onLeave);
        }

        function onEnter() {
            clearTimeout(menuTimeout);
            megaMenu.classList.add('show');
            dropdownToggle.setAttribute('aria-expanded', 'true');
        }

        function onLeave() {
            menuTimeout = setTimeout(() => {
                megaMenu.classList.remove('show');
                dropdownToggle.setAttribute('aria-expanded', 'false');
            }, 200);
        }

        if (window.innerWidth >= 992) {
            bindDesktopHover();
        }

        // Click for mobile
        dropdownToggle.addEventListener('click', function (e) {
            if (window.innerWidth < 992) {
                e.preventDefault();
                const isExpanded = this.getAttribute('aria-expanded') === 'true';

                if (isExpanded) {
                    megaMenu.classList.remove('show');
                    this.setAttribute('aria-expanded', 'false');
                } else {
                    megaMenu.classList.add('show');
                    this.setAttribute('aria-expanded', 'true');
                }
            }
        });

        // Close when clicking an item
        megaMenu.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', function () {
                megaMenu.classList.remove('show');
                dropdownToggle.setAttribute('aria-expanded', 'false');

                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                    const navbarToggler = document.querySelector('.navbar-toggler');
                    if (navbarToggler) {
                        setTimeout(() => navbarToggler.click(), 300);
                    }
                }
            });
        });

        // Close when clicking outside
        document.addEventListener('click', function (event) {
            const isClickInside = megaDropdown.contains(event.target);
            if (!isClickInside && megaMenu.classList.contains('show')) {
                megaMenu.classList.remove('show');
                dropdownToggle.setAttribute('aria-expanded', 'false');
            }
        });

        // Resize handling
        let resizeTimeout;
        window.addEventListener('resize', function () {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                if (window.innerWidth >= 992) {
                    megaMenu.classList.remove('show');
                    dropdownToggle.setAttribute('aria-expanded', 'false');
                }
            }, 250);
        });

        // Keyboard accessibility
        dropdownToggle.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });

        // Body class toggle for open/close
        const observer = new MutationObserver(function (mutations) {
            mutations.forEach(function (mutation) {
                if (mutation.attributeName === 'class') {
                    const isOpen = megaMenu.classList.contains('show');
                    document.body.classList.toggle('mega-menu-open', isOpen);
                }
            });
        });

        observer.observe(megaMenu, {
            attributes: true,
            attributeFilter: ['class']
        });
    }
    // ========================================
    // TESTIMONIALS SLIDER (Optimized)
    // ========================================
    function initTestimonialsSlider() {
        const track = document.getElementById('testimonialsTrack');
        const prevBtn = document.getElementById('prevTestimonial');
        const nextBtn = document.getElementById('nextTestimonial');
        const dotsContainer = document.getElementById('testimonialDots');

        if (!track || !prevBtn || !nextBtn) return;

        const cards = track.querySelectorAll('.testimonial-card-creative');
        const totalCards = cards.length;

        let currentIndex = 0;
        let cardsPerView = 1;
        let maxIndex = 0;
        let cardWidth = 0;

        function getCardsPerView() {
            if (window.innerWidth >= 992) return 3;
            if (window.innerWidth >= 768) return 2;
            return 1;
        }

        // Calculate sizes ONLY when required (performance gain)
        function recalcSliderLayout() {
            cardsPerView = getCardsPerView();
            maxIndex = Math.max(0, totalCards - cardsPerView);
            if (cards[0]) cardWidth = cards[0].getBoundingClientRect().width;
        }

        recalcSliderLayout();

        // Create dots dynamically
        function createDots() {
            dotsContainer.innerHTML = '';
            for (let i = 0; i <= maxIndex; i++) {
                const dot = document.createElement('div');
                dot.className = 'slider-dot' + (i === 0 ? ' active' : '');
                dot.addEventListener('click', () => goToSlide(i));
                dotsContainer.appendChild(dot);
            }
        }

        createDots();

        function updateSlider() {
            if (!cardWidth) recalcSliderLayout(); // fallback

            const gap = 32; // 2rem spacing
            const offset = -(currentIndex * (cardWidth + gap));
            track.style.transform = `translateX(${offset}px)`;

            document.querySelectorAll('.slider-dot').forEach((dot, index) => {
                dot.classList.toggle('active', index === currentIndex);
            });
        }

        function goToSlide(index) {
            currentIndex = Math.max(0, Math.min(index, maxIndex));
            updateSlider();
            resetAutoPlay();
        }

        function nextSlide() {
            currentIndex = (currentIndex >= maxIndex) ? 0 : currentIndex + 1;
            updateSlider();
        }

        function prevSlide() {
            currentIndex = (currentIndex <= 0) ? maxIndex : currentIndex - 1;
            updateSlider();
        }

        // Autoplay
        function startAutoPlay() {
            clearInterval(testimonialsAutoPlay);
            testimonialsAutoPlay = setInterval(nextSlide, 5000);
        }
        function resetAutoPlay() {
            clearInterval(testimonialsAutoPlay);
            startAutoPlay();
        }

        prevBtn.addEventListener('click', () => { prevSlide(); resetAutoPlay(); });
        nextBtn.addEventListener('click', () => { nextSlide(); resetAutoPlay(); });

        // Touch support
        let touchStartX = 0, touchEndX = 0;

        track.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        });

        track.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            if (touchStartX - touchEndX > 50) nextSlide();
            if (touchEndX - touchStartX > 50) prevSlide();
            resetAutoPlay();
        });

        // Init
        updateSlider();
        startAutoPlay();

        // Resize optimized
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                currentIndex = 0;
                recalcSliderLayout();
                createDots();
                updateSlider();
            }, 250);
        });
    }

    // ========================================
    // HERO SECTION EFFECTS + TILT (Optimized)
    // ========================================
    function initTypingEffect() {
        const typedTextElement = document.getElementById('typedText');
        if (!typedTextElement) return;

        const words = ['Digital', 'Business', 'Brand', 'Online', 'Marketing'];
        let wordIndex = 0, charIndex = 0, isDeleting = false, speed = 150;

        function type() {
            const word = words[wordIndex];

            typedTextElement.textContent = isDeleting
                ? word.substring(0, charIndex--)
                : word.substring(0, charIndex++);

            speed = isDeleting ? 100 : 150;

            if (!isDeleting && charIndex === word.length) { speed = 2000; isDeleting = true; }
            else if (isDeleting && charIndex === 0) { isDeleting = false; wordIndex = (wordIndex + 1) % words.length; speed = 500; }

            setTimeout(type, speed);
        }
        type();
    }

    // 3D Tilt (Reflow-Free)
    function init3DTilt() {
        const cards = document.querySelectorAll('[data-tilt]');
        cards.forEach(card => {
            let rect = card.getBoundingClientRect();
            let cx = rect.width / 2, cy = rect.height / 2;

            const updateRect = () => {
                rect = card.getBoundingClientRect();
                cx = rect.width / 2;
                cy = rect.height / 2;
            };

            window.addEventListener('resize', debounce(updateRect, 200));
            card.addEventListener('mouseenter', updateRect);

            card.addEventListener('mousemove', e => {
                const x = e.clientX - rect.left, y = e.clientY - rect.top;
                card.style.transform = `perspective(1000px) rotateX(${(y - cy) / 10}deg) rotateY(${(cx - x) / 10}deg) scale3d(1.05,1.05,1.05)`;
            });
            card.addEventListener('mouseleave', () =>
                card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale3d(1,1,1)'
            );
        });
    }

    function initParticles() {
        const container = document.getElementById('particles');
        if (!container) return;
        for (let i = 0; i < 50; i++) {
            const p = document.createElement('div');
            p.className = 'particle';
            p.style.left = Math.random() * 100 + '%';
            p.style.animationDelay = Math.random() * 15 + 's';
            p.style.animationDuration = 15 + Math.random() * 10 + 's';
            container.appendChild(p);
        }
    }

    function initHeroEffects() {
        initTypingEffect();
        initParticles();
        init3DTilt();
    }

    // ========================================
    // Unified Scroll Handler
    // ========================================
    function initScrollHandlers() {
        const scrollHandler = throttle(() => {
            handleNavbarScroll();
            handleParallax();
        }, 100);
        window.addEventListener('scroll', scrollHandler, { passive: true });
    }

    // ========================================
    // Loading Animation
    // ========================================
    function initLoadingAnimation() {
        window.addEventListener('load', () => {
            document.body.classList.add('loaded');
            if (typeof AOS !== 'undefined') AOS.refresh();
        });
    }

    // ========================================
    // MAIN INITIALIZATION
    // ========================================
    function init() {
        document.addEventListener('DOMContentLoaded', () => {
            console.log('%c🚀 DIGIMAX WEBSITE INITIALIZING...', 'color:#6c5ce7;font-size:14px');
            
            initCounterObserver();
            initPortfolioFilter();
            initContactForm();
            initSmoothScroll();
            initMobileMenu();
            initServiceButtons();
            initFormInputs();
            initBackToTop();
            initProcessTimeline();
            initMegaMenu();
            initTestimonialsSlider();
            initHeroEffects();

            console.log('%c✔ DIGIMAX INITIALIZED SUCCESSFULLY', 'color:#00b894;font-size:14px');
        });

        initScrollHandlers();
        initLoadingAnimation();
    }

    init();

    // ========================================
    // Cleanup
    // ========================================
    window.addEventListener('beforeunload', () => {
        if (autoPlayInterval) clearInterval(autoPlayInterval);
        if (testimonialsAutoPlay) clearInterval(testimonialsAutoPlay);
    });

})();
