@extends('frontend.layouts.app')

@push('title')
    <title>{{ __('Proje | Muhammet Ali Fidan') }}</title>
@endpush

@push('customCss')
@endpush

@push('customJs')
    <script async charset="utf-8" src="{{ asset('assets/frontend/js/embed.js') }}"></script>

    <!-- CkEditor Media Embed -->
    <script>
        document.querySelectorAll('oembed[url]').forEach(element => {
            const anchor = document.createElement('a');

            anchor.setAttribute('href', element.getAttribute('url'));
            anchor.className = 'embedly-card';

            element.appendChild(anchor);
        });
    </script>
    <!-- /ckeditor media embed -->
@endpush

@section('content')
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md ">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col">
                    <div class="row">
                        <div class="col-md-12 align-self-center p-static order-2 text-center">
                            <div class="overflow-hidden pb-2">
                                <h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="maskUp"
                                    data-appear-animation-delay="100">{{ $portfolio->name }}
                                    </h2>
                            </div>
                        </div>
                        <div class="col-md-12 align-self-center order-1">
                            <ul class="breadcrumb d-block text-center appear-animation" data-appear-animation="fadeIn"
                                data-appear-animation-delay="300">
                                <li><a href="{{ route('frontend.home.index') }}">{{ _('Ana Sayfa') }}</a></li>
                                <li class="active">{{ _('Proje') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="container py-4">

        <div class="row">
            <div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">

                <div class="owl-carousel owl-theme nav-inside nav-inside-edge nav-squared nav-with-transparency nav-dark nav-lg d-block overflow-hidden"
                    data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'autoHeight': true}"
                    style="height: 510px;">
                    <div>
                        <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                            <img src="{{ asset($portfolio->image) }}" class="img-fluid border-radius-0"
                                alt="proje-detay-resimleri">
                        </div>
                    </div>
                    <div>
                        <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                            <img src="img/projects/project-short-2.jpg" class="img-fluid border-radius-0" alt="">
                        </div>
                    </div>
                    <div>
                        <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                            <img src="img/projects/project-short-3.jpg" class="img-fluid border-radius-0" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row pt-4 mt-2 mb-5">
            <div class="col-md-7 mb-4 mb-md-0">

                <h2 class="text-color-dark font-weight-normal text-5 mb-2">{{ _('Proje') }} <strong
                        class="font-weight-extra-bold">{{ _('Hakkında') }}</strong></h2>

                {!! $portfolio->content !!}

                <hr class="solid my-5">

                <strong
                    class="text-uppercase text-1 me-3 text-dark float-start position-relative top-2">{{ _('Paylaş') }}</strong>
                <ul class="social-icons">
                    <li class="social-icons-facebook"><a
                            href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($currentPageUrl) }}"
                            target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="social-icons-twitter"><a
                            href="https://twitter.com/intent/tweet?url={{ urlencode($currentPageUrl) }}" target="_blank"
                            title="Twitter"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="social-icons-linkedin"><a
                            href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($currentPageUrl) }}"
                            target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                    <li class="social-icons-whatsapp"><a href="whatsapp://send?text={{ urlencode($currentPageUrl) }}"
                            target="_blank" title="Whatsapp"><i class="fab fa-whatsapp fa-lg"></i></a>
                    </li>
                </ul>

            </div>
            <div class="col-md-5">
                <h2 class="text-color-dark font-weight-normal text-5 mb-2">{{ _('Proje') }} <strong
                        class="font-weight-extra-bold">{{ _('Detayları') }}</strong></h2>
                <ul class="list list-icons list-primary list-borders text-2">
                    <li><i class="fas fa-caret-right left-10"></i> <strong
                            class="text-color-primary">{{ _('Geliştirici:') }}</strong> {{ $portfolio->user->name }}</li>
                    <li><i class="fas fa-caret-right left-10"></i> <strong
                            class="text-color-primary">{{ _('Yayın Tarihi:') }}</strong> {{$monthName}} {{ $year }}</li>
                    {{-- <li><i class="fas fa-caret-right left-10"></i> <strong
                            class="text-color-primary">{{ _('Kullanılan Teknolojiler:') }}</strong> <a href="#"
                            class="badge badge-dark badge-sm rounded-pill px-2 py-1 ms-1">DESIGN</a><a href="#"
                            class="badge badge-dark badge-sm rounded-pill px-2 py-1 ms-1">BRAND</a><a href="#"
                            class="badge badge-dark badge-sm rounded-pill px-2 py-1 ms-1">WEBSITES</a></li> --}}
                    <li><i class="fas fa-caret-right left-10"></i> <strong
                            class="text-color-primary">{{ _('Proje URL:') }}</strong> <a
                            href="{{ route('frontend.home.index') }}" target="_blank"
                            class="text-dark">https://www.muhammetalifidan.com</a></li>
                </ul>
            </div>
        </div>

    </div>

    <section class="section section-height-3 bg-color-grey m-0 border-0">
        <div class="container py-4">
            <h4 class="mb-3 text-4 text-uppercase">{{ _('Diğer') }} <strong
                    class="font-weight-extra-bold">{{ _('Projelerim') }}</strong></h4>
            <div class="row">

                @foreach ($portfolios as $portfolio)
                    <div class="col-12 col-sm-6 col-lg-3 mb-4">
                        <div class="portfolio-item">
                            <a
                                href="{{ route('frontend.portfolio.getsingleportfolio', ['categorySlug' => $portfolio->category->slug, 'portfolioSlug' => $portfolio->slug]) }}">
                                <span class="thumb-info thumb-info-lighten thumb-info-no-borders border-radius-0">
                                    <span class="thumb-info-wrapper border-radius-0">
                                        <img src="{{ asset($portfolio->image) }}" class="img-fluid border-radius-0"
                                            alt="proje-resmi">
                                        <span class="thumb-info-title">
                                            <span class="thumb-info-inner">{{ $portfolio->category->name }}</span>
                                            <span class="thumb-info-type">{{ $portfolio->user->name }}</span>
                                        </span>
                                        <span class="thumb-info-action">
                                            <span class="thumb-info-action-icon bg-dark opacity-8"><i
                                                    class="fas fa-plus"></i></span>
                                        </span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
