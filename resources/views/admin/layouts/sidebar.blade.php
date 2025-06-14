<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="index.html" class="header-logo">
            <img src="/assets/images/brand-logos/logo.svg" alt="logo" class="desktop-logo">
            <img src="/assets/images/brand-logos/logo.svg" alt="logo" class="toggle-logo">
            <img src="/assets/images/brand-logos/logo.svg" alt="logo" class="desktop-dark">
            <img src="/assets/images/brand-logos/logo.svg" alt="logo" class="toggle-dark">
        </a>
    </div>
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">@lang('trans.general_settings')</span></li>
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bxl-facebook side-menu__icon"></i>
                        <span class="side-menu__label">@lang('trans.facebook')</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1 mega-menu">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">@lang('trans.facebook')/a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('midade.facebookpages.admin.facebookpages.all') }}"
                                class="side-menu__item">@lang('trans.pages')</a>
                        </li>

                    </ul>
                </li>
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-messages side-menu__icon"></i>
                        <span class="side-menu__label">@lang('trans.d3uh_settings')</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>

                    <ul class="slide-menu child1 mega-menu">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">@lang('trans.settings')/a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('midade.users.admin.users.all') }}"
                                class="side-menu__item">@lang('trans.users')</a>
                        </li>

                        <li class="slide">
                            <a href="{{ route('midade.users.admin.roles.all') }}"
                                class="side-menu__item">@lang('trans.roles')</a>
                        </li>

                    </ul>
                </li>
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-cog side-menu__icon"></i>
                        <span class="side-menu__label">@lang('trans.settings')</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>


                    <ul class="slide-menu child1 mega-menu">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">@lang('trans.settings')/a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('midade.users.admin.users.all') }}"
                                class="side-menu__item">@lang('trans.users')</a>
                        </li>

                        <li class="slide">
                            <a href="{{ route('midade.users.admin.roles.all') }}"
                                class="side-menu__item">@lang('trans.roles')</a>
                        </li>

                    </ul>
                </li>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
</aside>
