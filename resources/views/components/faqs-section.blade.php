<style>
    /* ========================================
       FAQ SECTION - ATTRACTIVE DESIGN
    ======================================== */
    
    .faqs-section {
        position: relative;
        overflow: hidden;
    }
    
    .faqs-section::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(102, 126, 234, 0.08) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }
    
    .faqs-section::after {
        content: '';
        position: absolute;
        bottom: -80px;
        left: -80px;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(118, 75, 162, 0.06) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }
    
    /* ── FAQ Left Side Header ── */
    .faq-header-side {
        position: sticky;
        top: 100px;
        padding-right: 2rem;
    }
    
    .faq-header-side .section-badge {
        display: inline-block;
        padding: 6px 18px;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.12), rgba(118, 75, 162, 0.12));
        border: 1px solid rgba(102, 126, 234, 0.25);
        border-radius: 50px;
        color: #667eea;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 1rem;
    }
    
    .faq-header-side h2 {
        font-size: 2rem;
        font-weight: 700;
        color: #1a1a2e;
        line-height: 1.3;
        margin-bottom: 1rem;
    }
    
    .faq-header-side p {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }
    
    .btn-faq-contact {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 28px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff !important;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(102, 126, 234, 0.35);
    }
    
    .btn-faq-contact:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(102, 126, 234, 0.45);
        color: #fff !important;
    }
    
    .btn-faq-contact i {
        transition: transform 0.3s ease;
    }
    
    .btn-faq-contact:hover i {
        transform: translateX(4px);
    }
    
    /* ── FAQ Accordion ── */
    .faq-accordion {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    
    /* ── FAQ Item ── */
    .faq-item {
        background: #fff;
        border-radius: 16px;
        border: 1.5px solid rgba(102, 126, 234, 0.1);
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
    }
    
    .faq-item:hover {
        border-color: rgba(102, 126, 234, 0.3);
        box-shadow: 0 8px 30px rgba(102, 126, 234, 0.1);
        transform: translateY(-1px);
    }
    
    .faq-item:has(.faq-answer.show),
    .faq-item:has([aria-expanded="true"]) {
        border-color: rgba(102, 126, 234, 0.4);
        box-shadow: 0 8px 30px rgba(102, 126, 234, 0.15);
    }
    
    /* ── FAQ Question Button ── */
    .faq-question {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 20px 24px;
        background: transparent;
        border: none;
        cursor: pointer;
        text-align: left;
        transition: background 0.2s ease;
    }
    
    .faq-question:hover {
        background: rgba(102, 126, 234, 0.03);
    }
    
    /* For data-bs-toggle style (non-button) */
    div.faq-question {
        cursor: pointer;
        padding: 20px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
    }
    
    .faq-question h3,
    .faq-question h3.h5 {
        font-size: 0.97rem;
        font-weight: 600;
        color: #1a1a2e;
        margin: 0;
        line-height: 1.5;
        flex: 1;
    }
    
    /* ── Chevron Icon ── */
    .faq-question i.fa-chevron-down {
        width: 34px;
        height: 34px;
        min-width: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        border-radius: 50%;
        color: #667eea;
        font-size: 0.8rem;
        transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1),
                    background 0.3s ease,
                    color 0.3s ease;
    }
    
    .faq-item:has(.faq-answer.show) .faq-question i.fa-chevron-down,
    .faq-question[aria-expanded="true"] i.fa-chevron-down {
        transform: rotate(180deg);
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
    }
    
    /* ── FAQ Answer ── */
    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1),
                    padding 0.3s ease;
        padding: 0 24px;
    }
    
    .faq-answer.show {
        max-height: 500px;
        padding: 0 24px 20px;
    }
    
    /* collapse support (Bootstrap) */
    .faq-answer.collapse {
        max-height: 0;
        padding: 0 24px;
    }
    
    .faq-answer.collapse.show {
        max-height: 500px;
        padding: 0 24px 20px;
    }
    
    .faq-answer p {
        color: #555;
        font-size: 0.92rem;
        line-height: 1.8;
        margin: 0;
        padding-top: 4px;
        border-top: 1px solid rgba(102, 126, 234, 0.08);
        padding-top: 16px;
    }
    
    /* ── Active state left border ── */
    .faq-item:has(.faq-answer.show) {
        border-left: 3px solid #667eea;
    }
    
    /* ── Standalone FAQ section (component style) ── */
    .faqs-section .faq-accordion {
        position: relative;
    }
    
    /* Number counter for FAQs */
    .faq-item {
        counter-increment: faq-counter;
        position: relative;
    }
    
    /* ── Responsive ── */
    @media (max-width: 991px) {
        .faq-header-side {
            position: static;
            padding-right: 0;
            margin-bottom: 2rem;
            text-align: center;
        }
    
        .faq-header-side h2 {
            font-size: 1.6rem;
        }
    
        .btn-faq-contact {
            margin: 0 auto;
        }
    }
    
    @media (max-width: 576px) {
        .faq-question {
            padding: 16px 18px;
        }
    
        .faq-question h3,
        .faq-question h3.h5 {
            font-size: 0.9rem;
        }
    
        .faq-answer.show,
        .faq-answer.collapse.show {
            padding: 0 18px 16px;
        }
    
        .faq-answer p {
            font-size: 0.88rem;
        }
    
        .faq-question i.fa-chevron-down {
            width: 28px;
            height: 28px;
            min-width: 28px;
        }
    }
    
    /* ── Reduced motion ── */
    @media (prefers-reduced-motion: reduce) {
        .faq-item,
        .faq-answer,
        .faq-question i.fa-chevron-down,
        .btn-faq-contact {
            transition: none !important;
        }
    }
</style>

@if(count($faqs) > 0)
<section class="faqs-section py-5" id="faq" aria-labelledby="faq-heading">
    <div class="container">
        <header class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">FAQs</span>
            <h2 id="faq-heading">{{ $sectionTitle }}</h2>
            <p class="section-subtitle">{{ $sectionSubtitle }}</p>
        </header>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="faq-accordion" data-aos="fade-up">
                    @foreach($faqs as $index => $faq)
                    <div class="faq-item">
                        <button class="faq-question" 
                                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" 
                                aria-controls="faq-answer-{{ $index }}">
                            <h3 class="h5">{{ $faq['question'] }}</h3>
                            <i class="fas fa-chevron-down" aria-hidden="true"></i>
                        </button>
                        <div class="faq-answer {{ $index === 0 ? 'show' : '' }}" 
                             id="faq-answer-{{ $index }}">
                            <p>{{ $faq['answer'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FAQ Accordion JavaScript (included once per component) --}}
@once
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    'use strict';
    
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const icon = this.querySelector('i');
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            
            // Close other FAQs
            faqQuestions.forEach(q => {
                if (q !== question) {
                    q.nextElementSibling.classList.remove('show');
                    q.querySelector('i').style.transform = 'rotate(0deg)';
                    q.setAttribute('aria-expanded', 'false');
                }
            });
            
            // Toggle current FAQ
            answer.classList.toggle('show');
            this.setAttribute('aria-expanded', !isExpanded);
            icon.style.transform = answer.classList.contains('show') ? 'rotate(180deg)' : 'rotate(0deg)';
        });

        // Keyboard accessibility
        question.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });
});
</script>
@endpush
@endonce
@endif