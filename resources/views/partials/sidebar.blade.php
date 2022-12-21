<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ Request::routeIs('home') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#client-manager" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Clients Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="client-manager">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Update Database</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Patients List</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Appointments</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Custom SMS</a>
                    </li>
                </ul>
            </div>
        </li>
        @can('isDataClerk')
            <li class="nav-item">
                <a class="nav-link">
                    <i class="ti-settings menu-icon"></i>
                    <span class="menu-title">Facility Management</span>
                </a>
            </li>
        @endcan
        @can('isAdmin')
            <li class="nav-item" {{ Request::routeIs('users') ? 'active' : '' }}>
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="ti-user menu-icon"></i>
                    <span class="menu-title">User Management</span>
                </a>
            </li>
            <li class="nav-item" {{ Request::routeIs('districts') ? 'active' : '' }}>
                <a class="nav-link" href="{{ route('district.index') }}">
                    <i class="ti-harddrives menu-icon"></i>
                    <span class="menu-title">District Management</span>
                </a>
            </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.index') }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">My Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                <i class="ti-power-off menu-icon"></i>
                Logout
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
        </li>

    </ul>
</nav>
