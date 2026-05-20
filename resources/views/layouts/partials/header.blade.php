<!-- TOPNAV -->
<nav class="topnav">
  <a href="#" class="nav-logo">
    <div class="logo-icon">
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
        <path d="M3 2h7l3 3v9H3V2z" fill="white" fill-opacity="0.9" />
        <path d="M10 2v3h3" stroke="white" stroke-width="1.2" stroke-linejoin="round" />
        <path d="M5 7h6M5 9.5h6M5 12h4" stroke="#E8441A" stroke-width="1.2" stroke-linecap="round" />
      </svg>
    </div>
    DocFlow
  </a>
  <div class="nav-divider-v"></div>
  <span class="nav-crumb"><strong>Projects</strong></span>
  <div class="nav-spacer"></div>
  <div class="nav-search">
    <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
      <circle cx="7" cy="7" r="5" />
      <path d="M12 12l2 2" stroke-linecap="round" />
    </svg>
    Search projects, tasks…
  </div>

  <div class="flex items-center gap-3">


    <!-- Settings Dropdown -->
    <div class="flex items-center gap-4">

      <!-- Notification -->
      <button class="relative flex items-center justify-center w-10 h-10 rounded-xl hover:bg-slate-100 transition">
        <svg class="w-5 h-5 text-slate-600" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
          <path d="M8 2a4 4 0 014 4v3l1 2H3l1-2V6a4 4 0 014-4zM6.5 13.5a1.5 1.5 0 003 0" />
        </svg>

        <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-red-500 ring-2 ring-white"></span>
      </button>

      <!-- Theme -->
      <button class="flex items-center justify-center w-10 h-10 rounded-xl hover:bg-slate-100 transition">
        <svg class="w-5 h-5 text-slate-600" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
          <circle cx="8" cy="8" r="2.5" />
          <path d="M8 1v2M8 13v2M1 8h2M13 8h2M3.2 3.2l1.4 1.4M11.4 11.4l1.4 1.4M11.4 3.2l-1.4 1.4M4.6 11.4L3.2 12.8" />
        </svg>
      </button>

      <!-- Divider -->
      <div class="h-8 w-px bg-slate-200"></div>

      <!-- Profile + Dropdown -->
      <div class="relative group">
        <button class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-slate-100 transition">

          <!-- Avatar -->
          <div
            class="w-10 h-10 rounded-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-semibold flex items-center justify-center shadow-sm">
            AA
          </div>

          <!-- User -->
          <div class="hidden md:block text-left">
            <p class="text-sm font-semibold text-slate-800 leading-none">
              Ajay Admin
            </p>
            <span class="text-xs text-slate-500">
              Administrator
            </span>
          </div>

          <!-- Arrow -->
          <svg class="w-4 h-4 text-slate-500 transition-transform group-hover:rotate-180" fill="none"
            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M19 9l-7 7-7-7"></path>
          </svg>
        </button>

        <!-- Dropdown -->
        <div
          class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-slate-100 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200 z-50">

          <div class="p-3 border-b border-slate-100">
            <p class="text-sm font-semibold text-slate-800">
              Ajay Admin
            </p>
            <p class="text-xs text-slate-500">
              admin@example.com
            </p>
          </div>

          <div class="p-2">
            <a href="{{ route('profile') }}" data-spa
              class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm text-slate-700 hover:bg-slate-100 transition">
              👤 Profile
            </a>

            <a href="{{ route('logout') }}" 
              class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm text-red-500 hover:bg-red-50 transition">
              🚪 Logout
            </a>
          </div>
        </div>
      </div>

    </div>

  </div>
</nav>