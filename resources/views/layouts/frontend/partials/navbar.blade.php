 <!-- Start Header Area -->
 <header class="default-header">
    <nav class="navbar navbar-expand-lg navbar-light p-4">
        <div class="container">
              <a class="navbar-brand" href="index.html">
                  <img src="img/logo.png" alt="">
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="text-white lnr lnr-menu"></span>
              </button>

              <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li><a href="{{ route('home') }}#home">{{ __('general.menu.home') }}</a></li>
                    <li><a href="{{ route('event') }}">{{ __('general.menu.event') }}</a></li>
                    <li><a href="{{ route('destinasi') }}">{{ __('general.menu.destinasi') }}</a></li>
                    <li><a href="{{ route('peta-wisata') }}">{{ __('general.menu.peta') }}</a></li>
                    <li><a href="{{ route('about-us.index') }}">{{ __('general.menu.contact') }}</a></li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{strtoupper(Lang::locale())}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="lang/id">ID</a>
                          <a class="dropdown-item" href="lang/en">EN</a>
                        </div>
                    </li>
                </ul>
              </div>
        </div>
    </nav>
</header>
<!-- End Header Area -->
