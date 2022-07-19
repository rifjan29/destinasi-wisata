 <!-- start footer Area -->
 <footer class="footer-area section-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-center">
                <div class="single-footer-widget ">
                    <img class="" src="{{ asset('frontend/img/logo-badean.png') }}" width="150" height="150" style="border-radius: 25%" alt="logo">
                    <p>
                        {{-- {{ __('general.section_dua.text1') }} --}}
                    </p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center">
                    <h6>{{ __('general.menu.contact') }}</h6>
                </div>
            </div>
            @php
                 $data = \App\Models\ContactUs::all();
            @endphp
            <div class="col-md-6 d-flex justify-content-center">
                <div class="footer-social ">
                    @forelse ($data as $item)
                        <a href="{{ $item->link }}"><i class="{{ $item->icon }}"></i></a>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
        <p class="footer-text">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>

    </div>
</footer>
<!-- End footer Area -->
