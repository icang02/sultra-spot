<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ route('dashboard') }}" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="{{ asset('sneat/img/favicon/logo.png') }}" alt="logo" width="32">
      </span>
      <span class="app-brand-text demo menu-text fw-bolder ms-2">SultraSpot</span>
    </a>

    <a href="#" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none color-primary-bg">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
      <a href="{{ route('dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle {{ request()->is('dashboard') ? 'color-primary' : '' }}"></i>
        <div data-i18n="Analytics" class="{{ request()->is('dashboard') ? 'color-primary' : '' }}">Dashboard</div>
      </a>
    </li>

    <!-- Profile -->
    <li class="menu-item {{ request()->is('profile') ? 'active' : '' }}">
      <a href="{{ route('profile') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-user-account {{ request()->is('profile') ? 'color-primary' : '' }}"></i>
        <div data-i18n="Analytics" class="{{ request()->is('profile') ? 'color-primary' : '' }}">Profile</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">User Account</span>
    </li>

    @php
      $icon = ['<i class="menu-icon tf-icons bx bx-dock-top"></i>', '<i class="menu-icon tf-icons bx bx-lock-open-alt"></i>', '<i class="menu-icon tf-icons bx bx-cube-alt"></i>'];
    @endphp
    @foreach ($roles as $key => $role)
      <li class="menu-item {{ request()->is($role->name . '*') ? 'active' : '' }}">
        <a href="{{ url($role->name) }}" class="menu-link {{ request()->is($role->name) ? 'color-primary' : '' }}">
          {!! $icon[$key] !!}
          <div data-i18n="Analytics"> {{ str()->title($role->name) }} </div>
        </a>
      </li>
    @endforeach

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Wisata % Event</span>
    </li>
    <li class="menu-item {{ Route::has('p') ? 'active' : '' }}">
      <a href="index.html" class="menu-link">
        <i class="menu-icon tf-icons bx bx-collection"></i>
        <div data-i18n="Analytics">Wisata</div>
      </a>
    </li>
    <li class="menu-item {{ Route::has('p') ? 'active' : '' }}">
      <a href="index.html" class="menu-link">
        <i class="menu-icon tf-icons bx bx-crown"></i>
        <div data-i18n="Analytics">Event</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase"></li>
  </ul>
</aside>
