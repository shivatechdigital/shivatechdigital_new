(() => {
    const stopWords = new Set(['the', 'and', 'for', 'with', 'from', 'this', 'that', 'your', 'how', 'are', 'was', 'into', 'about', 'guide', 'best', '2026']);

    function normalize(value) {
        return String(value || '').toLowerCase().replace(/[^a-z0-9]+/g, ' ').trim();
    }

    function escapeHtml(value) {
        return String(value).replace(/[&<>"']/g, character => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;'
        })[character]);
    }

    window.initInternalLinkSuggestions = function (editor) {
        const panel = document.querySelector('#internalLinkSuggestions');
        if (!panel) return;

        const candidatesNode = panel.querySelector('[data-internal-link-candidates]');
        const search = panel.querySelector('#internalLinkSearch');
        const results = panel.querySelector('#internalLinkResults');
        const status = panel.querySelector('#internalLinkStatus');
        const editorTextarea = document.querySelector('#editor');
        const candidates = JSON.parse(candidatesNode.textContent);

        function getContext() {
            const title = document.querySelector('[name="title"]')?.value || '';
            const excerpt = document.querySelector('[name="excerpt"]')?.value || '';
            const focusKeyword = document.querySelector('[name="focus_keyword"]')?.value || '';
            return normalize([title, excerpt, focusKeyword, search.value].join(' '));
        }

        function renderSuggestions() {
            const query = getContext();
            const tokens = [...new Set(query.split(' ').filter(token => token.length > 2 && !stopWords.has(token)))];
            const ranked = candidates.map(candidate => {
                const title = normalize(candidate.title);
                const keywords = normalize(candidate.keywords);
                const score = tokens.reduce((total, token) => {
                    if (title.split(' ').includes(token)) return total + 3;
                    return keywords.split(' ').includes(token) ? total + 1 : total;
                }, 0);
                return { candidate, score };
            }).filter(item => item.score > 0)
                .sort((first, second) => second.score - first.score || first.candidate.title.localeCompare(second.candidate.title))
                .slice(0, 6);

            results.replaceChildren();
            if (!ranked.length) {
                results.innerHTML = '<div class="small text-muted py-2">No close matches. Try a service, topic, or city name.</div>';
                return;
            }

            ranked.forEach(({ candidate }) => {
                const row = document.createElement('div');
                row.className = 'list-group-item d-flex align-items-center justify-content-between gap-3 px-0';

                const details = document.createElement('div');
                details.className = 'min-w-0';
                const title = document.createElement('div');
                title.className = 'fw-semibold';
                title.textContent = candidate.title;
                const url = document.createElement('small');
                url.className = 'text-muted d-block text-break';
                url.textContent = candidate.url;
                details.append(title, url);

                const insert = document.createElement('button');
                insert.type = 'button';
                insert.className = 'btn btn-sm btn-outline-primary flex-shrink-0';
                insert.innerHTML = '<i class="fas fa-plus me-1"></i>Insert';
                insert.addEventListener('mousedown', event => event.preventDefault());
                insert.addEventListener('click', () => insertLink(candidate));
                row.append(details, insert);
                results.append(row);
            });
        }

        function insertLink(candidate) {
            const sourceContainer = document.querySelector('#sourceContainer');
            const sourceEditor = document.querySelector('#sourceEditor');
            const sourceMode = sourceContainer && getComputedStyle(sourceContainer).display !== 'none';
            const currentContent = sourceMode ? sourceEditor.value : editor.getData();

            if (currentContent.includes(candidate.url)) {
                status.textContent = 'This link is already in the article.';
                return;
            }

            if (sourceMode) {
                const anchor = `<a href="${escapeHtml(candidate.url)}">${escapeHtml(candidate.title)}</a>`;
                sourceEditor.setRangeText(anchor, sourceEditor.selectionStart, sourceEditor.selectionEnd, 'end');
                sourceEditor.dispatchEvent(new Event('input', { bubbles: true }));
                editorTextarea.value = sourceEditor.value;
                sourceEditor.focus();
            } else {
                editor.model.change(writer => {
                    const selection = editor.model.document.selection;
                    if (selection.isCollapsed) {
                        writer.insertText(candidate.title, { linkHref: candidate.url }, selection.getFirstPosition());
                    } else {
                        writer.setAttribute('linkHref', candidate.url, selection.getFirstRange());
                    }
                });
                editor.editing.view.focus();
                editorTextarea.value = editor.getData();
            }

            status.textContent = `Inserted link to ${candidate.title}.`;
        }

        search.addEventListener('input', renderSuggestions);
        document.querySelector('[name="title"]')?.addEventListener('input', renderSuggestions);
        document.querySelector('[name="excerpt"]')?.addEventListener('input', renderSuggestions);
        document.querySelector('[name="focus_keyword"]')?.addEventListener('input', renderSuggestions);
        renderSuggestions();
    };
})();