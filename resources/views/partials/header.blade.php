<header class="header header-sticky p-0 mb-4">
    <div class="container-fluid border-bottom px-4">
        <button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
            <svg class="icon icon-lg">
                <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
            </svg>
        </button>
        <ul class="header-nav d-none d-lg-flex">
            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
        </ul>
        <ul class="header-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-bell') }}"></use>
                    </svg></a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-list-rich') }}"></use>
                    </svg></a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-envelope-open') }}"></use>
                    </svg></a></li>
        </ul>
        <ul class="header-nav">
            <li class="nav-item py-1">
                <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
            </li>
            <li class="nav-item dropdown">
                <button class="btn btn-link nav-link py-2 px-2 d-flex align-items-center" type="button" aria-expanded="false" data-coreui-toggle="dropdown">
                    <svg class="icon icon-lg theme-icon-active">
                        <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-contrast') }}"></use>
                    </svg>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
                    <li>
                        <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="light">
                            <svg class="icon icon-lg me-3">
                                <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-sun') }}"></use>
                            </svg>Light
                        </button>
                    </li>
                    <li>
                        <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="dark">
                            <svg class="icon icon-lg me-3">
                                <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-moon') }}"></use>
                            </svg>Dark
                        </button>
                    </li>
                    <li>
                        <button class="dropdown-item d-flex align-items-center active" type="button" data-coreui-theme-value="auto">
                            <svg class="icon icon-lg me-3">
                                <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-contrast') }}"></use>
                            </svg>Auto
                        </button>
                    </li>
                </ul>
            </li>
            <li class="nav-item py-1">
                <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
            </li>
            <li class="nav-item dropdown" data-controller="profile_nav">
                <a id="profile-nav" class="nav-link py-0 pe-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" data-action="click->profile_nav#toggle">
                    <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('assets/img/avatars/8.jpg') }}" alt="user@email.com"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold rounded-top mb-2">Account</div><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                        </svg> Profile</a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-settings') }}"></use>
                        </svg> Settings</a><a class="dropdown-item" href="#">
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}"></use>
                        </svg> Lock Account</a>
                        <a class="dropdown-item" href="{{ route('auth.logout') }}" data-turbo="false">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                        </svg> Logout</a>
                </div>
            </li>
        </ul>
    </div>

        @yield('breadcrumbs')
</header>
