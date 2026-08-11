@extends('website.index')
@section('seo_slug', 'quote-calculator')

@push('styles')
<style>
.quote-wrap { background: linear-gradient(135deg, #f3f8ff 0%, #f8fafc 100%); padding: 110px 0 70px; }
.quote-card { border: 1px solid #dbeafe; border-radius: 20px; background: #fff; box-shadow: 0 18px 45px rgba(2, 132, 199, 0.08); }
.quote-label { font-size: .8rem; font-weight: 700; color: #1e3a8a; text-transform: uppercase; letter-spacing: .5px; margin-bottom: 8px; }
.quote-result { border-radius: 16px; background: linear-gradient(135deg, #1e3a8a, #0f766e); color: #fff; }
.badge-soft { display: inline-flex; padding: 6px 12px; border-radius: 999px; background: #e0f2fe; color: #075985; font-size: .75rem; font-weight: 700; }
</style>
@endpush

@section('website.content')
<section class="quote-wrap">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge-soft">Instant Estimation</span>
            <h1 class="mt-3" style="font-weight:800;color:#0f172a;">Project Quote Calculator</h1>
            <p style="max-width:680px;margin:0 auto;color:#475569;">Project type, features, timeline, and support select karke instant budget range pao. Final proposal discovery call ke baad share hoga.</p>
        </div>

        <div class="row g-4 align-items-stretch">
            <div class="col-lg-7">
                <div class="quote-card p-4 p-lg-5 h-100">
                    <div class="mb-4">
                        <label class="quote-label">Project Type</label>
                        <select class="form-select" id="projectType">
                            <option value="website">Business Website</option>
                            <option value="ecommerce">E-commerce Store</option>
                            <option value="webapp">Custom Web App</option>
                            <option value="mobile">Mobile App</option>
                            <option value="marketing">SEO + Digital Marketing</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="quote-label">Budget Preference</label>
                        <input type="range" class="form-range" min="1" max="5" value="3" id="budgetLevel">
                        <div class="d-flex justify-content-between" style="font-size:.78rem;color:#64748b;">
                            <span>Lean</span><span>Balanced</span><span>Premium</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="quote-label">Timeline</label>
                        <div class="d-flex gap-2 flex-wrap" id="timelineOptions">
                            <button type="button" class="btn btn-outline-primary active" data-multiplier="1.2">Urgent (2-4 weeks)</button>
                            <button type="button" class="btn btn-outline-primary" data-multiplier="1">Standard (1-3 months)</button>
                            <button type="button" class="btn btn-outline-primary" data-multiplier="0.85">Flexible (3+ months)</button>
                        </div>
                    </div>

                    <div>
                        <label class="quote-label">Features</label>
                        <div class="row g-2">
                            <div class="col-md-6"><label class="form-check"><input class="form-check-input feature-input" type="checkbox" value="12000"> Admin Dashboard</label></div>
                            <div class="col-md-6"><label class="form-check"><input class="form-check-input feature-input" type="checkbox" value="9000"> Payment Integration</label></div>
                            <div class="col-md-6"><label class="form-check"><input class="form-check-input feature-input" type="checkbox" value="15000"> CRM/Automation</label></div>
                            <div class="col-md-6"><label class="form-check"><input class="form-check-input feature-input" type="checkbox" value="7000"> Advanced SEO Setup</label></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="quote-result p-4 p-lg-5 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <p style="font-size:.8rem;letter-spacing:.6px;text-transform:uppercase;opacity:.8;">Estimated Investment</p>
                        <h2 id="estimateValue" style="font-size:2.4rem;font-weight:900;">Rs 45,000</h2>
                        <p id="estimateRange" style="opacity:.85;">Range: Rs 38,000 - Rs 52,000</p>

                        <div class="mt-4" style="padding:14px;border:1px solid rgba(255,255,255,.2);border-radius:12px;">
                            <strong style="font-size:.92rem;">Included</strong>
                            <ul class="mt-2 mb-0" style="font-size:.85rem;opacity:.9;line-height:1.7;">
                                <li>Discovery + planning workshop</li>
                                <li>Responsive development</li>
                                <li>QA and deployment support</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a id="ctaLink" href="{{ route('contact') }}" class="btn btn-light w-100 fw-bold">Book Free Consultation</a>
                        @auth
                            <a href="{{ route('client.portal.index') }}" class="btn btn-outline-light w-100 mt-2">Open Client Tracker</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-light w-100 mt-2">Client Login</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
(() => {
    const baseMap = {
        website: 35000,
        ecommerce: 60000,
        webapp: 90000,
        mobile: 120000,
        marketing: 28000,
    };

    const typeEl = document.getElementById('projectType');
    const budgetEl = document.getElementById('budgetLevel');
    const featureEls = Array.from(document.querySelectorAll('.feature-input'));
    const timelineButtons = Array.from(document.querySelectorAll('#timelineOptions button'));
    const estimateValue = document.getElementById('estimateValue');
    const estimateRange = document.getElementById('estimateRange');
    const ctaLink = document.getElementById('ctaLink');

    let timelineMultiplier = 1.2;

    const formatInr = (amount) => 'Rs ' + amount.toLocaleString('en-IN');

    function calculate() {
        const typeBase = baseMap[typeEl.value] || 35000;
        const budgetMultiplier = 0.75 + (Number(budgetEl.value) * 0.15);
        const featuresTotal = featureEls.filter((x) => x.checked).reduce((sum, x) => sum + Number(x.value), 0);

        const estimate = Math.round((typeBase * budgetMultiplier + featuresTotal) * timelineMultiplier);
        const min = Math.round(estimate * 0.85);
        const max = Math.round(estimate * 1.15);

        estimateValue.textContent = formatInr(estimate);
        estimateRange.textContent = `Range: ${formatInr(min)} - ${formatInr(max)}`;

        const query = new URLSearchParams({
            project_type: typeEl.value,
            estimate: String(estimate),
        });
        ctaLink.href = `{{ route('contact') }}?${query.toString()}`;
    }

    timelineButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            timelineButtons.forEach((b) => b.classList.remove('active'));
            btn.classList.add('active');
            timelineMultiplier = Number(btn.dataset.multiplier || 1);
            calculate();
        });
    });

    [typeEl, budgetEl, ...featureEls].forEach((el) => el.addEventListener('input', calculate));
    calculate();
})();
</script>
@endpush
