@extends('layouts.frontend.partials.template')
@section('content-detail')
<div class="container">
    <div class="row height align-items-center justify-content-center">
        <div class="col-lg-10">
            <div class="generic-banner-content">
                <h2 class="text-white">{{ __('general.menu.contact') }}</h2>
                <p class="text-white">{{ __('general.section_enam.subtitle') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
    <!-- Start Generic Area -->
    <section class="about-generic-area pb-100 pt-40 ">
        <div class="container border-top-generic contact-us mt-40">
            <div class="row justify-content-center d-flex">
                <div class="col-md-6 col-lg-4 pb-4">
                    <div class="card shadow-sm mb-5 rounded position-relative" style="border: none">
                            <div class="icon icon-whatsapp">
                                <i class="fa fa-whatsapp p-3" aria-hidden="true" ></i>
                            </div>
                        <div class="card-body text-center">
                            <h4 class="mt-4 text-uppercase">{{ __('general.contact.whatsapp') }}</h4>
                            <hr>
                            <a href="" class="">+1294i1924</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm mb-5 rounded position-relative" style="border: none">
                            <div class="icon icon-whatsapp">
                                <i class="fa fa-envelope-o p-3" aria-hidden="true" ></i>
                            </div>
                        <div class="card-body text-center">
                            <h4 class="mt-4 text-uppercase">{{ __('general.contact.email') }}</h4>
                            <hr>
                            <a href="" class="">+1294i1924</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm mb-5 rounded position-relative" style="border: none">
                            <div class="icon icon-whatsapp">
                                <i class="fa fa-phone p-3" aria-hidden="true" ></i>
                            </div>
                        <div class="card-body text-center">
                            <h4 class="mt-4 text-uppercase">{{ __('general.contact.telp') }}</h4>
                            <hr>
                            <a href="" class="">+1294i1924</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm mb-5 rounded position-relative" style="border: none">
                            <div class="icon icon-whatsapp">
                                <i class="fa fa-instagram p-3" aria-hidden="true" ></i>
                            </div>
                        <div class="card-body text-center">
                            <h4 class="mt-4 text-uppercase">{{ __('general.contact.ig') }}</h4>
                            <hr>
                            <a href="" class="">+1294i1924</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm mb-5 rounded position-relative" style="border: none">
                            <div class="icon icon-whatsapp">
                                <i class="fa fa-facebook p-3" aria-hidden="true" ></i>
                            </div>
                        <div class="card-body text-center">
                            <h4 class="mt-4 text-uppercase">{{ __('general.contact.facebook') }}</h4>
                            <hr>
                            <a href="" class="">+1294i1924</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- End Generic Start -->
@endsection
