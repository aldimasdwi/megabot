<!-- Page Header Start-->
<div class="page-main-header">
    <div class="main-header-right row">
        <div class="main-header-left d-none w-auto">
            <div class="logo-wrapper">
                <a href="{{ route('dashboard') }}">
                    <img class="blur-up lazyloaded" src="{{ \App\Helpers\Helpers::settings()['general_settings']['home_logo_url'] ?? asset('admin/logo.png') }}" alt="">
                </a>
            </div>
        </div>
        <div class="mobile-sidebar w-auto p-0">
            <div class="media-body text-end switch-sm">
                <label class="switch">
                    <a href="javascript:void(0)">
                        <i id="sidebar-toggle" data-feather="align-left"></i>
                    </a>
                </label>
            </div>
        </div>
        <div class="nav-right col">
            <ul class="nav-menus">
                <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                            data-feather="maximize-2"></i></a></li>
                <li class="onhover-dropdown"><a class="txt-dark" href="#">
                        <h6>{{ strtoupper(Session::get('locale', 'en')) }}</h6>
                    </a>
                    <ul class="language-dropdown onhover-show-div p-20">
                        <li><a href="{{ route('lang', 'en') }}" data-lng="en"><img class="flag-icon"
                                    src="{{ asset('admin/images/flags/us.png') }}"
                                    alt=""><span>{{ __('static.header.english') }}</span></a></li>
                        <li><a href="{{ route('lang', 'es') }}" data-lng="es"><img class="flag-icon"
                                    src="{{ asset('admin/images/flags/spanish.png') }}"
                                    alt=""><span>{{ __('static.header.spanish') }}</span></a></li>
                        <li><a href="{{ route('lang', 'de') }}" data-lng="de"><img class="flag-icon"
                                    src="{{ asset('admin/images/flags/german.png') }}"
                                    alt=""><span>{{ __('static.header.german') }}</span></a></li>
                        <li><a href="{{ route('lang', 'fr') }}" data-lng="fr"><img class="flag-icon"
                                    src="{{ asset('admin/images/flags/french.png') }}"
                                    alt=""><span>{{ __('static.header.french') }}</span></a></li>
                    </ul>
                </li>
                <li class="onhover-dropdown ps-0">
                    <div class="media align-items-center profile-box"><img
                            class="align-self-center profile-image pull-right img-fluid rounded-circle blur-up lazyloaded"
                            src="{{ Auth::user()->profile_image_url ? Auth::user()->profile_image_url : asset('admin/images/avatar/profile.jpg') }}"
                            alt="header-user">
                    </div>
                    <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                        <li><a href="{{ route('account.profile') }}"><i class="ri-user-3-line"></i>
                                <span>{{ __('static.header.edit_profile') }}</span></a></li>
                        <li>
                            <a href="{{ route('logout') }}">
                                <i class="ri-logout-box-r-line"></i>
                                <span>{{ __('static.header.logout') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
        </div>
    </div>
</div>
<!-- Page Header Ends -->
