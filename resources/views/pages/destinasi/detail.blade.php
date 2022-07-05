@extends('layouts.frontend.partials.template')
@section('content-detail')
<div class="container">
    <div class="row height align-items-center justify-content-center">
        <div class="col-lg-10">
            <div class="generic-banner-content">
                <h2 class="text-white">{{ __('general.section_empat.title') }}</h2>
                <p class="text-white">{{ __('general.section_empat.subtitle') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
    <!-- Start Generic Area -->
    <section class="about-generic-area pb-100 pt-40">
        <div class="container border-top-generic">
            <h3 class="about-title mb-30 text-center">{{ ucwords($data->title) }}</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="img-text">
                        <img src="{{ asset('img/destinasi/'.$data->photos) }}" alt="" class="img-fluid float-left mr-20 mb-20">
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
