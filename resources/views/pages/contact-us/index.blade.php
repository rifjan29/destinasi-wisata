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
            <div class="row">
                <div class="col-md-6">
                    <div class="row justify-content-center d-flex">
                        @forelse ($data as $item)
                            <div class="col-md-5 col-lg-12 pb-4">
                                <div class="card shadow-sm mb-5 rounded position-relative" style="width: 350px">
                                        <div class="icon icon-whatsapp">
                                            <i class="{{ $item->icon }} data-icon" aria-hidden="true" ></i>
                                        </div>
                                    <div class="card-body text-center">
                                        <h4 class="mt-4 text-uppercase">{{ $item->link }}</h4>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        @empty

                        @endforelse
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row d-flex justify-content-center">
                        <div class="menu-content pb-60 col-lg-8">
                            <div class="title text-center">
                                <h1 class="mb-10">{{ __('general.feedback.title') }}</h1>
                                <p>{{ __('general.feedback.subtitle') }}</p>
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                    @include('layouts.backend._partials.notif')
                    <form class="form-area " id="myForm" action="{{ route('about-us.store') }}" method="post" class="contact-form text-right">
                        @csrf
                        <div class="row">
                        <div class="col-lg-12 form-group">
                            <input name="name" placeholder="{{ __('general.message.name') }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ __('general.message.name') }}'" class="common-input mb-20 form-control" required="" type="text">

                            <input name="email" placeholder="{{ __('general.message.email') }}" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ __('general.message.email') }}'" class="common-input mb-20 form-control" required="" type="email">

                            <input name="subject" placeholder="{{ __('general.message.subject') }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ __('general.message.subject') }}'" class="common-input mb-20 form-control" required="" type="text">
                        </div>
                        <div class="col-lg-12 form-group">
                            <textarea class="common-textarea mt-10 form-control" name="message" placeholder="{{ __('general.message.messege') }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ __('general.message.messege') }}'" required=""></textarea>
                            <button type="submit" class="primary-btn mt-20">{{ __('general.message.button') }}<span class="lnr lnr-arrow-right"></span></button>
                            <div class="alert-msg">
                        </div>
                        </div></div>
                    </form>
                </div>
            </div>

        </div>
    </section>
<!-- End Generic Start -->
@endsection
