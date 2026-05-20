<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'My App')</title>
    @googlefonts
    @vite(['resources/css/app.css', 'resources/css/themes.css','resources/js/app.js'])
</head>

<body>

    {{-- Fixed Header --}}
    @include('layouts.partials.header')

    <div class="layout">
        {{-- Fixed Sidebar --}}
        @include('layouts.partials.sidebar')

        {{-- Main Content --}}
        <main class="main" id="main-content">
            @yield('content')
        </main>

    </div><!-- /layout -->

    <!-- NEW PROJECT MODAL -->
    <div class="modal-overlay" id="projectModal" onclick="if(event.target===this)closeModal('projectModal')">
        <div class="modal-box">
            <div class="modal-header">
                <span class="modal-title">New Project</span>
                <button class="modal-close" onclick="closeModal('projectModal')"><svg viewBox="0 0 16 16" fill="none"
                        stroke="currentColor" stroke-width="1.5">
                        <path d="M4 4l8 8M12 4l-8 8" stroke-linecap="round" />
                    </svg></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-field full">
                        <div class="form-label">Project Name <span class="req">*</span></div>
                        <input type="text" class="form-input" placeholder="e.g. ISO 9001 Certification">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <div class="form-label">Department <span class="req">*</span></div>
                        <select class="form-input">
                            <option>Select department</option>
                            <option>IT</option>
                            <option>HR</option>
                            <option>Legal</option>
                            <option>Finance</option>
                            <option>Operations</option>
                        </select>
                    </div>
                    <div class="form-field">
                        <div class="form-label">Priority</div>
                        <select class="form-input">
                            <option>Medium</option>
                            <option>High</option>
                            <option>Critical</option>
                            <option>Low</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <div class="form-label">Start Date <span class="req">*</span></div>
                        <input type="date" class="form-input">
                    </div>
                    <div class="form-field">
                        <div class="form-label">Due Date <span class="req">*</span></div>
                        <input type="date" class="form-input">
                    </div>
                </div>
                <div class="form-field">
                    <div class="form-label">Project Lead</div>
                    <select class="form-input">
                        <option>Ajay Admin</option>
                        <option>Priya Sharma</option>
                        <option>Rahul Mehta</option>
                        <option>Sunita Kumar</option>
                        <option>Vikram Patel</option>
                    </select>
                </div>
                <div class="form-field">
                    <div class="form-label">Description</div>
                    <textarea class="form-input" placeholder="Briefly describe the project goals and scope…"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="closeModal('projectModal')">Cancel</button>
                <button class="btn btn-brand" onclick="saveProject()">
                    <svg viewBox="0 0 16 16" fill="none" stroke="white" stroke-width="1.5">
                        <path d="M3 8l4 4 6-6" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Create Project
                </button>
            </div>
        </div>
    </div>

    <div class="toast" id="toast">
        <svg viewBox="0 0 16 16" fill="none" stroke="white" stroke-width="2">
            <path d="M3 8l4 4 6-6" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <span id="toastMsg">Done</span>
    </div>
    @stack('scripts')
</body>

</html>