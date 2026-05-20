window.switchView = function (tab, viewId) {
    document.querySelectorAll('.view-tab').forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    ['overview', 'board', 'tasks', 'timeline'].forEach(v => {
        const el = document.getElementById('view-' + v);
        if (el) el.style.display = v === viewId ? 'block' : 'none';
    });
}

window.openNewProject = function () {
    document.getElementById('projectModal').classList.add('show');
}

window.closeModal = function (id) {
    document.getElementById(id).classList.remove('show');
}

window.saveProject = function () {
    closeModal('projectModal');
    showToast('Project created successfully');
}

window.openNewTask = function () {
    showToast('Task added — feature coming soon');
}

window.toggleTask = function (el) {
    el.classList.toggle('done');
    const nameEl = el.closest('.task-item').querySelector('.task-name');
    if (nameEl) nameEl.classList.toggle('done', el.classList.contains('done'));
    showToast(el.classList.contains('done') ? 'Task marked complete' : 'Task reopened');
}

window.showToast = function (msg) {
    const t = document.getElementById('toast');
    document.getElementById('toastMsg').textContent = msg;
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 2600);
}


$(document).ready(function () {

    // Intercept ALL sidebar/nav link clicks
    $(document).on('click', 'a[data-spa]', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        loadPage(url);
    });

    // Load page via Ajax
    function loadPage(url) {
        $('#main-content').addClass('spa-loading');

        $.ajax({
            url: url,
            type: 'GET',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            success: function (response) {
                $('#main-content').html(response).removeClass('spa-loading');
                history.pushState({ url: url }, '', url);
                // Re-init any JS plugins after content swap
                initPlugins();
            },
            error: function (xhr) {
                $('#main-content').removeClass('spa-loading');
                if (xhr.status === 419) {
                    alert('Session expired. Please refresh.');
                } else {
                    $('#main-content').html('<p class="text-danger">Error loading page.</p>');
                }
            }
        });
    }

    // Handle browser back/forward buttons
    window.addEventListener('popstate', function (e) {
        if (e.state && e.state.url) {
            loadPage(e.state.url);
        }
    });

    // Save initial state so back button works from first page
    history.replaceState({ url: window.location.href }, '', window.location.href);

    // Re-initialize JS plugins after content swap (add your own here)
    function initPlugins() {
        // e.g. $('[data-toggle="tooltip"]').tooltip();
        // e.g. $('select').select2();
    }
});