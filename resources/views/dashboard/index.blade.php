@extends('layouts.main')
@section('wrapper')
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
    </div>
    @include('partials.navbar')
    @include('partials.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->


                <!-- Main row -->
                

                <!-- /.row (second main row) -->
                
                <!-- /.row (second main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="d-none d-sm-inline-block float-right">
            <b>Version</b> 3.2.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
@endsection
@push('script')
    {{-- <script src="{{ asset('dist/js/pages/dashboard.js') }}" id="json" data-kendaraan="{{ $kendaraans }}" data-perawatan="{{ $perawatans }}" data-jenis-perawatan="{{ $jenis_perawatan }}"></script> --}}
    {{-- <script src="{{ asset('dist/js/pages/dashboard2.js') }}" id="json2" data-kendaraan="{{ $kendaraans }}" data-perawatan="{{ $perawatans }}" data-jenis-perawatan="{{ $jenis_perawatan }}"></script> --}}
    {{-- <script src="{{ asset('dist/js/pages/dashboard3.js') }}" id="json3" data-kendaraan="{{ $kendaraans }}"></script> --}}
@endpush