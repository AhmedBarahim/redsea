    <!-- Sidebar -->
    <ul class="navbar-nav bg-gray-200 sidebar sidebar-dark accordion p-0" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <img src="{{ asset('images/logo.png') }}" alt="logo" class="img-fluid">
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item text-right {{ (request()->is('admin/')) ? 'active' : '' }}">
            <a class="nav-link" href="/admin">
                <i class="fas fa-fw fa-tachometer-alt ml-md-1"></i>
                <span>الرئيسية</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            الاعدادات
        </div>

        <li class="nav-item {{ (request()->is('admin/prize-types')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('prize-types.index') }}">
                <i class="fas fa-award"></i>
                <span class="m-md-1">أنواع الجوائز</span>
            </a>
        </li>

         <li class="nav-item {{ (request()->is('admin/prizes')) ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('prizes.index') }}">
                <i class="fas fa-gifts"></i>
                <span class="m-md-1">الجوائز</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-trophy"></i>
                <span class="m-md-1">الفائزون</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-users"></i>
                <span class="m-md-1">المسجلون</span>
            </a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">




        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
