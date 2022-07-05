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
            <div class="row">
                @forelse ($data as $item)
                    <div class="col-md-6 col-lg-6">
                        <div class="card shadow-sm mb-5 rounded" style="border: none">
                            <div class="position-relative">
                                <img class="card-img-top" src="{{ asset('img/destinasi/'.$item->photos) }}" alt="">
                                <div style="position: absolute; top: 250px; left: 20px;">
                                    <span class="badge badge-primary text-uppercase p-2">{{ $item->name}}</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4>{{ ucwords($item->title) }}</h4>
                                <p>{!! substr($item->deskripsi,0,100) !!}</p>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('destinasi.detail',$item->slug) }}" class="btn btn-outline-info">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Tidak ada data.</p>
                @endforelse
            </div>
        </div>
    </section>
    <!-- End Generic Start -->
    <!-- End banner Area -->
@endsection
