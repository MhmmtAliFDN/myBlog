<header id="header" class="header-transparent"
    data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': false, 'stickyStartAt': 53, 'stickySetTop': '-53px'}">
    <div class="header-body border-top-0 h-auto box-shadow-none">
        <div class="header-top header-top-borders">
            <div class="container h-100">
                <div class="header-row h-100">
                    <div class="header-column justify-content-start">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills">
                                    <li class="nav-item py-2 d-none d-sm-inline-flex pe-2">
                                        <a
                                            class="text-color-default text-2-5 text-color-hover-primary font-weight-semibold">MUHAMMET
                                            ALI FIDAN | muhammetalifidan@email.com
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills p-relative bottom-2">
                                    <li class="nav-item py-2 d-none d-lg-inline-flex">
                                        <a href="https://www.youtube.com/@coder_log" target="_blank" title="Youtube"
                                            class="text-color-dark text-color-hover-primary text-3 anim-hover-translate-top-5px transition-2ms"><i
                                                class="fab fa-youtube text-3 p-relative top-1"></i></a>
                                    </li>
                                    <li class="nav-item py-2 d-none d-lg-inline-flex">
                                        <a href="mailto:muhammetalifidan@email.com" target="_blank" title="mail.com"
                                            class="text-color-dark text-color-hover-primary text-3 anim-hover-translate-top-5px transition-2ms"><i
                                                class="fab fa-at text-3 p-relative top-1"></i></a>
                                    </li>
                                    <li class="nav-item py-2 d-none d-lg-inline-flex">
                                        <a href="https://github.com/MhmmtAliFDN" target="_blank" title="Github"
                                            class="text-color-dark text-color-hover-primary text-3 anim-hover-translate-top-5px transition-2ms"><i
                                                class="fab fa-github text-3 p-relative top-1"></i></a>
                                    </li>
                                    <li class="nav-item py-2 pe-0 d-none d-lg-inline-flex">
                                        <a href="https://www.linkedin.com/in/muhammetalifidan/" target="_blank"
                                            title="Linkedin"
                                            class="text-color-dark text-color-hover-primary text-3 anim-hover-translate-top-5px transition-2ms"><i
                                                class="fab fa-linkedin-in text-3 p-relative top-1"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-container header-container-height-sm container p-static">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="{{route('frontend.home.index')}}">
                                <img class="rounded-circle" id="coderlog-logo" alt="Coderlog"
                                    src="{{ asset('img/images/logo/coderlog.webp') }}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-links">
                            <div
                                class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-dropdown-border-radius header-nav-main-text-capitalize header-nav-main-text-size-4 header-nav-main-arrows header-nav-main-full-width-mega-menu header-nav-main-mega-menu-bg-hover header-nav-main-effect-2">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">

                                        <li class="dropdown">
                                            <a href="{{ route('frontend.home.index') }}" class="nav-link active">
                                                {{ _('Ana Sayfa') }}
                                            </a>
                                        </li>

                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle"
                                                href="{{ route('frontend.portfolio.index') }}">
                                                {{ __('Çalışmalarım') }}
                                            </a>
                                            <ul class="dropdown-menu">
                                                @foreach ($portfolioCategories as $category)
                                                    <li class="dropdown-submenu">
                                                        <a class="dropdown-item" href="#">
                                                            {{ $category->name }}
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                @foreach ($portfolios as $portfolio)
                                                                    @if ($portfolio->category_id == $category->id)
                                                                        <a class="dropdown-item"
                                                                            href="portfolio-single-wide-slider.html">
                                                                            {{ $portfolio->name }}
                                                                        </a>
                                                                    @endif
                                                                @endforeach
                                                            </li>
                                                        </ul>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </li>

                                        <li class="dropdown dropdown-mega">
                                            <a class="dropdown-item dropdown-toggle"
                                                href="{{ route('frontend.blog.index') }}">
                                                {{ __('Bloglarım') }}
                                            </a>
                                            <ul class="dropdown-menu border-top border-top-light mt-0">
                                                <li>
                                                    <div class="dropdown-mega-content container px-2">
                                                        <div class="row px-1">
                                                            @foreach ($blogCategories as $category)
                                                                <div class="col-lg-3">
                                                                    <span
                                                                        class="dropdown-mega-sub-title">{{ $category->name }}</span>
                                                                    <ul class="dropdown-mega-sub-nav">

                                                                        @foreach ($blogs as $blog)
                                                                            @if ($blog->category_id == $category->id)
                                                                                <li><a class="dropdown-item"
                                                                                        href="elements-accordions.html">{{ $blog->name }}</a>
                                                                                </li>
                                                                            @endif
                                                                        @endforeach

                                                                    </ul>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a class="nav-link" href="{{ route('frontend.about.index') }}">
                                                {{ __('Hakkımda') }}
                                            </a>
                                        </li>

                                    </ul>
                                </nav>
                            </div>
                            <a href="{{ route('frontend.contact.index') }}"
                                class="btn btn-modern btn-primary btn-outline btn-arrow-effect-1 text-capitalize text-2-5 ms-3 me-2 d-block d-md-none d-xl-block anim-hover-translate-right-5px transition-2ms">{{ __('Benimle İletişime Geç') }}
                                <i class="fas fa-arrow-right ms-2"></i></a>
                            <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse"
                                data-bs-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>

                        {{-- Daha Sonra Geliştir --}}
                        <div class="header-nav-features header-nav-features-no-border ps-2 order-1 order-lg-2" hidden>
                            <div class="header-nav-feature header-nav-features-search d-inline-flex">
                                <a href="#" class="header-nav-features-toggle text-decoration-none"
                                    data-focus="headerSearch" aria-label="Search"><i
                                        class="fas fa-search header-nav-top-icon text-3"></i></a>
                                <div class="header-nav-features-dropdown" id="headerTopSearchDropdown">
                                    <form role="search" action="page-search-results.html" method="get">
                                        <div class="simple-search input-group">
                                            <input class="form-control text-1" id="headerSearch" name="q"
                                                type="search" value="" placeholder="Search...">
                                            <button class="btn" type="submit" aria-label="Search">
                                                <i class="fas fa-search header-nav-top-icon"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
