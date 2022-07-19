<!-- HEADER DESKTOP-->
<header class="header-desktop3 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="#">
                    <h4 class="text-white">BackOffice</h4>

                    <!-- <img src="images/icon/logo-white.png" alt="CoolAdmin" /> -->
                </a>
            </div>
            <div class="header__navbar">

                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('backoffice') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="bot-line"></span>Dashboard
                        </a>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="fas fa-bookmark"></i>Master
                            <span class="bot-line"></span>
                        </a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="{{ route('category-events.index') }}">Category Event</a>
                            </li>

                            <li>
                                <a href="{{ route('banner.index') }}">Banner</a>
                            </li>
                            <li>
                                <a href="{{ route('aktivitas.index') }}">Aktivitas</a>
                            </li>
                            <li>
                                <a href="{{ route('sejarah.index') }}">Sejarah</a>
                            </li>
                            <li>
                                <a href="{{ route('fasilitas.index') }}">Fasilitas</a>
                            </li>
                            <li>
                                <a href="{{ route('contact-us.index') }}">Kontak</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('events.index') }}">
                            <i class="fas fa-building"></i>
                            <span class="bot-line"></span>Events
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('galeri.index') }}">
                            <i class="fas fa-file-alt"></i>
                            <span class="bot-line"></span>Galeri
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('peta-wisata.index') }}">
                            <i class="fas fa-hotel"></i>
                            <span class="bot-line"></span>Map
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('feedback-data.index') }}">
                            <i class="fa fa-comments" aria-hidden="true"></i>
                            <span class="bot-line"></span>Feedback
                        </a>
                    </li>

                </ul>
            </div>
            <div class="header__tool">
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="{{ asset('backend/images/icon/avatar-02.jpg') }}" alt="{{ Auth::user()->name }}" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#">{{ ucwords(Auth::user()->name) }}</a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img src="{{ asset('backend/images/icon/avatar-02.jpg') }}" alt="{{ Auth::user()->name }}" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="#">{{ ucwords(Auth::user()->name) }}</a>
                                    </h5>
                                    <span class="email">{{ Auth::user()->email }}</span>
                                </div>
                            </div>
                            <div class="account-dropdown__footer">
                                <div class="account-dropdown__item">
                                    <a href="{{ route('user.index') }}">
                                        <i class="zmdi zmdi-account"></i>Edit Account</a>
                                </div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER DESKTOP-->

<!-- HEADER MOBILE-->
<header class="header-mobile header-mobile-2 d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="{{ route('backoffice') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-bookmark"></i>Master</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{ route('category-events.index') }}">Category Event</a>
                                </li>
                                <li>
                                    <a href="{{ route('banner.index') }}">Banner</a>
                                </li>
                                <li>
                                    <a href="{{ route('aktivitas.index') }}">Aktivitas</a>
                                </li>
                                <li>
                                    <a href="{{ route('sejarah.index') }}">Sejarah</a>
                                </li>
                                <li>
                                    <a href="{{ route('fasilitas.index') }}">Fasilitas</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact-us.index') }}">Kontak</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('events.index') }}">
                                <i class="fas fa-building"></i>Events</a>
                        </li>
                        <li>
                            <a href="{{ route('galeri.index') }}">
                                <i class="fas fa-file-alt"></i>Galeri</a>
                        </li>
                        <li>
                            <a href="{{ route('peta-wisata.index') }}">
                                <i class="fas fa-hotel"></i>Tourist Map</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="sub-header-mobile-2 d-block d-lg-none">
    <div class="header__tool">
        <div class="account-wrap">
            <div class="account-item account-item--style2 clearfix js-item-menu">
                <div class="image">
                    <img src="{{ asset('backend/images/icon/avatar-02.jpg') }}" alt="{{ Auth::user()->name }}"/>
                </div>
                <div class="content">
                    <a class="js-acc-btn" href="#">{{ ucwords(Auth::user()->name) }}</a>
                </div>
                <div class="account-dropdown js-dropdown">
                    <div class="info clearfix">
                        <div class="image">
                            <a href="#">
                                <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                            </a>
                        </div>
                        <div class="content">
                            <h5 class="name">
                                <a href="#">{{ ucwords(Auth::user()->name) }}</a>
                            </h5>
                            <span class="email">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                    <div class="account-dropdown__footer">
                        <a href="#">
                            <i class="zmdi zmdi-power"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END HEADER MOBILE -->
