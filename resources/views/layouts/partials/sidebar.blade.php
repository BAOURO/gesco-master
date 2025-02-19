<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">GESCO <sup>ENSAI</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Nav::isRoute('home') }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
   {{--  <div class="sidebar-heading">
        {{ __('Settings') }}
    </div> --}}

    <!-- Nav Item - Profile -->
    <li class="nav-item {{ Nav::isRoute('profile') }}">
        <a class="nav-link" href="{{ route('profile') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>{{ __('Profile') }}</span>
        </a>
    </li>
    
    <li class="nav-item {{ Nav::isRoute('enseignants.index') }}">
        <a class="nav-link" href="{{ route('enseignants.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{ __('Enseignants') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Nav::isRoute('modules.index') }}">
        <a class="nav-link" href="{{ route('modules.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{ __('Modules') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Nav::isRoute('unites.index') }}">
        <a class="nav-link" href="{{route('unites.index')}}">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{ __('UE') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Nav::isRoute('etudiants.index') }}">
        <a class="nav-link" href="{{ route('etudiants.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{ __('Etudiants') }}</span>
        </a>
    </li>
    
    <li class="nav-item {{ Nav::isRoute('annees.index') }}">
        <a class="nav-link" href="{{ route('annees.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{ __('Annees') }}</span>
        </a>
    </li>

    <li class="nav-item {{ Nav::isRoute('cycles.index') }}">
        <a class="nav-link" href="{{ route('cycles.index') }}">
            <i class="fas fa-fw fa-folder "></i>
            <span>{{ __('Cycles') }}</span>
        </a>
    </li>

    <li class="nav-item {{ Nav::isRoute('mentions.index') }}">
        <a class="nav-link" href="{{route('mentions.index')}}">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{ __('Mentions') }}</span>
        </a>
    </li>

    <li class="nav-item {{ Nav::isRoute('parcours.index') }}">
        <a class="nav-link" href="{{route('parcours.index')}}">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{ __('Parcours') }}</span>
        </a>
    </li>

    <li class="nav-item {{ Nav::isRoute('niveaux.index') }}">
        <a class="nav-link" href="{{route('niveaux.index')}}">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{ __('Niveaux') }}</span>
        </a>
    </li>

    <li class="nav-item {{ Nav::isRoute('inscriptions.index') }}">
        <a class="nav-link" href="{{route('inscriptions.index')}}">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{ __('Inscriptions') }}</span>
        </a>
    </li>

    <li class="nav-item {{ Nav::isRoute('about') }}">
        <a class="nav-link" href="{{ route('about') }}">
            <i class="fas fa-fw fa-hands-helping"></i>
            <span>{{ __('A propos') }}</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>