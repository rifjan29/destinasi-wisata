@extends('layouts.frontend.partials.template')
@section('content-detail')
<div class="container">
    <div class="row height align-items-center justify-content-center">
        <div class="col-lg-10">
            <div class="generic-banner-content">
                <h2 class="text-white">{{ __('general.section_tiga.title') }}</h2>
                <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                    <ol class="breadcrumb " style="background-color: #83c5bf7c;">
                      <li class="breadcrumb-item" ><a href="{{ route('home') }}" style=" color: #000">{{ __('general.menu.home') }}</a></li>
                      <li class="breadcrumb-item active" style=" color: #000" aria-current="page">{{ __('general.section_tiga.title') }}</li>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="img-text">
                        <img src="{{ asset('img/events/'.$data->photos) }}" alt="" class="img-fluid float-left mr-20 mb-20">
                        <h3 class="about-title mb-30 text-center">{{ ucwords($data->title) }}</h3>
                        <p>
                            {!! $data->deskripsi !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Generic Start -->
    <!-- End banner Area -->
@endsection
