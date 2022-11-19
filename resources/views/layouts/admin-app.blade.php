<!DOCTYPE html>
<html lang="en">
<!-- header -->
@include('components.backend.admin-header')
<!-- ./header -->

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- wrapper -->
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src=" {{ asset('dist/img/AdminLTELogo.png ') }}" alt="AdminLTELogo" height="60"
                width="60">
        </div>
        <!-- Preloader -->
        <!-- Navbar -->
        @include('components.backend.admin-nav')
        <!-- ./Navbar -->
        <!-- Main Sidebar  -->
        @include('components.backend.admin-side_menu')
        <!-- ./Main Sidebar  -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">School Management System</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home.view.page') }}">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard </li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content ">
                <!-- yield -->
                @yield('content')
                <!-- yield -->
            </section>
            <!-- /.content -->
        </div>
        <!--  footer  -->
        @include('components.backend.admin-footer')
        <!--  ./footer  -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- ./control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- script -->
    @include('components.backend.admin-script')
    <!-- ./script -->
</body>

</html>
