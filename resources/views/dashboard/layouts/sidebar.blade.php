<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <span data-feather="home"></span>
                Dashboard
                </a>
            </li>
            @cannot('admin')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/user') ? 'active' : '' }}" href="{{ route('dashboard.user') }}">
                    <span data-feather="grid"></span>
                    Update Data
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/user/notes') ? 'active' : '' }}" href="{{ route('dashboard.user.notes') }}">
                    <span data-feather="grid"></span>
                    Notes
                    </a>
                </li>
            @endcannot
        </ul>

        @can('admin')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span >Administrator</span>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/admin') ? 'active' : '' }}" href="{{ route('dashboard.admin') }}">
                    <span data-feather="grid"></span>
                        All User
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/admin/notes') ? 'active' : '' }}" href="{{ route('dashboard.admin.notes') }} ">
                    <span data-feather="grid"></span>
                        All Notes
                    </a>
                </li>
            </ul>
        @endcan
    </div>
</nav>