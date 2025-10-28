<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



        {{-- X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token --}} 
        <meta name="csrf-token" content="{{ csrf_token() }}">



        <title>Admin Panel</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('admin/vendors/feather/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
        <!-- endinject -->


        <!-- Plugin css for this page (The icons from Skydash Admin Panel template) -->
        <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">


        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/select.dataTables.min.css') }}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('admin/css/vertical-layout-light/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('admin/images/favicon.jpg') }}" />

        {{-- DataTable --}}
        <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap4.min.css') }}">
    </head>
    <body>
        <div class="container-scroller">




          @include('admin.layout.header')




            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
            <!-- partial -->




                @include('admin.layout.sidebar')




                <!-- partial -->
                <!-- container-scroller -->




                <!-- Middle Content (varies from a page to another) -->
                @yield('content')




                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- plugins:js -->
        <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('admin/js/dataTables.select.min.js') }}"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
        <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('admin/js/template.js') }}"></script>
        <script src="{{ asset('admin/js/settings.js') }}"></script>
        <script src="{{ asset('admin/js/todolist.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{ asset('admin/js/dashboard.js') }}"></script>
        <script src="{{ asset('admin/js/Chart.roundedBarCharts.js') }}"></script>
        <!-- End custom js for this page-->



        {{-- NOTE: I MOVED THIS SECTION TO admin/js/My-Sweet-Alert.js FILE! After the SweetAlert2 CDN link block in the Country! I downloaded the library using 'npm' --}}
        {{-- The SweetAlert2 package for Confirm Deletion Message in sections.blade.php --}}
        {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}} <!-- CDNs blocked in Country! -->
        {{-- <script type="module" src="{{ asset('admin/js/sweetalert2.js') }}"></script>
        <script type="module" src="{{ asset('admin/js/My-Sweet-Alert.js') }}"></script> --}}
        



        {{-- Start: Our Custom Admin JS --}}
        <script src="{{ asset('admin/js/custom.js') }}"></script>
        {{-- End: Our Custom Admin JS --}}
    </body>
</html>