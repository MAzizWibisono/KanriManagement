<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
            </button>
        </div>
        </div>
    </form>



</nav>
<!-- /.navbar -->

  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">KANRI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{Auth::guard('project_management_office')->check() ? Auth::guard('project_management_office')->user()->nama_lengkap : ''}}</a>
        </div>
    </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                    Home
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/program') }}" class="nav-link">
                    <i class="nav-icon fab fa-product-hunt"></i>
                    <p>
                    Program
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/project') }}" class="nav-link">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                    Project
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/project_criteria') }}" class="nav-link">
                    <i class="nav-icon fas fa-thumbtack"></i>
                    <p>
                    Project Criteria
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/project_management_office') }}" class="nav-link">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>
                    Project Management Office
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/project_manager') }}" class="nav-link">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>
                    Project Manager
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/user') }}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                    User
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}"
                class="nav-link"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-power-off"></i>
                    <p>
                    Logout
                    </p>
                </a>
            </li>

        </ul>
        </nav>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            {{-- <a href="{{ route('logout') }}"
                class="nav-link"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
               <i class="nav-icon fas fa-power-off"></i>
               <p>
               Logout
               </p>
            </a> --}}

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        <!-- /.sidebar-menu -->
    </div>
<!-- /.sidebar -->
</aside>

