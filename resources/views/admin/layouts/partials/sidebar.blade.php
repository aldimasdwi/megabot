<!-- Page Sidebar Start-->
<div class="page-sidebar">
    <div class="main-header-left">
        <div class="logo-wrapper">
            <a href="{{ route('dashboard') }}">
                <img class="blur-up lazyloaded img-fluid" src="{{\App\Helpers\Helpers::settings()['general_settings']['home_logo_url'] ??  asset('admin/logo.svg') }}" alt="">
            </a>
            <i class="ri-close-line sidebar-close-icon d-lg-none d-block" id="sidebar-close"></i>
        </div>
    </div>
    <div class="sidebar custom-scrollbar">
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="sidebar-header {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                    <i class="ri-home-4-line"></i><span>{{ __('static.dashboard.dashboard') }}</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="sidebar-header {{ Request::is('admin/user*') ? 'active' : '' }}">
                    <i class="ri-user-line"></i><span>{{ __('static.user.users') }}</span><i
                        class="fa fa-angle-right pull-right"></i>
                </a>
                <ul
                    class="sidebar-submenu {{ Request::is('admin/user*') || Request::is('admin/account/profile') ? 'menu-open' : '' }}">
                    <li>
                        <a href="{{ route('user.index') }}"
                            class="{{ Request::is('admin/user*') && !Request::is('admin/user/create') ? 'active' : '' }}">
                            {{ __('static.user.all_users') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.create') }}"
                            class="{{ Request::is('admin/user/create') ? 'active' : '' }}">
                            {{ __('static.user.create_user') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);"
                    class="sidebar-header {{ Request::is('admin/character*') ? 'active' : '' }}">
                    <i class="ri-emotion-line"></i><span>{{ __('static.character.characters') }}</span><i
                        class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu {{ Request::is('admin/character*') ? 'menu-open' : '' }}">
                    <li>
                        <a href="{{ route('character.index') }}"
                            class="{{ Request::is('admin/character*') && !Request::is('admin/character/create') ? 'active' : '' }}">
                            {{ __('static.character.all_characters') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('character.create') }}"
                            class="{{ Request::is('admin/character/create') ? 'active' : '' }}">
                            {{ __('static.character.create_character') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);"
                    class="sidebar-header {{ Request::is('admin/suggestion*') ? 'active' : '' }}">
                    <i class="ri-lightbulb-flash-line"></i><span>{{ __('static.suggestion.suggestions') }}</span><i
                        class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu {{ Request::is('admin/suggestion*') ? 'menu-open' : '' }}">
                    <li>
                        <a href="{{ route('suggestion.index') }}"
                            class="{{ Request::is('admin/suggestion') && !Request::is('admin/suggestion/create') ? 'active' : '' }}">
                            {{ __('static.suggestion.all_suggestions') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('suggestion.create') }}"
                            class="{{ Request::is('admin/suggestion/create') ? 'active' : '' }}">
                            {{ __('static.suggestion.create_suggestion') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);"
                    class="sidebar-header {{ Request::is('admin/category*') ? 'active' : '' }}">
                    <i
                        class="ri-newspaper-line"></i><span>{{ __('static.suggestion_category.suggestion_category') }}</span><i
                        class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu {{ Request::is('admin/category*') ? 'menu-open' : '' }}">
                    <li>
                        <a href="{{ route('category.index') }}"
                            class="{{ Request::is('admin/category') && !Request::is('admin/category/create') ? 'active' : '' }}">
                            {{ __('static.suggestion_category.all_suggestions_categories') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category.create') }}"
                            class="{{ Request::is('admin/category/create') ? 'active' : '' }}">
                            {{ __('static.suggestion_category.create_suggestion_category') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('chathistories.index') }}"
                    class="sidebar-header {{ Request::is('admin/chathistories') ? 'active' : '' }}">
                    <i class="ri-chat-3-line"></i><span>{{ __('static.chat_histories.chat_histories') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.settings') }}"
                    class="sidebar-header {{ Request::is('admin/settings') ? 'active' : '' }}">
                    <i class="ri-settings-3-line"></i><span>{{ __('static.settings.settings') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('clear-cache') }}" class="sidebar-header">
                    <i class="ri-delete-bin-7-line"></i><span>{{ __('static.clear_cache') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Page Sidebar End -->
