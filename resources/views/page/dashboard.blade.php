@if(!request()->ajax())
    @extends('layouts.app')
    @section('title', 'Dashboard')
    @section('content')
@endif



 
        <main class="main">

            <!-- VIEW TABS -->
            <div class="view-tabs-bar">
                <div class="view-tabs">
                    <div class="view-tab active" onclick="switchView(this,'overview')">
                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="2" y="2" width="5" height="5" rx="1" />
                            <rect x="9" y="2" width="5" height="5" rx="1" />
                            <rect x="2" y="9" width="5" height="5" rx="1" />
                            <rect x="9" y="9" width="5" height="5" rx="1" />
                        </svg>
                        Overview
                    </div>
                    <div class="view-tab" onclick="switchView(this,'board')">
                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="1" y="3" width="4" height="11" rx="1" />
                            <rect x="6" y="3" width="4" height="8" rx="1" />
                            <rect x="11" y="3" width="4" height="9" rx="1" />
                        </svg>
                        Board
                    </div>
                    <div class="view-tab" onclick="switchView(this,'tasks')">
                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M3 4h10M3 7h7M3 10h8M3 13h5" />
                        </svg>
                        My Tasks
                    </div>
                    <div class="view-tab" onclick="switchView(this,'timeline')">
                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="2" y="3" width="12" height="11" rx="1" />
                            <path d="M5 3V1M11 3V1M2 7h12" />
                        </svg>
                        Timeline
                    </div>
                </div>
                <div class="tab-actions">
                    <button class="btn btn-outline btn-sm">
                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M2 4h12M4 8h8M6 12h4" stroke-linecap="round" />
                        </svg>
                        Filter
                    </button>
                    <button class="btn btn-brand btn-sm" onclick="openNewProject()">
                        <svg viewBox="0 0 16 16" fill="none" stroke="white" stroke-width="1.5">
                            <path d="M8 3v10M3 8h10" stroke-linecap="round" />
                        </svg>
                        New Project
                    </button>
                </div>
            </div>

            <!-- VIEWS -->
            <div class="content">

                <!-- ═══ OVERVIEW VIEW ═══ -->
                <div id="view-overview">

                    <!-- KPI -->
                    <div class="kpi-row">
                        <div class="kpi-card c-brand">
                            <div class="kpi-top">
                                <div class="kpi-icon brand"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                        stroke-width="1.5">
                                        <path d="M2 3h12v10H2z" />
                                        <path d="M5 3v10M10 3v10M2 8h12" opacity=".5" />
                                    </svg></div>
                                <div class="kpi-trend trend-up"><svg viewBox="0 0 10 10" fill="none" stroke="currentColor"
                                        stroke-width="1.5">
                                        <path d="M2 7l3-4 3 4" stroke-linecap="round" />
                                    </svg>+2</div>
                            </div>
                            <div class="kpi-value">8</div>
                            <div class="kpi-label">Active Projects</div>
                            <div class="kpi-foot">3 on track · 4 at risk · 1 delayed</div>
                        </div>
                        <div class="kpi-card c-blue">
                            <div class="kpi-top">
                                <div class="kpi-icon blue"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                        stroke-width="1.5">
                                        <path d="M3 4h10M3 7h7M3 10h8" />
                                    </svg></div>
                                <div class="kpi-trend trend-up"><svg viewBox="0 0 10 10" fill="none" stroke="currentColor"
                                        stroke-width="1.5">
                                        <path d="M2 7l3-4 3 4" stroke-linecap="round" />
                                    </svg>+14%</div>
                            </div>
                            <div class="kpi-value">143</div>
                            <div class="kpi-label">Tasks This Week</div>
                            <div class="kpi-foot">98 completed · 45 in progress</div>
                        </div>
                        <div class="kpi-card c-green">
                            <div class="kpi-top">
                                <div class="kpi-icon green"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                        stroke-width="1.5">
                                        <path d="M3 8.5l4 4 6-7" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></div>
                                <div class="kpi-trend trend-up"><svg viewBox="0 0 10 10" fill="none" stroke="currentColor"
                                        stroke-width="1.5">
                                        <path d="M2 7l3-4 3 4" stroke-linecap="round" />
                                    </svg>+6%</div>
                            </div>
                            <div class="kpi-value">78%</div>
                            <div class="kpi-label">On-Time Delivery</div>
                            <div class="kpi-foot">Target: 85% by end of Q1</div>
                        </div>
                        <div class="kpi-card c-amber">
                            <div class="kpi-top">
                                <div class="kpi-icon amber"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                        stroke-width="1.5">
                                        <path d="M8 2a6 6 0 100 12A6 6 0 008 2zM8 5v3.5l2 2" stroke-linecap="round" />
                                    </svg></div>
                                <div class="kpi-trend trend-down"><svg viewBox="0 0 10 10" fill="none" stroke="currentColor"
                                        stroke-width="1.5">
                                        <path d="M2 3l3 4 3-4" stroke-linecap="round" />
                                    </svg>+3</div>
                            </div>
                            <div class="kpi-value">17</div>
                            <div class="kpi-label">Overdue Tasks</div>
                            <div class="kpi-foot">Across 4 projects</div>
                        </div>
                    </div>

                    <!-- PROJECT CARDS -->
                    <div>
                        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
                            <div>
                                <div
                                    style="font-size:15px;font-weight:600;color:var(--text-primary);letter-spacing:-0.2px;">
                                    Active Projects</div>
                                <div style="font-size:12px;color:var(--text-tertiary);margin-top:2px;">Q1 2026 · 8 projects
                                    in progress</div>
                            </div>
                            <button class="btn btn-ghost btn-sm">View all →</button>
                        </div>
                        <div class="triple-grid">

                            <div class="project-card">
                                <div class="project-header">
                                    <div style="display:flex;align-items:flex-start;gap:12px;">
                                        <div class="project-icon" style="background:var(--brand-light);color:var(--brand);">
                                            <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <circle cx="8" cy="8" r="6" />
                                                <path d="M5.5 8.5l2 2 3-3" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="project-name">ISO 27001 Audit Prep</div>
                                            <div class="project-client">Client: Internal · IT Dept.</div>
                                        </div>
                                    </div>
                                    <div class="project-badge pb-active">
                                        <div class="pb-dot"></div>On Track
                                    </div>
                                </div>
                                <div class="progress-row">
                                    <div class="progress-top">
                                        <span class="progress-label">Progress</span>
                                        <span class="progress-pct">72%</span>
                                    </div>
                                    <div class="progress-track">
                                        <div class="progress-fill" style="width:72%;background:var(--brand)"></div>
                                    </div>
                                </div>
                                <div class="project-meta">
                                    <div class="project-meta-item">
                                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <rect x="2" y="3" width="12" height="11" rx="1" />
                                            <path d="M5 3V1M11 3V1M2 7h12" />
                                        </svg>
                                        Due Apr 30
                                    </div>
                                    <div class="project-meta-item">
                                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M3 4h10M3 7h7M3 10h8" />
                                        </svg>
                                        36 / 50 tasks
                                    </div>
                                    <div class="avatar-stack" style="margin-left:auto;">
                                        <div class="avatar-sm" style="background:#E8441A;color:white;">AA</div>
                                        <div class="avatar-sm" style="background:#1B6FD4;color:white;">PS</div>
                                        <div class="avatar-sm" style="background:#1A7A4A;color:white;">RM</div>
                                    </div>
                                </div>
                            </div>

                            <div class="project-card">
                                <div class="project-header">
                                    <div style="display:flex;align-items:flex-start;gap:12px;">
                                        <div class="project-icon" style="background:var(--blue-light);color:var(--blue);">
                                            <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <rect x="1" y="4" width="14" height="10" rx="1" />
                                                <path d="M5 4V2.5a.5.5 0 01.5-.5h5a.5.5 0 01.5.5V4" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="project-name">Portal Redesign v3</div>
                                            <div class="project-client">Client: DocFlow UX · Design</div>
                                        </div>
                                    </div>
                                    <div class="project-badge pb-review">
                                        <div class="pb-dot"></div>In Review
                                    </div>
                                </div>
                                <div class="progress-row">
                                    <div class="progress-top">
                                        <span class="progress-label">Progress</span>
                                        <span class="progress-pct">89%</span>
                                    </div>
                                    <div class="progress-track">
                                        <div class="progress-fill" style="width:89%;background:var(--blue)"></div>
                                    </div>
                                </div>
                                <div class="project-meta">
                                    <div class="project-meta-item">
                                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <rect x="2" y="3" width="12" height="11" rx="1" />
                                            <path d="M5 3V1M11 3V1M2 7h12" />
                                        </svg>
                                        Due Apr 15
                                    </div>
                                    <div class="project-meta-item">
                                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M3 4h10M3 7h7M3 10h8" />
                                        </svg>
                                        44 / 50 tasks
                                    </div>
                                    <div class="avatar-stack" style="margin-left:auto;">
                                        <div class="avatar-sm" style="background:#6D3FC4;color:white;">SK</div>
                                        <div class="avatar-sm" style="background:#B45309;color:white;">VP</div>
                                    </div>
                                </div>
                            </div>

                            <div class="project-card">
                                <div class="project-header">
                                    <div style="display:flex;align-items:flex-start;gap:12px;">
                                        <div class="project-icon" style="background:var(--red-light);color:var(--red);">
                                            <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <path d="M8 2v6M8 11v1" />
                                                <circle cx="8" cy="8" r="6" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="project-name">Security Patch Rollout</div>
                                            <div class="project-client">Client: Internal · Security</div>
                                        </div>
                                    </div>
                                    <div class="project-badge pb-risk">
                                        <div class="pb-dot"></div>At Risk
                                    </div>
                                </div>
                                <div class="progress-row">
                                    <div class="progress-top">
                                        <span class="progress-label">Progress</span>
                                        <span class="progress-pct" style="color:var(--red)">41%</span>
                                    </div>
                                    <div class="progress-track">
                                        <div class="progress-fill" style="width:41%;background:var(--red)"></div>
                                    </div>
                                </div>
                                <div class="project-meta">
                                    <div class="project-meta-item" style="color:var(--red);font-weight:500;">
                                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <rect x="2" y="3" width="12" height="11" rx="1" />
                                            <path d="M5 3V1M11 3V1M2 7h12" />
                                        </svg>
                                        Overdue Apr 8
                                    </div>
                                    <div class="project-meta-item">
                                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M3 4h10M3 7h7M3 10h8" />
                                        </svg>
                                        18 / 44 tasks
                                    </div>
                                    <div class="avatar-stack" style="margin-left:auto;">
                                        <div class="avatar-sm" style="background:#E8441A;color:white;">AA</div>
                                        <div class="avatar-sm" style="background:#1A7A4A;color:white;">RM</div>
                                        <div class="avatar-sm"
                                            style="background:var(--surface-3);color:var(--text-secondary);">+2</div>
                                    </div>
                                </div>
                            </div>

                            <div class="project-card">
                                <div class="project-header">
                                    <div style="display:flex;align-items:flex-start;gap:12px;">
                                        <div class="project-icon" style="background:var(--green-light);color:var(--green);">
                                            <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <path d="M2 10V6M5 10V4M8 10V2M11 10V5M14 10V7" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="project-name">Data Migration v2</div>
                                            <div class="project-client">Client: Ops Team · Backend</div>
                                        </div>
                                    </div>
                                    <div class="project-badge pb-active">
                                        <div class="pb-dot"></div>On Track
                                    </div>
                                </div>
                                <div class="progress-row">
                                    <div class="progress-top">
                                        <span class="progress-label">Progress</span>
                                        <span class="progress-pct">58%</span>
                                    </div>
                                    <div class="progress-track">
                                        <div class="progress-fill" style="width:58%;background:var(--green)"></div>
                                    </div>
                                </div>
                                <div class="project-meta">
                                    <div class="project-meta-item">
                                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <rect x="2" y="3" width="12" height="11" rx="1" />
                                            <path d="M5 3V1M11 3V1M2 7h12" />
                                        </svg>
                                        Due May 12
                                    </div>
                                    <div class="project-meta-item">
                                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M3 4h10M3 7h7M3 10h8" />
                                        </svg>
                                        29 / 50 tasks
                                    </div>
                                    <div class="avatar-stack" style="margin-left:auto;">
                                        <div class="avatar-sm" style="background:#1B6FD4;color:white;">PS</div>
                                        <div class="avatar-sm" style="background:#6D3FC4;color:white;">SK</div>
                                    </div>
                                </div>
                            </div>

                            <div class="project-card">
                                <div class="project-header">
                                    <div style="display:flex;align-items:flex-start;gap:12px;">
                                        <div class="project-icon"
                                            style="background:var(--purple-light);color:var(--purple);">
                                            <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <path d="M8 9a3 3 0 100-6 3 3 0 000 6z" />
                                                <path d="M2.5 14a5.5 5.5 0 0111 0" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="project-name">HR Onboarding Flow</div>
                                            <div class="project-client">Client: HR · People Ops</div>
                                        </div>
                                    </div>
                                    <div class="project-badge pb-hold">
                                        <div class="pb-dot"></div>On Hold
                                    </div>
                                </div>
                                <div class="progress-row">
                                    <div class="progress-top">
                                        <span class="progress-label">Progress</span>
                                        <span class="progress-pct" style="color:var(--amber)">25%</span>
                                    </div>
                                    <div class="progress-track">
                                        <div class="progress-fill" style="width:25%;background:var(--amber)"></div>
                                    </div>
                                </div>
                                <div class="project-meta">
                                    <div class="project-meta-item">
                                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <rect x="2" y="3" width="12" height="11" rx="1" />
                                            <path d="M5 3V1M11 3V1M2 7h12" />
                                        </svg>
                                        Due Jun 1
                                    </div>
                                    <div class="project-meta-item">
                                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M3 4h10M3 7h7M3 10h8" />
                                        </svg>
                                        10 / 40 tasks
                                    </div>
                                    <div class="avatar-stack" style="margin-left:auto;">
                                        <div class="avatar-sm" style="background:#B45309;color:white;">VP</div>
                                    </div>
                                </div>
                            </div>

                            <div class="project-card"
                                style="border-style:dashed;background:var(--surface-2);cursor:pointer;align-items:center;justify-content:center;min-height:180px;"
                                onclick="openNewProject()">
                                <div
                                    style="display:flex;flex-direction:column;align-items:center;gap:10px;color:var(--text-tertiary);">
                                    <div
                                        style="width:42px;height:42px;border-radius:var(--radius-md);border:2px dashed var(--border-strong);display:flex;align-items:center;justify-content:center;">
                                        <svg width="18" height="18" viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                            stroke-width="1.5">
                                            <path d="M8 3v10M3 8h10" stroke-linecap="round" />
                                        </svg>
                                    </div>
                                    <div style="font-size:13px;font-weight:500;color:var(--text-secondary);">New Project
                                    </div>
                                    <div style="font-size:12px;color:var(--text-tertiary);text-align:center;">Click to
                                        create a new project workspace</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- BOTTOM ROW -->
                    <div class="dual-grid">

                        <!-- BURNDOWN CHART -->
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <div class="card-title">Sprint Burndown</div>
                                    <div class="card-subtitle">ISO 27001 Audit — Sprint 3 of 5</div>
                                </div>
                                <div style="display:flex;align-items:center;gap:12px;font-size:12px;">
                                    <span style="display:flex;align-items:center;gap:5px;color:var(--text-secondary)"><span
                                            style="width:14px;height:2px;background:var(--border-strong);display:inline-block;border-bottom:2px dashed var(--border-strong);"></span>Ideal</span>
                                    <span style="display:flex;align-items:center;gap:5px;color:var(--text-secondary)"><span
                                            style="width:14px;height:2px;background:var(--brand);display:inline-block;border-radius:2px;"></span>Actual</span>
                                </div>
                            </div>
                            <div class="card-body" style="padding:16px;">
                                <svg class="bchart" viewBox="0 0 480 180">
                                    <g class="bc-grid">
                                        <line x1="50" y1="20" x2="460" y2="20" />
                                        <line x1="50" y1="55" x2="460" y2="55" />
                                        <line x1="50" y1="90" x2="460" y2="90" />
                                        <line x1="50" y1="125" x2="460" y2="125" />
                                        <line x1="50" y1="160" x2="460" y2="160" />
                                    </g>
                                    <g class="bc-axis">
                                        <text x="42" y="24" text-anchor="end">50</text>
                                        <text x="42" y="59" text-anchor="end">37</text>
                                        <text x="42" y="94" text-anchor="end">25</text>
                                        <text x="42" y="129" text-anchor="end">12</text>
                                        <text x="42" y="164" text-anchor="end">0</text>
                                        <text x="80" y="176" text-anchor="middle">Day 1</text>
                                        <text x="163" y="176" text-anchor="middle">Day 3</text>
                                        <text x="246" y="176" text-anchor="middle">Day 5</text>
                                        <text x="329" y="176" text-anchor="middle">Day 7</text>
                                        <text x="412" y="176" text-anchor="middle">Day 9</text>
                                    </g>
                                    <path class="bc-ideal" d="M80,20 L460,160" />
                                    <path class="bc-area"
                                        d="M80,20 L163,38 L246,64 L329,92 L460,160 L460,160 L329,160 L246,160 L163,160 L80,160 Z" />
                                    <path class="bc-actual" d="M80,20 L163,38 L246,64 L329,92 L412,105" />
                                    <circle cx="80" cy="20" r="4" fill="var(--surface)" stroke="var(--brand)"
                                        stroke-width="2" />
                                    <circle cx="163" cy="38" r="4" fill="var(--surface)" stroke="var(--brand)"
                                        stroke-width="2" />
                                    <circle cx="246" cy="64" r="4" fill="var(--surface)" stroke="var(--brand)"
                                        stroke-width="2" />
                                    <circle cx="329" cy="92" r="4" fill="var(--surface)" stroke="var(--brand)"
                                        stroke-width="2" />
                                    <circle cx="412" cy="105" r="4" fill="var(--brand)" stroke="var(--brand)"
                                        stroke-width="2" />
                                </svg>
                            </div>
                        </div>

                        <!-- TEAM WORKLOAD -->
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <div class="card-title">Team Workload</div>
                                    <div class="card-subtitle">Tasks assigned per member</div>
                                </div>
                                <button class="btn btn-ghost btn-sm">Manage</button>
                            </div>
                            <div class="card-body" style="padding:0 20px;">
                                <div class="member-list">
                                    <div class="member-item">
                                        <div class="member-avatar"
                                            style="background:var(--brand-light);color:var(--brand);">AA</div>
                                        <div class="member-info">
                                            <div class="member-name">Ajay Admin</div>
                                            <div class="member-role">Project Lead</div>
                                        </div>
                                        <div style="flex:1;padding:0 12px;">
                                            <div class="progress-track" style="height:5px;">
                                                <div class="progress-fill" style="width:86%;background:var(--brand)"></div>
                                            </div>
                                        </div>
                                        <div class="member-tasks">
                                            <div class="member-tasks-val">24</div>
                                            <div class="member-tasks-label">tasks</div>
                                        </div>
                                    </div>
                                    <div class="member-item">
                                        <div class="member-avatar" style="background:var(--blue-light);color:var(--blue);">
                                            PS</div>
                                        <div class="member-info">
                                            <div class="member-name">Priya Sharma</div>
                                            <div class="member-role">Network Eng.</div>
                                        </div>
                                        <div style="flex:1;padding:0 12px;">
                                            <div class="progress-track" style="height:5px;">
                                                <div class="progress-fill" style="width:60%;background:var(--blue)"></div>
                                            </div>
                                        </div>
                                        <div class="member-tasks">
                                            <div class="member-tasks-val">17</div>
                                            <div class="member-tasks-label">tasks</div>
                                        </div>
                                    </div>
                                    <div class="member-item">
                                        <div class="member-avatar"
                                            style="background:var(--green-light);color:var(--green);">RM</div>
                                        <div class="member-info">
                                            <div class="member-name">Rahul Mehta</div>
                                            <div class="member-role">Compliance</div>
                                        </div>
                                        <div style="flex:1;padding:0 12px;">
                                            <div class="progress-track" style="height:5px;">
                                                <div class="progress-fill" style="width:46%;background:var(--green)"></div>
                                            </div>
                                        </div>
                                        <div class="member-tasks">
                                            <div class="member-tasks-val">13</div>
                                            <div class="member-tasks-label">tasks</div>
                                        </div>
                                    </div>
                                    <div class="member-item">
                                        <div class="member-avatar"
                                            style="background:var(--purple-light);color:var(--purple);">SK</div>
                                        <div class="member-info">
                                            <div class="member-name">Sunita Kumar</div>
                                            <div class="member-role">UI/UX Design</div>
                                        </div>
                                        <div style="flex:1;padding:0 12px;">
                                            <div class="progress-track" style="height:5px;">
                                                <div class="progress-fill" style="width:75%;background:var(--purple)"></div>
                                            </div>
                                        </div>
                                        <div class="member-tasks">
                                            <div class="member-tasks-val">21</div>
                                            <div class="member-tasks-label">tasks</div>
                                        </div>
                                    </div>
                                    <div class="member-item">
                                        <div class="member-avatar"
                                            style="background:var(--amber-light);color:var(--amber);">VP</div>
                                        <div class="member-info">
                                            <div class="member-name">Vikram Patel</div>
                                            <div class="member-role">Backend Dev</div>
                                        </div>
                                        <div style="flex:1;padding:0 12px;">
                                            <div class="progress-track" style="height:5px;">
                                                <div class="progress-fill" style="width:32%;background:var(--amber)"></div>
                                            </div>
                                        </div>
                                        <div class="member-tasks">
                                            <div class="member-tasks-val">9</div>
                                            <div class="member-tasks-label">tasks</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- /view-overview -->

                <!-- ═══ BOARD VIEW ═══ -->
                <div id="view-board" style="display:none;">
                    <div style="margin-bottom:16px;">
                        <div style="font-size:15px;font-weight:600;color:var(--text-primary);">ISO 27001 Audit — Kanban
                            Board</div>
                        <div style="font-size:12px;color:var(--text-tertiary);margin-top:2px;">Sprint 3 · 14 tasks</div>
                    </div>
                    <div class="kanban-board">

                        <div class="kanban-col">
                            <div class="kanban-col-header">
                                <div class="col-title"><span
                                        style="width:8px;height:8px;border-radius:50%;background:var(--text-tertiary);display:inline-block;"></span>Backlog
                                </div>
                                <div class="col-count">3</div>
                            </div>
                            <div class="kanban-card kc-blue">
                                <div class="kc-tag kct-blue">Research</div>
                                <div class="kc-title">Review ISMS documentation gaps for Clause 6</div>
                                <div class="kc-foot">
                                    <div class="kc-meta">
                                        <div class="kc-meta-item"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                                stroke-width="1.5">
                                                <rect x="2" y="3" width="12" height="11" rx="1" />
                                                <path d="M5 3V1M11 3V1M2 7h12" />
                                            </svg>Apr 22</div>
                                    </div>
                                    <div class="kc-avatar" style="background:var(--blue);">PS</div>
                                </div>
                            </div>
                            <div class="kanban-card kc-purple">
                                <div class="kc-tag kct-purple">Planning</div>
                                <div class="kc-title">Schedule internal audit interviews with dept. heads</div>
                                <div class="kc-foot">
                                    <div class="kc-meta">
                                        <div class="kc-meta-item"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                                stroke-width="1.5">
                                                <rect x="2" y="3" width="12" height="11" rx="1" />
                                                <path d="M5 3V1M11 3V1M2 7h12" />
                                            </svg>Apr 25</div>
                                    </div>
                                    <div class="kc-avatar" style="background:var(--purple);">SK</div>
                                </div>
                            </div>
                            <div class="kanban-card kc-amber">
                                <div class="kc-tag kct-amber">Legal</div>
                                <div class="kc-title">Update data processing agreements — GDPR alignment</div>
                                <div class="kc-foot">
                                    <div class="kc-meta">
                                        <div class="kc-meta-item"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                                stroke-width="1.5">
                                                <rect x="2" y="3" width="12" height="11" rx="1" />
                                                <path d="M5 3V1M11 3V1M2 7h12" />
                                            </svg>Apr 28</div>
                                    </div>
                                    <div class="kc-avatar" style="background:var(--amber);">RM</div>
                                </div>
                            </div>
                        </div>

                        <div class="kanban-col">
                            <div class="kanban-col-header">
                                <div class="col-title"><span
                                        style="width:8px;height:8px;border-radius:50%;background:var(--blue);display:inline-block;"></span>In
                                    Progress</div>
                                <div class="col-count">4</div>
                            </div>
                            <div class="kanban-card kc-brand">
                                <div class="kc-tag kct-brand">Compliance</div>
                                <div class="kc-title">Complete risk assessment matrix for all assets</div>
                                <div class="kc-foot">
                                    <div class="kc-meta">
                                        <div class="kc-meta-item"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                                stroke-width="1.5">
                                                <path d="M3 4h10M3 7h7M3 10h8" />
                                            </svg>8/12</div>
                                        <div class="kc-meta-item"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                                stroke-width="1.5">
                                                <rect x="2" y="3" width="12" height="11" rx="1" />
                                                <path d="M5 3V1M11 3V1M2 7h12" />
                                            </svg>Apr 18</div>
                                    </div>
                                    <div class="kc-avatar" style="background:var(--brand);">AA</div>
                                </div>
                            </div>
                            <div class="kanban-card kc-green">
                                <div class="kc-tag kct-green">Security</div>
                                <div class="kc-title">Penetration test of production environment</div>
                                <div class="kc-foot">
                                    <div class="kc-meta">
                                        <div class="kc-meta-item"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                                stroke-width="1.5">
                                                <rect x="2" y="3" width="12" height="11" rx="1" />
                                                <path d="M5 3V1M11 3V1M2 7h12" />
                                            </svg>Apr 20</div>
                                    </div>
                                    <div class="kc-avatar" style="background:var(--green);">RM</div>
                                </div>
                            </div>
                            <div class="kanban-card kc-blue">
                                <div class="kc-tag kct-blue">Documentation</div>
                                <div class="kc-title">Draft Statement of Applicability (SoA) v2</div>
                                <div class="kc-foot">
                                    <div class="kc-meta">
                                        <div class="kc-meta-item"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                                stroke-width="1.5">
                                                <path d="M3 4h10M3 7h7M3 10h8" />
                                            </svg>3/5</div>
                                    </div>
                                    <div class="kc-avatar" style="background:var(--blue);">PS</div>
                                </div>
                            </div>
                            <div class="kanban-card kc-purple">
                                <div class="kc-tag kct-purple">HR</div>
                                <div class="kc-title">Information security awareness training — batch 2</div>
                                <div class="kc-foot">
                                    <div class="kc-meta">
                                        <div class="kc-meta-item"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                                stroke-width="1.5">
                                                <rect x="2" y="3" width="12" height="11" rx="1" />
                                                <path d="M5 3V1M11 3V1M2 7h12" />
                                            </svg>Apr 19</div>
                                    </div>
                                    <div class="kc-avatar" style="background:var(--purple);">SK</div>
                                </div>
                            </div>
                        </div>

                        <div class="kanban-col">
                            <div class="kanban-col-header">
                                <div class="col-title"><span
                                        style="width:8px;height:8px;border-radius:50%;background:var(--amber);display:inline-block;"></span>In
                                    Review</div>
                                <div class="col-count">4</div>
                            </div>
                            <div class="kanban-card kc-brand">
                                <div class="kc-tag kct-brand">Policy</div>
                                <div class="kc-title">Finalize Information Security Policy document</div>
                                <div class="kc-foot">
                                    <div class="kc-meta">
                                        <div class="kc-meta-item"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                                stroke-width="1.5">
                                                <rect x="2" y="3" width="12" height="11" rx="1" />
                                                <path d="M5 3V1M11 3V1M2 7h12" />
                                            </svg>Apr 14</div>
                                    </div>
                                    <div class="kc-avatar" style="background:var(--brand);">AA</div>
                                </div>
                            </div>
                            <div class="kanban-card kc-green">
                                <div class="kc-tag kct-green">IT</div>
                                <div class="kc-title">Access control review — privileged accounts audit</div>
                                <div class="kc-foot">
                                    <div class="kc-meta">
                                        <div class="kc-meta-item"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                                stroke-width="1.5">
                                                <path d="M3 4h10M3 7h7M3 10h8" />
                                            </svg>5/5</div>
                                    </div>
                                    <div class="kc-avatar" style="background:var(--green);">RM</div>
                                </div>
                            </div>
                            <div class="kanban-card kc-amber">
                                <div class="kc-tag kct-amber">Operations</div>
                                <div class="kc-title">Business continuity plan — BCP draft review</div>
                                <div class="kc-foot">
                                    <div class="kc-meta">
                                        <div class="kc-meta-item"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                                stroke-width="1.5">
                                                <rect x="2" y="3" width="12" height="11" rx="1" />
                                                <path d="M5 3V1M11 3V1M2 7h12" />
                                            </svg>Apr 16</div>
                                    </div>
                                    <div class="kc-avatar" style="background:var(--amber);">VP</div>
                                </div>
                            </div>
                        </div>

                        <div class="kanban-col">
                            <div class="kanban-col-header">
                                <div class="col-title"><span
                                        style="width:8px;height:8px;border-radius:50%;background:var(--green);display:inline-block;"></span>Done
                                </div>
                                <div class="col-count">3</div>
                            </div>
                            <div class="kanban-card kc-green" style="opacity:0.7;">
                                <div class="kc-tag kct-green">Setup</div>
                                <div class="kc-title" style="text-decoration:line-through;color:var(--text-tertiary);">
                                    Project kick-off and team briefing</div>
                                <div class="kc-foot">
                                    <div class="kc-meta">
                                        <div class="kc-meta-item" style="color:var(--green);">✓ Completed</div>
                                    </div>
                                    <div class="kc-avatar" style="background:var(--brand);">AA</div>
                                </div>
                            </div>
                            <div class="kanban-card kc-blue" style="opacity:0.7;">
                                <div class="kc-tag kct-blue">Audit</div>
                                <div class="kc-title" style="text-decoration:line-through;color:var(--text-tertiary);">Gap
                                    analysis — current vs ISO 27001:2022</div>
                                <div class="kc-foot">
                                    <div class="kc-meta">
                                        <div class="kc-meta-item" style="color:var(--green);">✓ Completed</div>
                                    </div>
                                    <div class="kc-avatar" style="background:var(--blue);">PS</div>
                                </div>
                            </div>
                            <div class="kanban-card kc-purple" style="opacity:0.7;">
                                <div class="kc-tag kct-purple">Scope</div>
                                <div class="kc-title" style="text-decoration:line-through;color:var(--text-tertiary);">
                                    Define ISMS scope and boundaries</div>
                                <div class="kc-foot">
                                    <div class="kc-meta">
                                        <div class="kc-meta-item" style="color:var(--green);">✓ Completed</div>
                                    </div>
                                    <div class="kc-avatar" style="background:var(--purple);">SK</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- /view-board -->

                <!-- ═══ TASKS VIEW ═══ -->
                <div id="view-tasks" style="display:none;">
                    <div class="dual-grid">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <div class="card-title">My Tasks</div>
                                    <div class="card-subtitle">Assigned to you across all projects</div>
                                </div>
                                <button class="btn btn-brand btn-sm" onclick="openNewTask()">+ Add Task</button>
                            </div>
                            <div class="card-body" style="padding:0 20px;">
                                <div class="task-list" id="taskList">
                                    <div class="task-item">
                                        <div class="task-cb" onclick="toggleTask(this)"></div>
                                        <div class="task-text">
                                            <div class="task-name">Complete risk assessment matrix for all assets</div>
                                            <div class="task-proj">ISO 27001 Audit Prep</div>
                                        </div>
                                        <div class="task-right">
                                            <div class="priority-dot p-high"></div>
                                            <div class="task-due overdue">Apr 12</div>
                                        </div>
                                    </div>
                                    <div class="task-item">
                                        <div class="task-cb" onclick="toggleTask(this)"></div>
                                        <div class="task-text">
                                            <div class="task-name">Finalize Information Security Policy document</div>
                                            <div class="task-proj">ISO 27001 Audit Prep</div>
                                        </div>
                                        <div class="task-right">
                                            <div class="priority-dot p-high"></div>
                                            <div class="task-due">Apr 14</div>
                                        </div>
                                    </div>
                                    <div class="task-item">
                                        <div class="task-cb" onclick="toggleTask(this)"></div>
                                        <div class="task-text">
                                            <div class="task-name">Review incident response procedures with security team
                                            </div>
                                            <div class="task-proj">Security Patch Rollout</div>
                                        </div>
                                        <div class="task-right">
                                            <div class="priority-dot p-med"></div>
                                            <div class="task-due">Apr 17</div>
                                        </div>
                                    </div>
                                    <div class="task-item">
                                        <div class="task-cb" onclick="toggleTask(this)"></div>
                                        <div class="task-text">
                                            <div class="task-name">Conduct kickoff meeting for HR Onboarding project</div>
                                            <div class="task-proj">HR Onboarding Flow</div>
                                        </div>
                                        <div class="task-right">
                                            <div class="priority-dot p-low"></div>
                                            <div class="task-due">Apr 21</div>
                                        </div>
                                    </div>
                                    <div class="task-item">
                                        <div class="task-cb done" onclick="toggleTask(this)"></div>
                                        <div class="task-text">
                                            <div class="task-name done">Define ISMS scope and boundaries document</div>
                                            <div class="task-proj">ISO 27001 Audit Prep</div>
                                        </div>
                                        <div class="task-right">
                                            <div class="priority-dot p-high"></div>
                                            <div class="task-due">Apr 8</div>
                                        </div>
                                    </div>
                                    <div class="task-item">
                                        <div class="task-cb done" onclick="toggleTask(this)"></div>
                                        <div class="task-text">
                                            <div class="task-name done">Project kick-off and team briefing session</div>
                                            <div class="task-proj">ISO 27001 Audit Prep</div>
                                        </div>
                                        <div class="task-right">
                                            <div class="priority-dot p-med"></div>
                                            <div class="task-due">Apr 5</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <div class="card-title">Upcoming Deadlines</div>
                                    <div class="card-subtitle">Next 14 days</div>
                                </div>
                            </div>
                            <div class="card-body" style="padding:0 20px;">
                                <div class="task-list">
                                    <div class="task-item">
                                        <div style="width:42px;flex-shrink:0;text-align:center;">
                                            <div style="font-size:16px;font-weight:600;color:var(--red);line-height:1;">13
                                            </div>
                                            <div style="font-size:10px;color:var(--text-tertiary);">APR</div>
                                        </div>
                                        <div class="task-text">
                                            <div class="task-name">Risk assessment matrix</div>
                                            <div class="task-proj">ISO 27001 Audit</div>
                                        </div><span class="pill pill-red" style="flex-shrink:0;">
                                            <div class="pill-dot"></div>Overdue
                                        </span>
                                    </div>
                                    <div class="task-item">
                                        <div style="width:42px;flex-shrink:0;text-align:center;">
                                            <div style="font-size:16px;font-weight:600;color:var(--brand);line-height:1;">14
                                            </div>
                                            <div style="font-size:10px;color:var(--text-tertiary);">APR</div>
                                        </div>
                                        <div class="task-text">
                                            <div class="task-name">Security policy document</div>
                                            <div class="task-proj">ISO 27001 Audit</div>
                                        </div><span class="pill pill-amber" style="flex-shrink:0;">
                                            <div class="pill-dot"></div>Tomorrow
                                        </span>
                                    </div>
                                    <div class="task-item">
                                        <div style="width:42px;flex-shrink:0;text-align:center;">
                                            <div
                                                style="font-size:16px;font-weight:600;color:var(--text-primary);line-height:1;">
                                                15</div>
                                            <div style="font-size:10px;color:var(--text-tertiary);">APR</div>
                                        </div>
                                        <div class="task-text">
                                            <div class="task-name">Portal design handoff</div>
                                            <div class="task-proj">Portal Redesign v3</div>
                                        </div><span class="pill pill-blue" style="flex-shrink:0;">
                                            <div class="pill-dot"></div>In 2 days
                                        </span>
                                    </div>
                                    <div class="task-item">
                                        <div style="width:42px;flex-shrink:0;text-align:center;">
                                            <div
                                                style="font-size:16px;font-weight:600;color:var(--text-primary);line-height:1;">
                                                18</div>
                                            <div style="font-size:10px;color:var(--text-tertiary);">APR</div>
                                        </div>
                                        <div class="task-text">
                                            <div class="task-name">Pen test report submission</div>
                                            <div class="task-proj">Security Patch Rollout</div>
                                        </div><span class="pill pill-gray" style="flex-shrink:0;">
                                            <div class="pill-dot"></div>5 days
                                        </span>
                                    </div>
                                    <div class="task-item">
                                        <div style="width:42px;flex-shrink:0;text-align:center;">
                                            <div
                                                style="font-size:16px;font-weight:600;color:var(--text-primary);line-height:1;">
                                                22</div>
                                            <div style="font-size:10px;color:var(--text-tertiary);">APR</div>
                                        </div>
                                        <div class="task-text">
                                            <div class="task-name">ISMS documentation gaps</div>
                                            <div class="task-proj">ISO 27001 Audit</div>
                                        </div><span class="pill pill-gray" style="flex-shrink:0;">
                                            <div class="pill-dot"></div>9 days
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /view-tasks -->

                <!-- ═══ TIMELINE VIEW ═══ -->
                <div id="view-timeline" style="display:none;">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <div class="card-title">Project Timeline</div>
                                <div class="card-subtitle">Milestones and key deliverables — Q1/Q2 2026</div>
                            </div>
                            <button class="btn btn-outline btn-sm">
                                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M8 10V2M4 7l4 4 4-4M2 13h12" stroke-linecap="round" />
                                </svg>
                                Export
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="timeline-row">
                                <div class="tl-item">
                                    <div class="tl-left">
                                        <div class="tl-date">Apr 5</div>
                                        <div class="tl-time">9:00 AM</div>
                                    </div>
                                    <div class="tl-line">
                                        <div class="tl-dot" style="background:var(--green);"></div>
                                        <div class="tl-thread"></div>
                                    </div>
                                    <div class="tl-content">
                                        <div class="tl-title">Project Kickoff — ISO 27001 Audit Prep</div>
                                        <div class="tl-desc">Team briefing completed. Scope defined across 6 departments.
                                            All stakeholders aligned on timeline and deliverables.</div>
                                        <div class="tl-tags"><span class="tl-tag"
                                                style="background:var(--green-light);color:var(--green);">✓
                                                Completed</span><span class="tl-tag">ISO 27001</span><span
                                                class="tl-tag">Kick-off</span></div>
                                    </div>
                                </div>
                                <div class="tl-item">
                                    <div class="tl-left">
                                        <div class="tl-date">Apr 8</div>
                                        <div class="tl-time">2:00 PM</div>
                                    </div>
                                    <div class="tl-line">
                                        <div class="tl-dot" style="background:var(--green);"></div>
                                        <div class="tl-thread"></div>
                                    </div>
                                    <div class="tl-content">
                                        <div class="tl-title">Gap Analysis Completed</div>
                                        <div class="tl-desc">Current controls mapped against ISO 27001:2022. 14 gaps
                                            identified across Annex A controls. Remediation roadmap drafted.</div>
                                        <div class="tl-tags"><span class="tl-tag"
                                                style="background:var(--green-light);color:var(--green);">✓
                                                Completed</span><span class="tl-tag">Audit</span></div>
                                    </div>
                                </div>
                                <div class="tl-item">
                                    <div class="tl-left">
                                        <div class="tl-date">Apr 13</div>
                                        <div class="tl-time">Today</div>
                                    </div>
                                    <div class="tl-line">
                                        <div class="tl-dot"
                                            style="background:var(--brand);border:2px solid var(--brand-muted);width:12px;height:12px;margin-top:2px;">
                                        </div>
                                        <div class="tl-thread"></div>
                                    </div>
                                    <div class="tl-content">
                                        <div class="tl-title" style="color:var(--brand);">Risk Assessment Deadline ← Today
                                        </div>
                                        <div class="tl-desc">Risk assessment matrix due. 8 of 12 assets completed. 4
                                            remaining — escalation required if not submitted by EOD.</div>
                                        <div class="tl-tags"><span class="tl-tag"
                                                style="background:var(--red-light);color:var(--red);">Overdue</span><span
                                                class="tl-tag">Risk</span><span class="tl-tag">ISO 27001</span></div>
                                    </div>
                                </div>
                                <div class="tl-item">
                                    <div class="tl-left">
                                        <div class="tl-date">Apr 15</div>
                                        <div class="tl-time">5:00 PM</div>
                                    </div>
                                    <div class="tl-line">
                                        <div class="tl-dot" style="background:var(--blue);"></div>
                                        <div class="tl-thread"></div>
                                    </div>
                                    <div class="tl-content">
                                        <div class="tl-title">Portal Redesign — Design Handoff</div>
                                        <div class="tl-desc">Final Figma components and design tokens handed off to
                                            development. UAT to begin Apr 18.</div>
                                        <div class="tl-tags"><span class="tl-tag">Portal Redesign</span><span
                                                class="tl-tag">Design</span></div>
                                    </div>
                                </div>
                                <div class="tl-item">
                                    <div class="tl-left">
                                        <div class="tl-date">Apr 20</div>
                                        <div class="tl-time">EOD</div>
                                    </div>
                                    <div class="tl-line">
                                        <div class="tl-dot" style="background:var(--amber);"></div>
                                        <div class="tl-thread"></div>
                                    </div>
                                    <div class="tl-content">
                                        <div class="tl-title">Penetration Test Report Submission</div>
                                        <div class="tl-desc">External security firm to deliver pen-test findings.
                                            Remediation tickets to be created within 48 hours of receipt.</div>
                                        <div class="tl-tags"><span class="tl-tag">Security</span><span class="tl-tag">Patch
                                                Rollout</span></div>
                                    </div>
                                </div>
                                <div class="tl-item">
                                    <div class="tl-left">
                                        <div class="tl-date">Apr 30</div>
                                        <div class="tl-time">EOD</div>
                                    </div>
                                    <div class="tl-line">
                                        <div class="tl-dot" style="background:var(--purple);"></div>
                                        <div class="tl-thread"></div>
                                    </div>
                                    <div class="tl-content">
                                        <div class="tl-title">ISO 27001 Audit — Internal Review Complete</div>
                                        <div class="tl-desc">All evidence collected. Internal audit report drafted and
                                            submitted to CISO for sign-off. External audit scheduled May 15.</div>
                                        <div class="tl-tags"><span class="tl-tag">ISO 27001</span><span
                                                class="tl-tag">Milestone</span><span class="tl-tag">Review</span></div>
                                    </div>
                                </div>
                                <div class="tl-item">
                                    <div class="tl-left">
                                        <div class="tl-date">May 15</div>
                                        <div class="tl-time">10:00 AM</div>
                                    </div>
                                    <div class="tl-line">
                                        <div class="tl-dot" style="background:var(--brand);"></div>
                                    </div>
                                    <div class="tl-content">
                                        <div class="tl-title">External ISO 27001 Certification Audit</div>
                                        <div class="tl-desc">Certification body (BSI) on-site audit. 2-day process. Stage 2
                                            audit. Certification decision expected within 4 weeks.</div>
                                        <div class="tl-tags"><span class="tl-tag"
                                                style="background:var(--brand-light);color:var(--brand);">Key
                                                Milestone</span><span class="tl-tag">ISO 27001</span><span
                                                class="tl-tag">External</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /view-timeline -->

            </div><!-- /content -->
        </main>
    

    <!-- TOAST -->
   
@if(!request()->ajax())
    @endsection
@endif