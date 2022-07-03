<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <img class="logo-wrapper" src="{{ asset('images/kodimas_logo.png') }}" alt="KodiMas Logo" />
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Laman Utama</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @hasrole('User')
    <!-- Heading -->
    <div class="sidebar-heading">
        Profil
    </div>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Kemas-kini Profil </span>
        </a>
    </li>

    @endhasrole

    @hasrole('Admin')
    <!-- Heading -->
    <div class="sidebar-heading">
        Pengurusan
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fas fa-user-alt"></i>
            <span>Pengurusan Pengguna</span>
        </a>
        <div id="taTpDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('users.index') }}">Senaraikan</a>
                <a class="collapse-item" href="{{ route('users.create') }}">Tambah Baru</a>
                <a class="collapse-item" href="{{ route('users.import') }}">Import Data</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @endhasrole

    @hasrole('Admin')
        <!-- Heading -->
        <div class="sidebar-heading">
            Bahagian Pentadbiran
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Masters</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Peranan & Keizinan</h6>
                    <a class="collapse-item" href="{{ route('roles.index') }}">Peranan</a>
                    <a class="collapse-item" href="{{ route('permissions.index') }}">Keizinan</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @endhasrole

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Log Keluar</span>
        </a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
