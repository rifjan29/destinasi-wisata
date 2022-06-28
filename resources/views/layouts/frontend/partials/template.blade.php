<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    @include('layouts.frontend.partials.head')
</head>
    <body>
        <!-- start banner Area -->
        <section class="banner-area" id="home">
           @include('layouts.frontend.partials.navbar')
        </section>

        @yield('content')

        @include('layouts.frontend.partials.footer')

        <script src="{{ asset('') }}frontend/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="{{ asset('') }}frontend/js/vendor/bootstrap.min.js"></script>
        <script src="{{ asset('') }}frontend/js/jquery.ajaxchimp.min.js"></script>
        <script src="{{ asset('') }}frontend/js/jquery.magnific-popup.min.js"></script>
        <script src="{{ asset('') }}frontend/js/owl.carousel.min.js"></script>
        <script src="{{ asset('') }}frontend/js/jquery.sticky.js"></script>
        <script src="{{ asset('') }}frontend/js/slick.js"></script>
        <script src="{{ asset('') }}frontend/js/jquery.counterup.min.js"></script>
        <script src="{{ asset('') }}frontend/js/waypoints.min.js"></script>
        <script src="{{ asset('') }}frontend/js/main.js"></script>
    </body>
</html>
