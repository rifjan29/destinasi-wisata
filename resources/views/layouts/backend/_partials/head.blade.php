<!-- Fontfaces CSS-->
<link href="{{ asset('') }}backend/css/font-face.css" rel="stylesheet" media="all">
<link href="{{ asset('') }}backend/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
<link href="{{ asset('') }}backend/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
<link href="{{ asset('') }}backend/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

<!-- Bootstrap CSS-->
<link href="{{ asset('') }}backend/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

<!-- Vendor CSS-->
<link href="{{ asset('') }}backend/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
<link href="{{ asset('') }}backend/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
<link href="{{ asset('') }}backend/vendor/wow/animate.css" rel="stylesheet" media="all">
<link href="{{ asset('') }}backend/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
<link href="{{ asset('') }}backend/vendor/slick/slick.css" rel="stylesheet" media="all">
<link href="{{ asset('') }}backend/vendor/select2/select2.min.css" rel="stylesheet" media="all">
<link href="{{ asset('') }}backend/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
{{-- datatable --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">
<!-- Main CSS-->
<link href="{{ asset('') }}backend/css/theme.css" rel="stylesheet" media="all">

@stack('css')
<style>
    .select2-container--default .select2-selection--single {
        border: 1px solid #ced4da;
        height: calc(2.25rem + 2px);
        padding: .375rem .75rem;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: inherit;
        color: inherit;
        padding: 0px;
    }

</style>
