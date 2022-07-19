 <!-- Start Header Area -->
 <header class="default-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container" style="margin: 0 auto">
              <a class="navbar-brand text-white" href="index.html">
                  <img src="{{ asset('frontend/img/logo-badean.png') }}" width="100" style="border-radius: 25%" height="100"  alt="">
                  {{-- <strong style="font-weight: bold">Puncak Badean</strong> --}}
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="text-white lnr lnr-menu"></span>
              </button>

              <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li><a href="{{ route('home') }}#home">{{ __('general.menu.home') }}</a></li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('general.menu.about') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('sejarah') }}">{{ __('general.menu.history') }}</a>
                          <a class="dropdown-item" href="{{ route('fasilitas') }}">{{ __('general.menu.facility') }}</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('aktivitas') }}">{{ __('general.menu.activity') }}</a>
                        </div>
                    </li>
                    <li><a href="{{ route('event') }}">{{ __('general.menu.event') }}</a></li>
                    <li><a href="{{ route('galeri') }}">{{ __('general.menu.gallery') }}</a></li>
                    <li><a href="{{ route('peta-wisata') }}">{{ __('general.menu.peta') }}</a></li>
                    <li><a href="{{ route('about-us.index') }}">{{ __('general.menu.contact') }}</a></li>

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{strtoupper(Lang::locale())}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ url('lang/id') }}">ID</a>
                          <a class="dropdown-item" href="{{ url('lang/en') }}">EN</a>
                        </div>
                    </li>
                </ul>
              </div>
        </div>
    </nav>
</header>
<!-- End Header Area -->
