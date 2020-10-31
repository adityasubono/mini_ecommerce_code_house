<!DOCTYPE html>
<html lang="en">

{{-- Include Header --}}
@include('includes.admin._header')
{{-- End Include Header --}}


<body class="hold-transition sidebar-mini">
<div class="wrapper">

{{--   Include Navbar --}}
@include('includes.admin._navbar')
{{--   End Include Navbar --}}

<!-- Main Sidebar Container -->
{{--   Include Sidebar --}}
@include('includes.admin._sidebar')
{{--   End Include Sidebar --}}

     <!-- Content Wrapper. Contains page content -->
{!! Toastr::message() !!}
     @yield('content-wrapper')
    <!-- /.content-wrapper -->

    {{--   Include Asidebar --}}
    @include('includes.admin._asidebar')
    {{--   End Include Asidebar --}}

    {{--   Include Footer --}}
    @include('includes.admin._footer')
    {{--   End Include Footer --}}
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{!! asset('assets/AdminLTE/plugins/jquery/jquery.min.js') !!}"></script>
<!-- Bootstrap 4 -->
<script src="{!! asset('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('assets/AdminLTE/dist/js/adminlte.min.js') !!}"></script>
<script src="{!! asset('assets/AdminLTE/plugins/jquery/jquery.min.js') !!}"></script>

<!-- DataTables -->
<script src="{!! asset('assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('assets/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') !!}"></script>
<script src="{!! asset('assets/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') !!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script src="{!! asset('assets/AdminLTE/plugins/select2/js/select2.full.min.js')!!}"></script>
<script src="{!! asset('assets/AdminLTE/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')!!}"></script>
<script src="{!! asset('assets/AdminLTE/plugins/ekko-lightbox/ekko-lightbox.min.js')!!}"></script>
<script src="{!! asset('assets/AdminLTE/plugins/filterizr/jquery.filterizr.min.js')!!}"></script>


<!-- AdminLTE for demo purposes -->
<script src="{!! asset('assets/AdminLTE/dist/js/demo.js')!!}"></script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>
</html>
