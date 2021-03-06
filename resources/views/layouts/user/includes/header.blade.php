<header id="page-topbar">
    <div class="navbar-header">
        <div class="container-fluid">
            <div class="float-right">

                <div class="dropdown d-inline-block d-lg-none ml-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">

                        <form class="p-3" action="{{ route('search') }}" autocomplete="off">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="s" placeholder="Search ..." aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="dropdown d-none d-lg-inline-block ml-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" onclick="history.back()">
                        <i class="mdi mdi-arrow-right-bold-circle"></i>
                    </button>
                </div>
                <div class="dropdown d-none d-lg-inline-block ml-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen"></i>
                    </button>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{ auth()->user()->getPhoto() }}" alt="{{ auth()->user()->name }}">
                        <span class="d-none d-xl-inline-block ml-1">{{ auth()->user()->name }}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        @if(auth()->user()->isAdmin())
                            <a class="dropdown-item d-block" href="{{ route('admin.home') }}"><i class="bx bx-wrench font-size-16 align-middle mr-1"></i> Settings</a>
                        @endif
                        <a class="dropdown-item d-none" href="{{ route('lockscreen') }}"><i class="bx bx-lock-open font-size-16 align-middle mr-1"></i> Lock screen</a>
                        <div class="dropdown-divider"></div>
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item text-danger" type="submit"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</button>
                        </form>
                    </div>
                </div>


            </div>
            <div>
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="{{ route('home') }}" class="logo logo-dark">
                                    <span class="logo-sm">
                                        <img src="{{ asset('back-end/images/logo-dark.png') }}" alt="" height="70">
                                    </span>
                        <span class="logo-lg">
                                        <img src="{{ asset('back-end/images/logo-dark.png') }}" alt="" height="70">
                                    </span>
                    </a>

                    <a href="{{ route('home') }}" class="logo logo-light">
                                    <span class="logo-sm">
                                        <img src="{{ asset('back-end/images/logo-dark.png') }}" alt="" height="70">
                                    </span>
                        <span class="logo-lg">
                                        <img src="{{ asset('back-end/images/logo-dark.png') }}" alt="" height="70">
                                    </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <!-- App Search-->
                <form class="app-search d-none d-lg-inline-block" action="{{ route('search') }}"  autocomplete="off">
                    <div class="position-relative">
                        <input type="text" class="form-control" name="s" placeholder="Search...">
                        <span class="bx bx-search-alt"></span>
                    </div>
                </form>

            </div>

        </div>
    </div>
</header>
