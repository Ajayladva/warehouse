<!-- TOPNAV -->


<aside class="sidebar">
    <div class="sidebar-section">
        {{-- ── User Profile ── --}}

        <div class="section-label">Menuitem</div>
        @foreach($menuItems as $item)
            <a href="{{ route($item->route_name) }}" data-spa
                class="nav-item  {{ request()->routeIs($item->route_name) ? 'active' : '' }}" href="#">
                <i class="{{ $item->icon }}" aria-hidden="true"></i>
                {{ $item->label }}
            </a>
        @endforeach
    </div>


    @auth
        <div class="sidebar-bottom">
            <div class="user-card">
                <div class="avatar" style="width:34px;height:34px;font-size:12px;">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <div>
                    <div class="user-card-name">{{ Auth::user()->name }}</div>
                    <div class="user-card-role">{{ Auth::user()->email }}</div>
                </div>
            </div>
        </div>
    @endauth
</aside>