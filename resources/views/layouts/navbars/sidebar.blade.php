<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner scroll-scrollx_visible">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item {{ $parentSection == 'dashboards' ? 'active' : '' }}">
                        <a class="nav-link collapsed" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="{{ $parentSection == 'dashboards' ? 'true' : '' }}" aria-controls="navbar-dashboards">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">{{ __('Dashboards') }}</span>
                        </a>
                        <div class="collapse {{ $parentSection == 'dashboards' ? 'show' : '' }}" id="navbar-dashboards">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ $elementName == 'dashboard' ? 'active' : '' }}">
                                    <a href="{{ route('home') }}" class="nav-link">{{ __('Dashboard') }}</a>
                                </li>
{{--                                <li class="nav-item {{ $elementName == 'dashboard-alternative' ? 'active' : '' }}">--}}
{{--                                    <a href="{{ route('page.index','dashboard-alternative') }}" class="nav-link">{{ __('Alternative') }}</a>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                    </li>
                    @canany(['manage-users', 'mananage-organizationvendors'], App\User::class)
                    <li class="nav-item {{ $parentSection == 'components' ? 'active' : '' }}">
                        <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="{{ $parentSection == 'components' ? 'true' : '' }}" aria-controls="navbar-components">
                            <i class="ni ni-ui-04 text-info"></i>
                            <span class="nav-link-text">{{ __('Control Panel') }}</span>
                        </a>
                        <div class="collapse {{ $parentSection == 'components' ? 'show' : '' }}" id="navbar-components">
                            <ul class="nav nav-sm flex-column">
                                @can('manage-users', App\User::class)
                                    <li class="nav-item active">
                                        <a href="{{ route('user.index') }}" class="nav-link">{{ __('User Management') }}</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a href="{{ route('account.index') }}" class="nav-link">{{ __('Account Management') }}</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a href="{{ route('region.index') }}" class="nav-link">{{ __('Region Management') }}</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a href="{{ route('organization.index') }}" class="nav-link">{{ __('Organization Management') }}</a>
                                    </li>
                                @endcan
                                @can('mananage-organizationvendors', App\User::class)
                                    <li class="nav-item active">
                                        <a href="{{ route('organization_vendor.index') }}" class="nav-link">{{ __('Vendor Management') }}</a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    @endcanany
                </ul>

            </div>
        </div>
    </div>
</nav>
