{{-- ============================================
   EXIT INTENT LEAD CAPTURE POPUP
   Shows once per session when user moves to leave
   (desktop: mouse exits top of viewport;
    mobile: page visibility change)
============================================ --}}
<div id="exitIntentOverlay" class="exit-popup-overlay" role="dialog" aria-modal="true" aria-labelledby="exitPopupTitle" aria-hidden="true">
    <div class="exit-popup-box">
        <button class="exit-popup-close" id="exitPopupClose" aria-label="Close popup" type="button">
            <i class="fas fa-times" aria-hidden="true"></i>
        </button>

        <div class="exit-popup-badge">
            <i class="fas fa-bolt" aria-hidden="true"></i>
            Wait — Don't Go Yet!
        </div>

        <h2 class="exit-popup-title" id="exitPopupTitle">
            Get a <span>FREE</span> Project Consultation
        </h2>
        <p class="exit-popup-subtitle">
            Leave your details and we'll call you back within <strong>2 hours</strong> with a custom quote — no strings attached!
        </p>

        <div class="exit-popup-perks">
            <span><i class="fas fa-check-circle" aria-hidden="true"></i> Free Quote</span>
            <span><i class="fas fa-check-circle" aria-hidden="true"></i> No Spam</span>
            <span><i class="fas fa-check-circle" aria-hidden="true"></i> Expert Advice</span>
        </div>

        <form id="exitPopupForm" class="exit-popup-form" novalidate>
            @csrf
            <div class="exit-popup-fields">
                <input type="text" name="name" id="exitName" class="exit-popup-input" placeholder="Your Name *" required autocomplete="name">
                <input type="tel" name="phone" id="exitPhone" class="exit-popup-input" placeholder="Phone Number *" required autocomplete="tel">
            </div>
            <input type="text" name="service" id="exitService" class="exit-popup-input w-100" placeholder="Service needed (e.g. Web Development, SEO…)" autocomplete="off">
            <button type="submit" class="exit-popup-submit">
                <i class="fas fa-paper-plane me-2" aria-hidden="true"></i>
                Yes, Call Me Back!
            </button>
        </form>

        <p class="exit-popup-note">
            <i class="fab fa-whatsapp" aria-hidden="true"></i>
            Or WhatsApp us directly:
            <a href="https://wa.me/917007294764" target="_blank" rel="noopener noreferrer nofollow">+91-7007294764</a>
        </p>
    </div>
</div>

<style>
.exit-popup-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,.62);
    z-index: 99999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px;
    opacity: 0;
    visibility: hidden;
    transition: opacity .35s ease, visibility .35s ease;
    backdrop-filter: blur(3px);
}
.exit-popup-overlay.active {
    opacity: 1;
    visibility: visible;
}
.exit-popup-box {
    background: #fff;
    border-radius: 22px;
    padding: 36px 32px 28px;
    max-width: 480px;
    width: 100%;
    position: relative;
    box-shadow: 0 24px 80px rgba(0,0,0,.3);
    transform: scale(.9) translateY(20px);
    transition: transform .35s cubic-bezier(.34,1.56,.64,1);
    overflow: hidden;
}
.exit-popup-overlay.active .exit-popup-box {
    transform: scale(1) translateY(0);
}
.exit-popup-box::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 5px;
    background: linear-gradient(90deg, #667eea, #f093fb, #667eea);
    background-size: 200% 100%;
    animation: gradientMove 3s linear infinite;
}
@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    100% { background-position: 200% 50%; }
}
.exit-popup-close {
    position: absolute;
    top: 14px; right: 14px;
    background: #f1f5f9; border: none;
    border-radius: 50%;
    width: 32px; height: 32px;
    display: flex; align-items: center; justify-content: center;
    color: #64748b;
    cursor: pointer;
    font-size: .85rem;
    transition: background .2s, color .2s;
    z-index: 2;
}
.exit-popup-close:hover { background: #e2e8f0; color: #1e293b; }
.exit-popup-badge {
    display: inline-flex; align-items: center; gap: 6px;
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    color: #92400e;
    border-radius: 30px;
    padding: 5px 14px;
    font-size: .75rem;
    font-weight: 700;
    letter-spacing: .5px;
    text-transform: uppercase;
    margin-bottom: 14px;
}
.exit-popup-title {
    font-size: 1.6rem;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.25;
    margin-bottom: 10px;
}
.exit-popup-title span {
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.exit-popup-subtitle {
    color: #475569;
    font-size: .92rem;
    line-height: 1.65;
    margin-bottom: 14px;
}
.exit-popup-perks {
    display: flex; gap: 14px; flex-wrap: wrap;
    margin-bottom: 20px;
}
.exit-popup-perks span {
    font-size: .8rem; font-weight: 600; color: #10b981;
    display: flex; align-items: center; gap: 5px;
}
.exit-popup-fields {
    display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 10px;
}
.exit-popup-input {
    border: 1.5px solid #e2e8f0;
    border-radius: 10px;
    padding: 11px 14px;
    font-size: .88rem;
    color: #0f172a;
    outline: none;
    transition: border-color .2s;
    width: 100%;
    margin-bottom: 10px;
}
.exit-popup-input:focus { border-color: #667eea; }
.exit-popup-input.is-invalid { border-color: #ef4444; }
.exit-popup-submit {
    width: 100%;
    padding: 13px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    border: none;
    border-radius: 12px;
    font-size: .95rem;
    font-weight: 700;
    cursor: pointer;
    transition: transform .2s, box-shadow .2s;
    margin-top: 4px;
}
.exit-popup-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(102,126,234,.45);
}
.exit-popup-submit:disabled { opacity: .7; cursor: not-allowed; }
.exit-popup-note {
    text-align: center;
    font-size: .78rem;
    color: #94a3b8;
    margin-top: 14px;
    margin-bottom: 0;
}
.exit-popup-note a { color: #25D366; font-weight: 600; text-decoration: none; }
.exit-popup-note .fab { color: #25D366; }
.exit-popup-success {
    text-align: center; padding: 20px 0;
}
.exit-popup-success i {
    font-size: 3rem; color: #10b981; display: block; margin-bottom: 14px;
}
.exit-popup-success h3 { color: #0f172a; font-size: 1.2rem; font-weight: 700; }
.exit-popup-success p { color: #64748b; font-size: .9rem; margin: 0; }
@media (max-width: 480px) {
    .exit-popup-box { padding: 28px 20px 22px; }
    .exit-popup-fields { grid-template-columns: 1fr; gap: 0; }
    .exit-popup-title { font-size: 1.35rem; }
}
</style>

<script>
(function () {
    'use strict';

    const COOKIE_KEY  = 'std_exit_popup_shown';
    const DELAY_HOURS = 24; // hours before showing again

    function getCookie(name) {
        return document.cookie.split('; ').find(r => r.startsWith(name + '='));
    }

    function setCookie(name, hours) {
        const exp = new Date(Date.now() + hours * 3600 * 1000);
        document.cookie = name + '=1; expires=' + exp.toUTCString() + '; path=/; SameSite=Lax';
    }

    // Don't show on contact page or if already shown
    const isContactPage = window.location.pathname === '/contact';
    if (isContactPage || getCookie(COOKIE_KEY)) return;

    const overlay = document.getElementById('exitIntentOverlay');
    const closeBtn = document.getElementById('exitPopupClose');
    const form     = document.getElementById('exitPopupForm');

    if (!overlay) return;

    let shown = false;

    function showPopup() {
        if (shown) return;
        shown = true;
        setCookie(COOKIE_KEY, DELAY_HOURS);
        overlay.classList.add('active');
        overlay.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        // Focus first input
        setTimeout(() => { document.getElementById('exitName')?.focus(); }, 400);
    }

    function hidePopup() {
        overlay.classList.remove('active');
        overlay.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    // Desktop: mouse exits top of viewport
    document.addEventListener('mouseleave', function (e) {
        if (e.clientY <= 0) showPopup();
    });

    // Mobile: page visibility change (e.g. tab switch, home button)
    document.addEventListener('visibilitychange', function () {
        if (document.hidden) showPopup();
    });

    // Scroll trigger: show after 70% scroll depth (backup)
    let scrollTriggered = false;
    window.addEventListener('scroll', function () {
        if (scrollTriggered) return;
        const scrollPct = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
        if (scrollPct > 70) {
            scrollTriggered = true;
            setTimeout(showPopup, 2000);
        }
    }, { passive: true });

    closeBtn.addEventListener('click', hidePopup);

    // Close on overlay click
    overlay.addEventListener('click', function (e) {
        if (e.target === overlay) hidePopup();
    });

    // Escape key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && overlay.classList.contains('active')) hidePopup();
    });

    // Form submit
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const nameEl  = document.getElementById('exitName');
        const phoneEl = document.getElementById('exitPhone');
        let valid = true;

        [nameEl, phoneEl].forEach(el => el.classList.remove('is-invalid'));

        if (!nameEl.value.trim()) { nameEl.classList.add('is-invalid'); valid = false; }
        if (!phoneEl.value.trim()) { phoneEl.classList.add('is-invalid'); valid = false; }

        if (!valid) return;

        const btn = form.querySelector('button[type="submit"]');
        btn.disabled = true;
        btn.textContent = 'Sending…';

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

        fetch('/service-contact-submit', {
            method : 'POST',
            headers: {
                'Content-Type' : 'application/json',
                'Accept'       : 'application/json',
                'X-CSRF-TOKEN' : csrfToken,
            },
            body: JSON.stringify({
                name   : nameEl.value.trim(),
                phone  : phoneEl.value.trim(),
                service: document.getElementById('exitService')?.value.trim() || 'General Inquiry',
                source : 'Exit Intent Popup',
            }),
        })
        .then(res => res.ok ? res.json() : Promise.reject())
        .then(() => {
            const box = document.querySelector('.exit-popup-box');
            box.innerHTML = `<div class="exit-popup-success">
                <i class="fas fa-check-circle"></i>
                <h3>Thank you, ${nameEl.value.trim().split(' ')[0]}!</h3>
                <p>We'll call you within 2 hours. Talk soon! 🚀</p>
            </div>`;
            setTimeout(hidePopup, 3000);
        })
        .catch(() => {
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-paper-plane me-2"></i>Yes, Call Me Back!';
        });
    });
})();
</script>
