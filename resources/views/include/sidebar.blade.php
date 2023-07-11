<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="">
            <div class="logo-img">
               <img height="30" src="{{ asset('img/logo_white.png')}}" class="header-brand-img" title="RADMIN"> 
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
    @endphp

    @php
        $user_role = Auth::user()->roles->first();
        //dd($user_role);
    @endphp
    
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.home') }}"><i class="ik ik-bar-chart-2"></i><span> {{ trans('global.dashboard') }}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href=""><i class="ik ik-user"></i><span> My Profile </span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href="{{ route('cashwallet.index') }}"><i class="fa fa-credit-card"></i><span> Make Deposit </span></a>
                </div>
                @if ($user_role->id == 2)
                <div class="nav-lavel">{{ __('Buy Packages')}} </div>
               
                <div class="nav-item {{ ($segment1 == 'pos') ? 'active' : '' }}">
                    <a href="{{ route('user.package.index') }}"><i class="fa fa-cubes"></i><span> {{ trans('Mining Packages') }}</span> </a>
                </div>
                <div class="nav-item {{ ($segment1 == 'pos') ? 'active' : '' }}">
                    <a href="{{ route('user.package.index') }}"><i class="fa fa-hand-holding-heart"></i><span> {{ trans('Stacking Packages') }}</span> </a>
                </div>

                <div class="nav-lavel">{{ __('Portfolio & Affiliate')}} </div>

                <div class="nav-item {{ ($segment1 == 'profile' || $segment1 == 'invoice'||$segment1 == 'affiliate'||$segment1 == 'session-timeout') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-file-text"></i><span>{{ __('My Portfolio')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('my-asset') }}" class="menu-item {{ ($segment1 == 'profile') ? 'active' : '' }}">{{ __('Mining Purchase History')}}</a>
                        <a href="{{ route('daily-bonus-history') }}" class="menu-item {{ ($segment1 == 'invoice') ? 'active' : '' }}">{{ __('Mining Bonus History')}}</a>
                        <a href="" class="menu-item {{ ($segment1 == 'project') ? 'active' : '' }}">{{ __('Staking Purchase History')}}</a>
                        <a href="" class="menu-item {{ ($segment1 == 'view') ? 'active' : '' }}">{{ __('Staking Purchase History')}}</a>
                    </div>
                </div>

                <div class="nav-item {{ ($segment1 == 'profile' || $segment1 == 'invoice'||$segment1 == 'affiliate'||$segment1 == 'session-timeout') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Affiliate')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('my-asset') }}" class="menu-item {{ ($segment1 == 'profile') ? 'active' : '' }}">{{ __('My Affiliate')}}</a>
                        <a href="{{ route('daily-bonus-history') }}" class="menu-item {{ ($segment1 == 'invoice') ? 'active' : '' }}">{{ __('Tree View')}}</a>
                    </div>
                </div>


                <div class="nav-lavel">{{ __('Transaction')}} </div>

                <div class="nav-item {{ ($segment1 == 'profile' || $segment1 == 'invoice'||$segment1 == 'affiliate'||$segment1 == 'session-timeout') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Transaction History ')}}</span></a>
                    <div class="submenu-content">
                        <a href="" class="menu-item {{ ($segment1 == 'profile') ? 'active' : '' }}">{{ __('Deposit History')}}</a>
                        <a href="" class="menu-item {{ ($segment1 == 'invoice') ? 'active' : '' }}">{{ __('Withdraw History')}}</a>
                        <a href="" class="menu-item {{ ($segment1 == 'project') ? 'active' : '' }}">{{ __('Level Bonus History')}}</a>
                        <a href="" class="menu-item {{ ($segment1 == 'view') ? 'active' : '' }}">{{ __('Transfer History')}}</a>
                    </div>
                    
                </div>

         
                
    
                <div class="nav-lavel">{{ __('Supports')}} </div>
                <div class="nav-item {{ ($segment1 == 'pos') ? 'active' : '' }}">
                    <a href=""><i class="ik ik-shopping-cart"></i><span> {{ trans('Create New Tickers') }} </span> <span class=" badge badge-success badge-right">{{ __('New')}}</span></a>
                </div>
                
                <div class="nav-item {{ ($segment1 == 'pos') ? 'active' : '' }}">
                    <a href=""><i class="ik ik-printer"></i><span> {{ trans('My Tickers') }}</span> </a>
                </div>
    
                <div class="nav-lavel">{{ __('Layouts')}} </div>
                <div class="nav-item {{ ($segment1 == 'pos') ? 'active' : '' }}">
                    <a href="{{ route('admin.affilate_index') }}"><i class="ik ik-shopping-cart"></i><span> {{ trans('My Affiliate') }} </span> <span class=" badge badge-success badge-right">{{ __('New')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'pos') ? 'active' : '' }}">
                    <a href="{{ route('my-asset') }}"><i class="ik ik-printer"></i><span> {{ trans('My Asset') }}</span> <span class=" badge badge-success badge-right">{{ __('New')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'pos') ? 'active' : '' }}">
                    <a href="{{ route('cashwallet.index') }}"><i class="ik ik-printer"></i><span> {{ trans('Add Fund') }}</span> </a>
                </div>
                <div class="nav-item {{ ($segment1 == 'pos') ? 'active' : '' }}">
                    <a href="{{ route('daily-bonus-history') }}"><i class="ik ik-printer"></i><span> {{ trans('Daily Bonus History') }}</span> </a>
                </div>
                <div class="nav-item {{ ($segment1 == 'pos') ? 'active' : '' }}">
                    <a href="{{ route('level-bonus-history') }}"><i class="ik ik-printer"></i><span> {{ trans('Level Bonus History') }}</span> </a>
                </div>
                @endif
                

            
                
        </div>
    
    </div>

    
</div>