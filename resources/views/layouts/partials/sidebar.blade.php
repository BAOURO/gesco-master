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

    <!-- Nav Item - About -->
    <li class="nav-item {{ Nav::isRoute('about') }}">
        <a class="nav-link" href="{{ route('about') }}">
            <i class="fas fa-fw fa-hands-helping"></i>
            <span>{{ __('About') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Etudiants</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Ajouter</a>
                <a class="collapse-item" href="{{ route('inscriptions.niveau') }}">Inscription niveau</a>
                <a class="collapse-item" href="forgot-password.html">Inscription Evaluation</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>
    <li class="nav-item {{ Nav::isRoute('cycles.index') }}">
        <a class="nav-link" href="{{ route('cycles.index') }}">
            <i class="fas fa-fw fa-briefcase "></i>
            <span>{{ __('Cycles') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Nav::isRoute('mentions.index') }}">
        <a class="nav-link" href="{{route('mentions.index')}}">
            <i class="fas fa-fw fa-hands-helping"></i>
            <span>{{ __('Mentions') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Nav::isRoute('parcours.index') }}">
        <a class="nav-link" href="{{route('parcours.index')}}">
            <i class="fas fa-fw fa-sitemap"></i>
            <span>{{ __('Parcours') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Nav::isRoute('niveaux.index') }}">
        <a class="nav-link" href="{{route('niveaux.index')}}">
            <i class="fas fa-fw fa-building-o "></i>
            <span>{{ __('Niveaux') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Nav::isRoute('niveaux.index') }}">
        <a class="nav-link" href="{{route('notes.index')}}">
            <i class="fas fa-fw fa-list"></i>
            <span>{{ __('Notes') }}</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>