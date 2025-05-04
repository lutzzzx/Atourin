<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ route('agendas.index') }}" class="logo logo-dark">
            <span class="logo-lg">
                <h3 class="mt-4">Atourin</h3>
            </span>
            <span class="logo-sm">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
        <i class="bx bx-menu align-middle"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Dashboard</li>
                <li>
                    <a href="{{ route('agendas.index') }}">
                        <i class="bx bx-home-alt icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Beranda</span>
                    </a>
                </li>

                <li class="menu-title" data-key="t-applications">Applications</li>
                <li>
                    <a href="{{ route('user.agendas') }}"> <!-- Tambahin Link ke agenda Saya -->
                        <i class="far fa-calendar-alt icon nav-icon"></i>
                        <span class="menu-item" data-key="t-agenda">Agenda Saya</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.bookmarks') }}"> <!-- Tambahin Link ke bookmark Saya -->
                        <i class="far fa-bookmark icon nav-icon"></i>
                        <span class="menu-item" data-key="t-agenda">Bookmarks</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->