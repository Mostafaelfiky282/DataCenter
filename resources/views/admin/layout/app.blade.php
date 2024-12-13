<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>جامعة دمنهور</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
    <div class="wrapper">
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="" class="brand-link elevation-4">
                <img src="{{ asset('images/R.png') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">جامعة دمنهور</span>
            </a>

            <div class="sidebar">
                <div class="form-inline mt-3">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="بحث" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('college*') ? 'active' : '' }}">
                                <i class="fa fa-school"></i>
                                <p>الكليات</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/college-add') }}" class="nav-link {{ request()->is('add-college') ? 'active' : '' }}">
                                        <i class="fa fa-university nav-icon"></i>
                                        <p>اضافة كلية</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('college.show') }}" class="nav-link {{ request()->routeIs('college.show') ? 'active' : '' }}">
                                        <i class="fa fa-university nav-icon"></i>
                                        <p>عرض كل الكليات</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('departments*') ? 'active' : '' }}">
                                <i class="fa fa-school"></i>
                                <p>الأقسام</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('departments.add') }}" class="nav-link {{ request()->routeIs('departments.add') ? 'active' : '' }}">
                                        <i class="fa fa-university nav-icon"></i>
                                        <p>اضافة قسم</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('departments.show') }}" class="nav-link {{ request()->routeIs('departments.show') ? 'active' : '' }}">
                                        <i class="fa fa-university nav-icon"></i>
                                        <p>عرض كل الأقسام</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('programs*') ? 'active' : '' }}">
                                <i class="fa fa-school"></i>
                                <p>البرامج</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('program.add') }}" class="nav-link {{ request()->routeIs('program.add') ? 'active' : '' }}">
                                        <i class="fa fa-university nav-icon"></i>
                                        <p>اضافة برنامج</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('program.show') }}" class="nav-link {{ request()->routeIs('program.show') ? 'active' : '' }}">
                                        <i class="fa fa-university nav-icon"></i>
                                        <p>عرض كل البرامج</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                                <i class="fa fa-school"></i>
                                <p>المستخدمين</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('users.add') }}" class="nav-link {{ request()->routeIs('users.add') ? 'active' : '' }}">
                                        <i class="fa fa-university nav-icon"></i>
                                        <p>اضافة مستخدم</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('users.show') }}" class="nav-link {{ request()->routeIs('users.show') ? 'active' : '' }}">
                                        <i class="fa fa-university nav-icon"></i>
                                        <p>عرض كل المستخدمين</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('years*') ? 'active' : '' }}">
                                <i class="fa fa-school"></i>
                                <p>السنوات الدراسية</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('years.add') }}" class="nav-link {{ request()->routeIs('years.add') ? 'active' : '' }}">
                                        <i class="fa fa-university nav-icon"></i>
                                        <p>اضافة سنة</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('year.show') }}" class="nav-link {{ request()->routeIs('year.show') ? 'active' : '' }}">
                                        <i class="fa fa-university nav-icon"></i>
                                        <p>عرض كل السنوات</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid"></div>
            </section>
            @yield('content')
        </div>

        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    {{-- <script src="{{ asset('dist/js/demo.js') }}"></script> --}}
</body>

</html>
