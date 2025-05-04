<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ route('agendas.index') }}" class="logo logo-dark">
            <h3 class="mt-4">Atourin</h3>
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
                    <a href="{{ route('admin.index') }}">
                        <i class="fas fa-users icon nav-icon"></i>
                        <span class="menu-item" data-key="t-pengguna">Daftar Pengguna</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.agendas') }}"> <!-- Tambahin Link ke agenda Saya -->
                        <i class="fas fa-calendar-alt icon nav-icon"></i>
                        <span class="menu-item" data-key="t-agenda">Daftar Agenda</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->