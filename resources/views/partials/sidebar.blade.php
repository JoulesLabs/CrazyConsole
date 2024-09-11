<div class="sidebar sidebar-light sidebar-fixed border-end" id="sidebar" data-controller="navmenu">
    <div class="sidebar-header border-bottom">
        <div class="sidebar-brand">
            <svg class="sidebar-brand-full" width="88" height="32" alt="CoreUI Logo">
                <use xlink:href="{{ asset('assets/brand/coreui.svg#full') }}"></use>
            </svg>
            <svg class="sidebar-brand-narrow" width="32" height="32" alt="CoreUI Logo">
                <use xlink:href="{{ asset('assets/brand/coreui.svg#signet') }}"></use>
            </svg>
        </div>
        <button class="btn-close d-lg-none" type="button" data-coreui-dismiss="offcanvas" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}" data-turbo-frame="content-frame breadcrumbs-frame" data-turbo-action="advance">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
        <li class="nav-title">User & Role</li>
        <li class="nav-group {{ show_if_request_matches('show', 'users', 'users/*') }}"><a class="nav-link nav-group-toggle" href="#" data-action="click->navmenu#toggle">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                </svg> Users</a>
            <ul class="nav-group-items compact">
                <li class="nav-item"><a class="nav-link {{ show_if_request_matches('active', 'users/create') }}" href="{{ url('users/create') }}" data-turbo-action="replace"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Create</a></li>
                <li class="nav-item"><a class="nav-link {{ show_if_request_matches('active', 'users') }}" href="{{ route('users.index') }}" data-turbo-action="replace"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> List</a></li>
            </ul>
        </li>
       <li class="nav-group {{ show_if_request_matches('show', 'roles', 'roles/*') }}"><a class="nav-link nav-group-toggle" href="#" data-action="click->navmenu#toggle">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-rowing') }}"></use>
                </svg> Roles</a>
            <ul class="nav-group-items compact">
                <li class="nav-item"><a class="nav-link {{ show_if_request_matches('active', 'roles/create') }}" href="{{ url('roles/create') }}" data-turbo-action="replace"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Create</a></li>
                <li class="nav-item"><a class="nav-link {{ show_if_request_matches('active', 'roles') }}" href="{{ route('roles.index') }}" data-turbo-action="replace"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> List</a></li>
            </ul>
        </li>

    </ul>
    <div class="sidebar-footer border-top d-none d-md-flex">
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
</div>
