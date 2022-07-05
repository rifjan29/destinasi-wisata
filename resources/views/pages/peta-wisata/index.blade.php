@extends('layouts.frontend.partials.template')
@section('content-detail')
<div class="container">
    <div class="row height align-items-center justify-content-center">
        <div class="col-lg-10">
            <div class="generic-banner-content">
                <h2 class="text-white">{{ __('general.section_lima.title') }}</h2>
                <p class="text-white">{{ __('general.section_lima.subtitle') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
    <!-- Start Generic Area -->
    @if ($data != '' && $data != null)
    <section class="about-generic-area pb-100 pt-40">
        <div class="container border-top-generic">
            <h3 class="about-title mb-30 text-center">{{ ucwords($data->title) }}</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm mb-5 rounded p-3" style="border: none"">
                        {!! $data->peta_maps !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <section class="about-generic-area pb-100 pt-40">
        <div class="container border-top-generic">
            <h3 class="about-title mb-30 text-center">Tidak ada data</h3>
        </div>
    </section>
    @endif
    <!-- End Generic Start -->
@endsection
