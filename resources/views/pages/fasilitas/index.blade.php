@extends('layouts.frontend.partials.template')
@section('content-detail')
<div class="container">
    <div class="row height align-items-center justify-content-center">
        <div class="col-lg-10">
            <div class="generic-banner-content">
                <h2 class="text-white">{{ __('general.menu.facility') }}</h2>
                <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                    <ol class="breadcrumb " style="background-color: #83c5bf7c;">
                      <li class="breadcrumb-item" ><a href="{{ route('home') }}" style=" color: #000">{{ __('general.menu.home') }}</a></li>
                      <li class="breadcrumb-item active" style=" color: #000" aria-current="page">{{ __('general.menu.facility') }}</li>
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
            @forelse ($data as $item)
                <div class="row d-flex mb-4">
                    <div class="col-md-4 align-self-center d-flex justify-content-center">
                        <img src="{{ asset('img/fasilitas/'.$item->photos) }}" class="img-responsive" width="300" height="300" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="">
                            <h4>{{ ucwords($item->title) }}</h4>
                            <hr>
                        </div>
                        <div>
                            <p>
                                {!! $item->deskripsi !!}
                            </p>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse

        </div>
    </section>
    <!-- End Generic Start -->
    <!-- End banner Area -->
@endsection
