@if(!request()->ajax())
    @extends('layouts.app')
    @section('title', 'Dashboard')
    @section('content')
@endif

    <!-- ═══ TIMELINE VIEW ═══ -->
    <div id="view-timeline">
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
@if(!request()->ajax())
    @endsection
@endif