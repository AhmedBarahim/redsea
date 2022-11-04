    <!-- Sidebar -->
    <ul class="navbar-nav bg-gray-200 sidebar sidebar-dark accordion p-0" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
            <img src="{{ asset('images/logo.png') }}" alt="logo" class="img-fluid">
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item text-right {{ (request()->is('admin')) ? 'active' : '' }}">
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

        <li class="nav-item {{ (request()->is('admin/prize-types*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('prize-types.index') }}">
                <i class="fas fa-award"></i>
                <span class="m-md-1">أنواع الجوائز</span>
            </a>
        </li>

         <li class="nav-item {{ (request()->is('admin/prizes*')) ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('prizes.index') }}">
                <i class="fas fa-gifts"></i>
                <span class="m-md-1">الجوائز</span>
            </a>
        </li>

        {{-- <li class="nav-item {{ (request()->is('admin/winners*')) ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('winners.index') }}">
                <i class="fas fa-trophy"></i>
                <span class="m-md-1">الفائزون</span>
            </a>
        </li> --}}

        <li class="nav-item {{ (request()->is('admin/*winners*')) ? 'active' : ''}}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-trophy"></i>
              <span class="m-md-1">الفائرون</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('winners.index') }}">جميع الفائزون</a>
                <a class="collapse-item" href="{{ route('new-winners') }}">الفائزون الجدد</a>
              </div>
            </div>
          </li>

        <li class="nav-item {{ (request()->is('admin/customers*')) ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('customers.index') }}">
                <i class="fas fa-users"></i>
                <span class="m-md-1">المسجلون</span>
            </a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    مسابقة السحب
                </div>

                <li class="nav-item {{ (request()->is('admin/stores*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('stores.index') }}">
                        <i class="fas fa-store"></i>
                        <span class="m-md-1">المحلات</span>
                    </a>
                </li>

                <li class="nav-item {{ (request()->is('admin/pick-winner*')) ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('showPickWinner') }}">
                        <i class="fas fa-spinner"></i>
                        <span class="m-md-1">سحب فائز</span>
                    </a>
                </li>

                 <li class="nav-item {{ (request()->is('admin/drawers*')) ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('drawers') }}">
                        <i class="fas fa-gifts"></i>
                        <span class="m-md-1">المشاركون بالسحب</span>
                    </a>
                </li>

                <li class="nav-item {{ (request()->is('admin/winning-drawers*')) ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('winning-drawers') }}">
                        <i class="fas fa-users"></i>
                        <span class="m-md-1">الفائزون</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt"></i>
                <span class="m-md-1">تسجيل خروج</span>
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
