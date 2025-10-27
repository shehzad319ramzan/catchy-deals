<nav id="sidebar" class="sidebar">
    {{-- <a class="sidebar-brand" href="{{ route('auth') }}">
        <x-logo />
        {{ config('app.name') }}
    </a> --}}
    <div class="sidebar-content">
        <div class="sidebar-user">
            <img src="{{ auth()->user()->profile() }}" class="img-fluid rounded-circle mb-2"
                alt="{{ auth()->user()->full_name }}" />
            <div class="fw-bold">{{ auth()->user()->full_name }}</div>
            <small>{{ auth()->user()->email }}</small>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Main
            </li>

            <li class="sidebar-item {{ request()->route()->getName() == 'auth' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('auth') }}">
                    <i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-header">
                Menu
            </li>
            <li class="sidebar-item {{ Str::startsWith(request()->route()->getName(), 'users.') ? 'active' : '' }}">
                {{-- <a data-bs-target="#users" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-users"></i> <span class="align-middle">User
                        Interface</span>
                </a> --}}
                <ul id="users" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li
                        class="sidebar-item {{ Str::startsWith(request()->route()->getName(), 'users.') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('users.index') }}">All Users</a>
                    </li>
                    <li class="sidebar-item {{ request()->route()->getName() == 'users.create' ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('users.create') }}">Create User</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item {{ Str::startsWith(request()->route()->getName(), 'products.') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('products.index') }}">
                    <i class="align-middle me-2 fas fa-fw fa-box"></i> <span class="align-middle">Products</span>
                </a>
            </li>
            {{-- <li class="sidebar-item {{ Str::startsWith(request()->route()->getName(), 'roles.') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('my-account/messages') }}">
                    <i class="align-middle me-2 fas fa-fw fa-book"></i> <span class="align-middle">Messages</span>
                </a>
            </li> --}}

            <li class="sidebar-header">
                Configuration
            </li>
            {{-- <li class="sidebar-item {{ Str::startsWith(request()->route()->getName(), 'roles.') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('roles.index') }}">
                    <i class="align-middle me-2 fas fa-fw fa-book"></i> <span class="align-middle">Roles &
                        Permissions</span>
                </a>
            </li> --}}
            <li class="sidebar-item {{ Str::startsWith(request()->route()->getName(), 'settings.') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('settings.index', 'basic-info') }}">
                    <i class="align-middle me-1 fas fa-fw fa-cogs"></i> <span class="align-middle">Site Settings</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
