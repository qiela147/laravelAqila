
<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
    <a class="navbar-brand me-lg-5" href="{{ url('/') }}">
        <img class="navbar-brand-dark" src="{{ asset('assets-admin/img/brand/light.svg') }}" alt="Volt logo" />
        <img class="navbar-brand-light" src="{{ asset('assets-admin/img/brand/dark.svg') }}" alt="Volt logo" />
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-lg-none collapsed" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">

        <div class="user-card d-flex d-md-none align-items-center justify-content-between pb-4">
            <div class="d-flex align-items-center">
                <div class="avatar-lg me-4">
                    <img src="{{ asset('assets-admin/img/team/profile-picture-3.jpg') }}"
                        class="card-img-top rounded-circle border-white" alt="Profile">
                </div>
                <div class="d-block">
                    <h2 class="h5 mb-3">Hi, User</h2>
                </div>
            </div>
            <div class="collapse-close d-md-none">
                <a href="#sidebarMenu" data-bs-toggle="collapse"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                    aria-expanded="true" aria-label="Toggle navigation">
                    <i class="fas fa-times"></i>
                </a>
            </div>
        </div>

        <ul class="nav flex-column pt-3 pt-md-0">

            <!-- Volt Overview -->
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link d-flex align-items-center">
                    <span class="sidebar-icon">
                        <img src="{{ asset('assets-admin/img/brand/light.svg') }}"
                            height="20" width="20" alt="Volt Logo">
                    </span>
                    <span class="mt-1 ms-1 sidebar-text">Volt Overview</span>
                </a>
            </li>

            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ url('/dashboard') }}"
                    class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="sidebar-icon">
                        <i class="fas fa-chart-pie"></i>
                    </span>
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>

            <!-- Pelanggan -->
            <li class="nav-item">
                <a href="{{ route('pelanggan.index') }}"
                    class="nav-link {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
                    <span class="sidebar-icon">
                        <i class="fas fa-users"></i>
                    </span>
                    <span class="sidebar-text">Pelanggan</span>
                </a>
            </li>

            <!-- User -->
            <li class="nav-item">
                <a href="{{ route('user.index') }}"
                    class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}">
                    <span class="sidebar-icon">
                        <i class="fas fa-user"></i>
                    </span>
                    <span class="sidebar-text">User</span>
                </a>
            </li>

            <!-- Tables -->
            <li class="nav-item">
                <span class="nav-link collapsed d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-app">
                    <span>
                        <span class="sidebar-icon">
                            <i class="fas fa-table"></i>
                        </span>
                        <span class="sidebar-text">Tables</span>
                    </span>
                    <span class="link-arrow">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </span>

                <div class="multi-level collapse" role="list" id="submenu-app"
                    aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-text">Bootstrap Tables</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>

            <!-- Documentation -->
            <li class="nav-item">
                <a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/getting-started/quick-start/"
                    target="_blank" class="nav-link d-flex align-items-center">
                    <span class="sidebar-icon">
                        <i class="fas fa-question-circle"></i>
                    </span>
                    <span class="sidebar-text">
                        Documentation
                        <span class="badge badge-sm bg-secondary ms-1 text-gray-800">v1.4</span>
                    </span>
                </a>
            </li>

            <!-- Upgrade to Pro -->
            <li class="nav-item">
                <a href="../../pages/upgrade-to-pro.html"
                    class="btn btn-secondary d-flex align-items-center justify-content-center btn-upgrade-pro">
                    <span class="sidebar-icon d-inline-flex align-items-center justify-content-center">
                        <i class="fas fa-fire"></i>
                    </span>
                    <span>Upgrade to Pro</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
