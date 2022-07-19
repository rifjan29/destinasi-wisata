@extends('layouts.frontend.partials.template')
@section('content')
<section class="default-banner active-blog-slider" data-id="{{ count($data_banner) }}">
    @forelse ($data_banner as $item)
        <div class="item-slider relative" style="background: url({{ asset('img/banner/'.$item->banner) }});background-size: cover;">
            <div class="overlay" style="background: rgba(0,0,0,.3)"></div>
            <div class="container">
                <div class="row fullscreen justify-content-center align-items-center">
                    <div class="col-md-10 col-12">
                        <div class="banner-content text-center">
                            <h4 class="text-white mb-20 text-uppercase">{{ $item->subtitle }}</h4>
                            <h1 class="text-uppercase text-white">{{ $item->title }}</h1>
                            <p class="text-white">{{ ucwords($item->keterangan) }}</p>
                            <a href="#" class="text-uppercase header-btn">Discover Now</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @empty
        <div class="item-slider relative" style="background: url({{ url('frontend/img/143223.jpg') }});background-size: cover;">
            <div class="overlay" style="background: rgba(0,0,0,.3)"></div>
            <div class="container">
                <div class="row fullscreen justify-content-center align-items-center">
                    <div class="col-md-10 col-12">
                        <div class="banner-content text-center">
                            <h4 class="text-white mb-20 text-uppercase">Discover the Colorful World</h4>
                            <h1 class="text-uppercase text-white">New Adventure</h1>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp <br>
                            or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
                            <a href="#" class="text-uppercase header-btn">Discover Now</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforelse

</section>

<!-- Start about Area -->
<section class="section-gap info-area" id="about">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-40 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">{{ __('general.section_satu.title') }} </h1>
                    <p>{{ __('general.section_satu.subtitle') }}.</p>
                </div>
            </div>
        </div>
        <div class="single-info row mt-40">
            <div class="col-lg-6 col-md-12 mt-120 text-center no-padding info-left">
                <div class="info-thumb">
                    <img src="{{ url('frontend/img/about-img.jpg') }}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 no-padding info-rigth">
                <div class="info-content">
                    <h2 class="pb-30">{{ __('general.section_dua.title') }} <br>
                    </h2>
                    <p>
                        {{ __('general.section_dua.text1') }}
                    </p>

                    </div>
            </div>
        </div>
    </div>
</section>
<!-- End about Area -->

<!-- Start event Area -->
<section class="project-area section-gap" id="project">
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="menu-content pb-30 col-lg-8">
            <div class="title text-center">
                <h1 class="mb-10">{{ __('general.section_tiga.title') }}</h1>
                <p>{{ __('general.section_tiga.subtitle') }}</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center d-flex">
        <div class="active-works-carousel mt-40 col-lg-8">
            @foreach ($data_event as $item)
                    <div class="item">
                        <div class="">
                            <a href="{{ route('event.detail',$item->slug) }}">
                                <img class="img-fluid position-relative" style="
                                width: 100%;
                                height: 300px;
                                object-fit: cover;
                                object-position: bottom;

                              " src="{{ asset('img/events/'.$item->photos) }}" alt="">
                                <div style="position: absolute; bottom: 200px; left: 20px;">
                                    <span class="badge badge-primary text-uppercase p-2">{{ $item->name}}</span>
                                </div>
                        </div>
                        <div class="caption text-center mt-20">
                                <h6 class="text-uppercase">{{ ucwords($item->title) }}</h6>
                            </a>
                            <p class="text-desc" id="text-desc">{!! substr($item->deskripsi,0,500) !!}</p>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
</div>
</section>
<!-- End event Area -->

<!-- Start destinasi Area -->
<section class="faq-area section-gap" id="project">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-30 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Galeri</h1>
                </div>
            </div>
        </div>
        <div class="row ">
            @forelse ($data_galeri as $item)
            <div class="col-md-6 col-xs-6 px-3">
                <div class="gallery_product " >
                    <a data-fancybox="gallery" class="fancybox" rel="ligthbox" data-src="{{ asset('img/galeri/'.$item->photos) }}">
                        <img class="img-fluid" style="
                        width: 100%;
                        height: 300px;
                        object-fit: cover;
                        object-position: bottom;
                        " alt="" src="{{ asset('img/galeri/'.$item->photos) }}" />
                        <div class='img-info'>
                            <h4 style="color: #fff">{{ ucwords($item->title) }}</h4>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> --}}
                        </div>
                    </a>
                </div>
            </div>
            @empty

            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-5">
            <a href="" class="primary-btn"> Selengkapnya</a>
        </div>
    </div>
</section>
    <!-- End destinasi Area -->

<!-- Start Video Area -->
<section class="video-area pt-40 pb-40">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="video-content">
            <a href="http://www.youtube.com/watch?v=l-2xxSaHV-Y" class="play-btn"><img src="{{ asset('frontend/img/play-btn.png') }}" alt=""></a>
            <div class="video-desc">
                <h3 class="h2 text-white text-uppercase">Being unique is the preference</h3>
                <h4 class="text-white">Youtube video will appear in popover</h4>
            </div>
        </div>
    </div>
</section>
<!-- Start Video Area -->

<!-- Start logo Area -->
<section class="logo-area">
<div class="container">
    <div class="row">

    </div>
</div>
</section>
<!-- End logo Area -->


@endsection
