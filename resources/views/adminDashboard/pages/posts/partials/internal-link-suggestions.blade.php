<section class="mt-3 rounded border p-3" id="internalLinkSuggestions" aria-labelledby="internalLinkHeading">
    <script type="application/json" data-internal-link-candidates>@json($internalLinkCandidates)</script>
    <div class="d-flex align-items-start justify-content-between gap-3 mb-2">
        <div>
            <h6 class="mb-1" id="internalLinkHeading"><i class="fas fa-link me-1"></i> Internal link suggestions</h6>
            <small class="text-muted">Choose a relevant page to link at the current cursor or selected text.</small>
        </div>
    </div>
    <label class="form-label small mb-1" for="internalLinkSearch">Topic or location</label>
    <input type="search" class="form-control form-control-sm" id="internalLinkSearch" placeholder="For example: Noida web development">
    <div class="list-group list-group-flush mt-2" id="internalLinkResults" aria-live="polite"></div>
    <div class="small text-muted mt-2" id="internalLinkStatus" role="status"></div>
</section>