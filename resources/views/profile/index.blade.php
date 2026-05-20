@if(!request()->ajax())
@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
@endif

<style>
* { box-sizing: border-box; margin: 0; padding: 0; }

.profile-page { max-width: 900px; margin: 0 auto; padding: 2rem 1rem; font-family: 'Inter', sans-serif; }

/* Alert */
.alert { display: flex; align-items: center; gap: 10px; padding: 12px 16px; border-radius: 12px; font-size: 14px; margin-bottom: 1rem; }
.alert-success { background: #f0fdf4; border: 1.5px solid #bbf7d0; color: #15803d; }
.alert-error   { background: #fef2f2; border: 1.5px solid #fecaca; color: #dc2626; }

/* User Bar */
.user-bar { display: flex; align-items: center; gap: 16px; background: #fff; border: 1px solid #e5e7eb; border-radius: 16px; padding: 1rem 1.25rem; margin-bottom: 1.25rem; }
.avatar { width: 56px; height: 56px; border-radius: 50%; background: #dbeafe; display: flex; align-items: center; justify-content: center; font-size: 18px; font-weight: 700; color: #2563eb; flex-shrink: 0; }
.user-name  { font-size: 15px; font-weight: 600; color: #111827; }
.user-email { font-size: 13px; color: #6b7280; margin-top: 2px; }
.badge { font-size: 11px; font-weight: 600; padding: 3px 10px; border-radius: 99px; background: #dcfce7; color: #15803d; border: 1px solid #bbf7d0; white-space: nowrap; }

/* Grid */
.cards-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1rem; }

/* Card */
.card { background: #fff; border: 1px solid #e5e7eb; border-radius: 16px; padding: 1.5rem; }
.card-header { display: flex; align-items: center; gap: 10px; margin-bottom: 1.25rem; }
.card-icon { width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.card-icon svg { width: 18px; height: 18px; }
.card-icon.blue { background: #dbeafe; color: #2563eb; }
.card-icon.green { background: #dcfce7; color: #15803d; }
.card-title { font-size: 15px; font-weight: 600; color: #111827; }

/* Section label */
.section-label { font-size: 11px; font-weight: 600; letter-spacing: .07em; text-transform: uppercase; color: #9ca3af; margin-bottom: 1rem; }

/* Fields */
.field { margin-bottom: 1rem; }
.field label { display: block; font-size: 13px; font-weight: 500; color: #374151; margin-bottom: 6px; }
.input-wrap { position: relative; }
.input-wrap .input-icon { position: absolute; left: 11px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #9ca3af; display: flex; }
.input-wrap .input-icon svg { width: 16px; height: 16px; }
.form-input {
    width: 100%;
    padding: 10px 12px 10px 38px;
    font-size: 14px;
    color: #111827;
    background: #f9fafb;
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    outline: none;
    transition: border-color .15s, background .15s, box-shadow .15s;
    -webkit-appearance: none;
    appearance: none;
}
.form-input:focus { border-color: #3b82f6; background: #fff; box-shadow: 0 0 0 3px rgba(59,130,246,.12); }
.form-input.green:focus { border-color: #22c55e; box-shadow: 0 0 0 3px rgba(34,197,94,.12); }
.form-input::placeholder { color: #d1d5db; }

/* Divider */
.divider { border: none; border-top: 1px solid #f3f4f6; margin: 1.25rem 0; }

/* Buttons */
.btn { display: inline-flex; align-items: center; gap: 7px; padding: 9px 20px; border-radius: 10px; font-size: 14px; font-weight: 500; border: none; cursor: pointer; transition: background .15s, transform .1s; }
.btn:active { transform: scale(0.97); }
.btn svg { width: 16px; height: 16px; }
.btn-blue  { background: #2563eb; color: #fff; }
.btn-blue:hover  { background: #1d4ed8; }
.btn-green { background: #15803d; color: #fff; }
.btn-green:hover { background: #166534; }
.btn-danger { background: #fff; color: #dc2626; border: 1.5px solid #fca5a5; }
.btn-danger:hover { background: #fef2f2; }

/* Logout card */
.logout-card { background: #fff; border: 1px solid #e5e7eb; border-radius: 16px; padding: 1.25rem 1.5rem; margin-top: 1rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }
.logout-title { font-size: 14px; font-weight: 600; color: #111827; }
.logout-sub   { font-size: 13px; color: #6b7280; margin-top: 3px; }
</style>

<div class="profile-page">

    {{-- Success Alert --}}
    @if(session('success'))
    <div class="alert alert-success">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:18px;height:18px;flex-shrink:0">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    {{-- Error Alert --}}
    @if(session('error'))
    <div class="alert alert-error">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:18px;height:18px;flex-shrink:0">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        {{ session('error') }}
    </div>
    @endif

    {{-- User Bar --}}
    <div class="user-bar">
        <div class="avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
        </div>
        <div style="flex:1;min-width:0">
            <div class="user-name">{{ auth()->user()->name }}</div>
            <div class="user-email">{{ auth()->user()->email }}</div>
        </div>
        <span class="badge">✓ Active</span>
    </div>

    <div class="cards-grid">

        {{-- Update Profile --}}
        <div class="card">
            <div class="card-header">
                <div class="card-icon blue">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <span class="card-title">Update profile</span>
            </div>

            <div class="section-label">Personal information</div>

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf

                <div class="field">
                    <label for="name">Full name</label>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </span>
                        <input type="text" id="name" name="name"
                            value="{{ old('name', auth()->user()->name) }}"
                            placeholder="Your full name"
                            class="form-input @error('name') border-red-400 @enderror">
                    </div>
                    @error('name')
                        <p style="color:#dc2626;font-size:12px;margin-top:4px">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="email">Email address</label>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </span>
                        <input type="email" id="email" name="email"
                            value="{{ old('email', auth()->user()->email) }}"
                            placeholder="you@example.com"
                            class="form-input @error('email') border-red-400 @enderror">
                    </div>
                    @error('email')
                        <p style="color:#dc2626;font-size:12px;margin-top:4px">{{ $message }}</p>
                    @enderror
                </div>

                <hr class="divider">

                <button type="submit" class="btn btn-blue">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Save changes
                </button>
            </form>
        </div>

        {{-- Change Password --}}
        <div class="card">
            <div class="card-header">
                <div class="card-icon green">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <span class="card-title">Change password</span>
            </div>

            <div class="section-label">Security</div>

            <form action="{{ route('password.change') }}" method="POST">
                @csrf

                <div class="field">
                    <label for="current_password">Current password</label>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </span>
                        <input type="password" id="current_password" name="current_password"
                            placeholder="Enter current password"
                            class="form-input green @error('current_password') border-red-400 @enderror">
                    </div>
                    @error('current_password')
                        <p style="color:#dc2626;font-size:12px;margin-top:4px">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="new_password">New password</label>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                            </svg>
                        </span>
                        <input type="password" id="new_password" name="new_password"
                            placeholder="At least 8 characters"
                            class="form-input green @error('new_password') border-red-400 @enderror">
                    </div>
                    @error('new_password')
                        <p style="color:#dc2626;font-size:12px;margin-top:4px">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="new_password_confirmation">Confirm new password</label>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                            </svg>
                        </span>
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                            placeholder="Repeat new password"
                            class="form-input green">
                    </div>
                </div>

                <hr class="divider">

                <button type="submit" class="btn btn-green">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    Update password
                </button>
            </form>
        </div>

    </div>

    {{-- Logout --}}
    <div class="logout-card">
        <div>
            <div class="logout-title">Sign out of your account</div>
            <div class="logout-sub">You'll need to log in again to access your dashboard.</div>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:16px;height:16px">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Sign out
            </button>
        </form>
    </div>

</div>

@if(!request()->ajax())
    @endsection
@endif