<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">
    @php
        $user_role = Auth::user()->roles->first();
        //dd($user_role);
    @endphp
    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.home') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @if ($user_role->id == 2)
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.affilate_index') }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-users">

                    </i>
                    {{ trans('My Affiliate') }}
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a href="{{ route('my-asset') }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-compass">

                    </i>
                    {{ trans('My Asset') }}
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a href="{{ route('cashwallet.index') }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-upload">

                    </i>
                    {{ trans('Add Fund') }}
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a href="{{ route('user.package.index') }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-cube">

                    </i>
                    {{ trans('Buy Package') }}
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a href="{{ route('daily-bonus-history') }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-spinner">

                    </i>
                    {{ trans('Daily Bonus History') }}
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a href="{{ route('level-bonus-history') }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-spinner">

                    </i>
                    {{ trans('Level Bonus History') }}
                </a>
            </li>
        @endif
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is('admin/permissions*') ? 'c-show' : '' }} {{ request()->is('admin/roles*') ? 'c-show' : '' }} {{ request()->is('admin/users*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.permissions.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.roles.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.users.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('setting_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is('admin/package-settings*') ? 'c-show' : '' }} {{ request()->is('admin/level-settings*') ? 'c-show' : '' }} {{ request()->is('admin/admin-wallets*') ? 'c-show' : '' }} {{ request()->is('admin/general-settings*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.setting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('package_setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.package-settings.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/package-settings') || request()->is('admin/package-settings/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.packageSetting.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('level_setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.level-settings.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/level-settings') || request()->is('admin/level-settings/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.levelSetting.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('admin_wallet_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.admin-wallets.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/admin-wallets') || request()->is('admin/admin-wallets/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.adminWallet.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('general_setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.general-settings.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/general-settings') || request()->is('admin/general-settings/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.generalSetting.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('cash_wallet_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.cash-wallets.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/cash-wallets') || request()->is('admin/cash-wallets/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.cashWallet.title') }}
                </a>
            </li>
        @endcan
        {{--   @can('mining_wallet_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.mining-wallets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/mining-wallets") || request()->is("admin/mining-wallets/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.miningWallet.title') }}
                </a>
            </li>
        @endcan --}}
        {{--  @can('bonus_wallet_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.bonus-wallets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/bonus-wallets") || request()->is("admin/bonus-wallets/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.bonusWallet.title') }}
                </a>
            </li>
        @endcan --}}
        @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-user c-sidebar-nav-icon">
                        </i>
                        {{ trans('Profile') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
