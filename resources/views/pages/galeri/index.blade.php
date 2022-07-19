@extends('layouts.frontend.partials.template')
@section('content-detail')
<div class="container">
    <div class="row height align-items-center justify-content-center">
        <div class="col-lg-10">
            <div class="generic-banner-content">
                <h2 class="text-white">{{ __('general.menu.gallery') }}</h2>
                <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                    <ol class="breadcrumb " style="background-color: #83c5bf7c;">
                      <li class="breadcrumb-item" ><a href="{{ route('home') }}" style=" color: #000">{{ __('general.menu.home') }}</a></li>
                      <li class="breadcrumb-item active" style=" color: #000" aria-current="page">{{ __('general.menu.gallery') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
    <!-- Start Generic Area -->
    <section class="about-generic-area pb-100 pt-40">
        <div class="container border-top-generic">
            <div class="row ">
                @forelse ($data as $item)
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
                        <div class="card p-2" style="border: none">
                            <div class="d-flex justify-content-start">
                                <div>
                                    <i class="far fa-calendar-alt"></i>
                                    <span>{{ $item->created_at }}</span>
                                </div>
                                {{-- <div class="mx-2">
                                    <i class="fas fa-user"></i>
                                    <span>afgag</span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
    </section>
    <!-- End Generic Start -->
@endsection
