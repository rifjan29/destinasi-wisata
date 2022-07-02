<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard 3</title>

    @include('layouts.backend._partials.head')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('layouts.backend._partials.header')

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            @include('layouts.backend._partials.breadcumb')
            <div class="container">
                @include('layouts.backend._partials.notif')
            </div>

            @yield('content')

            @include('layouts.backend._partials.footer')
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="{{ asset('') }}backend/vendor/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('') }}backend/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="{{ asset('') }}backend/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!--   Vendor JS   -->
    <script src="{{ asset('') }}backend/vendor/slick/slick.min.js">
    </script>
    <script src="{{ asset('') }}backend/vendor/wow/wow.min.js"></script>
    <script src="{{ asset('') }}backend/vendor/animsition/animsition.min.js"></script>
    <script src="{{ asset('') }}backend/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="{{ asset('') }}backend/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="{{ asset('') }}backend/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="{{ asset('') }}backend/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="{{ asset('') }}backend/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('') }}backend/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="{{ asset('') }}backend/vendor/select2/select2.min.js"></script>
    {{-- datatable --}}
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <!-- Main JS-->
    <script src="{{ asset('') }}backend/js/main.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
            $('.select2').select2();
        });
        $('#summernote').summernote({
            placeholder: 'Masukkan Deskripsi',
            tabsize: 2,
            height: 100,
            toolbar: [
                [ 'style', [ 'style' ] ],
                [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
                [ 'fontname', [ 'fontname' ] ],
                [ 'fontsize', [ 'fontsize' ] ],
                [ 'color', [ 'color' ] ],
                [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
                [ 'table', [ 'table' ] ],
            ]
        });
    </script>
    <script src="{{ asset('') }}backend/js/custom.js"></script>
    @stack('js')
</body>

</html>
<!-- end document-->
