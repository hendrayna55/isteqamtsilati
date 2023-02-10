<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Al-Istiqomah Cianjur | @yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('dashboard') }}/isteq.png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('dashboard/admin') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dashboard/admin') }}/dist/css/adminlte.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('dashboard/admin') }}/plugins/daterangepicker/daterangepicker.css">
    <!-- Tempusdominus Bootstrap 4 -->
    {{-- <link rel="stylesheet" href="{{asset('dashboard/admin')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css"
        integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg=="
        crossorigin="anonymous" />
    <!-- Datatables -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- css untuk select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <!-- jika menggunakan bootstrap4 gunakan css ini  -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <!-- ckeditor5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>


</head>

<body class="hold-transition sidebar-mini layout-fixed sidebar-open">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('dashboard.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('dashboard.sidebar')
        <!-- Main Sidebar Container End -->

        <!-- Content Wrapper. Contains page content -->

        @yield('content')
        <!-- /.content-wrapper -->

        <!-- Footer Start -->
        @include('dashboard.footer')
        <!-- Footer End -->

        <!-- Sweet Alert -->
        @include('sweetalert::alert')
        <!-- Sweet Alert End -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('dashboard/admin') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('dashboard/admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!--picker-->
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"
        integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA=="
        crossorigin="anonymous"></script>
    <!-- InputMask -->
    {{-- <script src="{{asset('dashboard/admin')}}/plugins/moment/moment.min.js"></script> --}}
    <script src="{{ asset('dashboard/admin') }}/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dashboard/admin') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dashboard/admin') }}/dist/js/demo.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    {{-- <script src="{{asset('dashboard/admin')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> --}}


    <!-- wajib jquery  -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
crossorigin="anonymous"></script> --}}
    <!-- js untuk select2  -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script>
$(document).ready(function () {
$(".jsboxes").select2({
theme: 'bootstrap4',
});
});
</script> --}}
    <script>
        //Initialize Select2 Elements
        $('.select2').select2()
    </script>

    @yield('script')

    <script>
        // Ubah Modal Gambar
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

    <script>
        // ckeditor
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        // datetimepicker
        $(function() {
            $('#datetimepicker').datetimepicker({
                // format: 'L'
            });
            $('#datetimepicker1').datetimepicker({
                // format: 'L'
            });
        });
    </script>

    <!-- Datatables -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.example').DataTable();
        });
    </script>

</body>

</html>
