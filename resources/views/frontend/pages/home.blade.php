@extends('frontend.layouts.app')

@push('title')
    <title>{{ __('Ana Sayfa | Muhammet Ali Fidan') }}</title>
@endpush

@push('customCss')
@endpush

@push('customJs')
@endpush

@section('content')
    <section class="section border-0 m-0 bg-color-quaternary p-relative">
        <div class="container">
            <div class="row custom-hero-row">

                <div class="col">
                    <div class="row pt-5 mt-5 mb-5 pb-5">

                        <div class="col-12 col-lg-6 p-relative pt-5 mt-5">
                            <div class="divider divider-small divider-small-lg appear-animation"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
                                <hr class="bg-primary border-radius">
                            </div>
                            <div class="overflow-hidden mb-1">
                                <h2 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4-5 line-height-2 line-height-sm-7 mb-0 appear-animation"
                                    data-appear-animation="maskUp" data-appear-animation-delay="100">
                                    {{ _('KODLARLA İNŞA ETMEK') }}</h2>
                            </div>
                            <h1 class="text-color-dark font-weight-bold text-9 pb-2 mb-4 appear-animation"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                                {{ _('Yenilikçi Çözümler,') }}<br>{{ _('Kullanıcı Odaklı Tasarımlar') }}</h1>
                            <div class="d-block appear-animation" data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="300">
                                <a href="#start" data-hash data-hash-offset="0" data-hash-offset-lg="100"
                                    class="btn btn-modern btn-primary btn-arrow-effect-1 text-capitalize text-2-5 px-5 py-3 anim-hover-translate-top-5px transition-2ms">{{ _('Daha Fazla') }}
                                    <i class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                            <div class="pt-5 appear-animation" data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="400">
                                <span class="d-inline-block anim-hover-translate-bottom-5px transition-2ms">
                                    <a href="#start" data-hash data-hash-offset="0" data-hash-offset-lg="100"
                                        class="btn btn-default text-color-primary border-color-primary bg-transparent rotate-r-90 btn-circle border-width-2 btn-lg"><i
                                            class="fas fa-arrow-right"></i></a>
                                </span>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-relative text-end">

                            <div class="appear-animation custom-element-wrapper custom-element-6"
                                data-appear-animation="expandIn" data-appear-animation-delay="500">
                                <div class="bg-color-primary particle particle-dots w-100 h-100 opacity-3"></div>
                            </div>

                            <div class="appear-animation custom-element-wrapper custom-element-7"
                                data-appear-animation="expandIn" data-appear-animation-delay="700">
                                <div class="bg-color-primary particle particle-dots w-100 h-100 opacity-3"></div>
                            </div>

                            <div class="appear-animation custom-element-wrapper p-relative custom-element-5"
                                data-appear-animation="expandIn" data-appear-animation-delay="0">
                                <div class="w-100 h-100">
                                    <div class="custom-element rotate-r-45"></div>
                                </div>
                            </div>

                            <img class="appear-animation img-fluid custom-element-wrapper custom-element-8" id="alex-ben"
                                data-appear-animation="fadeIn" data-appear-animation-delay="900"
                                src="{{ asset('img/images/alex-ben.webp') }}" alt="ben-ve-kedim">

                        </div>

                    </div>

                    <div class="row align-items-end justify-content-end pt-5">
                        <div class="col-lg-9 text-end pt-5">
                            <div class="appear-animation">
                                <div
                                    class="owl-carousel owl-theme stage-margin rounded-nav nav-dark nav-icon-1 nav-size-md nav-position-1">
                                    <div
                                        class="overlay overlay-color-primary overlay-show overlay-op-8 rounded overflow-hidden">
                                        {{-- <img alt="" class="img-fluid rounded" src="{{asset('assets/frontend/img/generic/generic-2.jpg')}}"> --}}
                                        <a href="#"
                                            class="p-absolute z-index-2 top-0 left-0 w-100 h-100 anim-hover-translate-top-5px transition-2ms">
                                            <span
                                                class="p-absolute left-0 bottom-0 text-color-light text-start ms-4 mb-3 ps-2 pb-1">
                                                <strong class="text-5 negative-ls-05 font-weight-bold">Why Choose
                                                    Us</strong>
                                                <p
                                                    class="font-weight-medium text-color-light opacity-7 p-relative bottom-4 mb-0">
                                                    Lorem ipsum dolor sit amet...</p>
                                            </span>
                                        </a>
                                    </div>
                                    <div
                                        class="overlay overlay-color-dark overlay-show overlay-op-9 rounded overflow-hidden">
                                        {{-- <img alt="" class="img-fluid rounded" src="{{asset('assets/frontend/img/generic/generic-3.jpg')}}"> --}}
                                        <a href="#"
                                            class="p-absolute z-index-2 top-0 left-0 w-100 h-100 anim-hover-translate-top-5px transition-2ms">
                                            <span
                                                class="p-absolute left-0 bottom-0 text-color-light text-start ms-4 mb-3 ps-2 pb-1">
                                                <strong class="text-5 negative-ls-05 font-weight-bold">Consulting for
                                                    Growth</strong>
                                                <p
                                                    class="font-weight-medium text-color-light opacity-7 p-relative bottom-4 mb-0">
                                                    Lorem ipsum dolor sit amet...</p>
                                            </span>
                                        </a>
                                    </div>
                                    <div
                                        class="overlay overlay-color-primary overlay-show overlay-op-8 rounded overflow-hidden">
                                        {{-- <img alt="" class="img-fluid rounded" src="{{asset('assets/frontend/img/generic/generic-4.jpg')}}"> --}}
                                        <a href="#"
                                            class="p-absolute z-index-2 top-0 left-0 w-100 h-100 anim-hover-translate-top-5px transition-2ms">
                                            <span
                                                class="p-absolute left-0 bottom-0 text-color-light text-start ms-4 mb-3 ps-2 pb-1">
                                                <strong class="text-5 negative-ls-05 font-weight-bold">Why Choose
                                                    Us</strong>
                                                <p
                                                    class="font-weight-medium text-color-light opacity-7 p-relative bottom-4 mb-0">
                                                    Lorem ipsum dolor sit amet...</p>
                                            </span>
                                        </a>
                                    </div>
                                    <div
                                        class="overlay overlay-color-dark overlay-show overlay-op-9 rounded overflow-hidden">
                                        {{-- <img alt="" class="img-fluid rounded" src="{{asset('assets/frontend/img/generic/generic-5.jpg')}}"> --}}
                                        <a href="#"
                                            class="p-absolute z-index-2 top-0 left-0 w-100 h-100 anim-hover-translate-top-5px transition-2ms">
                                            <span
                                                class="p-absolute left-0 bottom-0 text-color-light text-start ms-4 mb-3 ps-2 pb-1">
                                                <strong class="text-5 negative-ls-05 font-weight-bold">Consulting for
                                                    Growth</strong>
                                                <p
                                                    class="font-weight-medium text-color-light opacity-7 p-relative bottom-4 mb-0">
                                                    Lorem ipsum dolor sit amet...</p>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="appear-animation custom-element-wrapper custom-element-1" data-appear-animation="expandIn"
            data-appear-animation-delay="200">
            <div class="w-100 h-100" data-plugin-float-element
                data-plugin-options="{'startPos': 'bottom', 'speed': 2.1, 'transition': true, 'transitionDuration': 500}">
                <div class="custom-element rotate-r-45"></div>
            </div>
        </div>

        <div class="appear-animation custom-element-wrapper custom-element-2" data-appear-animation="expandIn"
            data-appear-animation-delay="200">
            <div class="w-100 h-100" data-plugin-float-element
                data-plugin-options="{'startPos': 'bottom', 'speed': 2.2, 'transition': true, 'transitionDuration': 500}">
                <div class="custom-element rotate-r-45"></div>
            </div>
        </div>

        <div class="appear-animation custom-element-wrapper custom-element-3" data-appear-animation="expandIn"
            data-appear-animation-delay="200">
            <div class="w-100 h-100" data-plugin-float-element
                data-plugin-options="{'startPos': 'bottom', 'speed': 2.3, 'transition': true, 'transitionDuration': 500}">
                <div class="custom-element rotate-r-45"></div>
            </div>
        </div>

        <div class="appear-animation custom-element-wrapper custom-element-4" data-appear-animation="expandIn"
            data-appear-animation-delay="200">
            <div class="w-100 h-100" data-plugin-float-element
                data-plugin-options="{'startPos': 'bottom', 'speed': 2.4, 'transition': true, 'transitionDuration': 500}">
                <div class="custom-element rotate-r-45"></div>
            </div>
        </div>

    </section>

    <section class="section border-0 bg-transparent m-0" id="start">
        <div class="container py-5 mb-3">
            <div class="row">
                <div class="col text-center">

                    <div class="divider divider-small divider-small-lg mt-0 text-center appear-animation"
                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
                        <hr class="bg-primary border-radius m-auto">
                    </div>
                    <div class="overflow-hidden mb-1">
                        <h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="100">
                            {{ _('KİŞİSEL ÖZELLİKLERİM') }}</h3>
                    </div>
                    <h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-4 appear-animation"
                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                        {{ _('Her zaman yapabileceğimin en iyisini') }}<br>{{ _('yapmak için kararlıyım') }}</h2>

                </div>
            </div>
            <div class="row pt-4 pb-5">
                <div class="col-lg-6 text-center p-relative pt-5">

                    <div class="appear-animation custom-element-wrapper custom-element-9" data-appear-animation="expandIn"
                        data-appear-animation-delay="1000">
                        <div class="bg-color-primary particle particle-dots w-100 h-100 opacity-3"></div>
                    </div>

                    <div class="appear-animation custom-element-wrapper custom-element-10"
                        data-appear-animation="expandIn" data-appear-animation-delay="1200">
                        <div class="bg-color-primary particle particle-dots w-100 h-100 opacity-3"></div>
                    </div>

                    <div class="appear-animation custom-element-wrapper custom-element-11 p-relative rotate-r-45"
                        data-appear-animation="fadeIn" data-appear-animation-delay="300">
                        <img class="img-fluid" src="{{ asset('img/images/kisisel-ozelliklerim.webp') }}"
                            style="width: 340px; height:340px" alt="kisisel-ozelliklerim">
                    </div>

                </div>
                <div class="col-lg-6 pt-5 mt-5 pt-lg-0 mt-lg-0">
                    <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
                        <p class="font-weight-medium text-4-5 line-height-5">
                            {{ _('Yaşamımı yönlendiren en önemli güçlerden biri tutkum. Her işe ve her anıma büyük bir tutkuyla yaklaşırım. Hayallerime ulaşmak için kararlılıkla çalışır, engelleri aşmak için azimle çabalarımı sürdürürüm.') }}
                        </p>
                        <p class="text-3-5">
                            {{ _('İletişim yeteneklerim ve empati duygum, çeşitli insanlarla güçlü bağlar kurmamı sağlar. İnsanların benimle paylaştıkları deneyimler, hayata dair farklı perspektifleri anlamama ve gelişmeme yardımcı olur.') }}
                        </p>

                        <ul class="list list-icons list-icons-style-2 list-icons-lg">
                            <li class="line-height-9 text-3-5 mb-1">
                                <i class="fas fa-check border-width-2 text-3"></i>{{ _('Tutkulu ve Kararlı') }}
                            </li>
                            <li class="line-height-9 text-3-5 mb-1">
                                <i class="fas fa-check border-width-2 text-3"></i>{{ _('Yaratıcı ve Analitik Düşünce') }}
                            </li>
                            <li class="line-height-9 text-3-5 mb-1">
                                <i class="fas fa-check border-width-2 text-3"></i>
                                {{ _('İnsan İlişkilerinde Becerikli') }}
                            </li>
                        </ul>
                    </div>

                    <div class="d-block pt-4 appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="300">
                        <a href="{{ route('frontend.about.index') }}"
                            class="btn btn-modern btn-primary btn-arrow-effect-1 text-capitalize text-2-5 px-5 py-3 anim-hover-translate-top-5px transition-2ms">{{ _('Hakkımda Daha Detaylı Bilgi') }}
                            <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section border-0 bg-quaternary m-0">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col col-lg-9 text-center">

                    <div class="divider divider-small divider-small-lg mt-0 text-center appear-animation"
                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
                        <hr class="bg-primary border-radius m-auto">
                    </div>
                    <div class="overflow-hidden mb-1">
                        <h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="100">{{ _('ÇALIŞMALARIM') }}
                        </h3>
                    </div>
                    <h2 class="text-color-dark font-weight-bold text-8 pb-4 mb-0 appear-animation"
                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                        {{ _('Her Proje Bir Farklı Tecrübe') }}</h2>

                    <p class="font-weight-medium text-4-5 line-height-5 appear-animation"
                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                        {{ _('Asp.Net, Angular, Typescript, PHP, Laravel, HTML, CSS, JavaScript ve Flutter') }}</p>

                </div>
            </div>

            <div class="row py-5 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">

                @foreach ($portfolios as $portfolio)
                    <div class="col-md-4">
                        <div
                            class="card card-border card-border-top card-border-hover bg-color-light border-0 box-shadow-6 box-shadow-hover anim-hover-translate-top-10px transition-3ms anim-hover-inner-wrapper">
                            <div class="card-body p-relative zindex-1 p-5 text-center">
                                <div class="anim-hover-inner-translate-top-20px transition-3ms">
                                    <img width="250" height="200" class="rounded"
                                        src="{{ asset($portfolio->image) }}" alt="proje-resmi" />
                                    <h4 class="card-title mt-4 mb-2 text-5 font-weight-bold">
                                        {{ $portfolio->name }}</h4>
                                    <p>{{ $portfolio->summary }}</p>
                                </div>
                                <div
                                    class="w-100 text-center p-absolute opacity-0 bottom-30 left-0 transformY-p100 anim-hover-inner-opacity-10 anim-hover-inner-translate-top-0px transition-4ms">
                                    <a href="{{ route('frontend.portfolio.getsingleportfolio', ['categorySlug' => $portfolio->category->slug, 'portfolioSlug' => $portfolio->slug]) }}"
                                        class="read-more text-color-primary font-weight-semibold mt-2 text-2">
                                        {{ _('Proje Hakkında Daha Fazla Bilgi') }} <i
                                            class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="row justify-content-center">
                <div class="col col-lg-9 text-center">

                    <div class="d-block pt-4 appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="300">
                        <a href="{{ route('frontend.portfolio.index') }}"
                            class="btn btn-modern btn-primary btn-arrow-effect-1 text-capitalize text-2-5 px-5 py-3 anim-hover-translate-top-5px transition-2ms">{{ _('Daha Fazla Proje') }}
                            <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="section border-0 bg-light m-0">
        <div class="container py-5">
            <div class="row align-items-center text-center">
                <div class="col-sm-4 col-lg-2 mb-5 mb-lg-0">
                    <img src="{{ asset('img/images/icon/csharp.svg') }}" alt="" class="img-fluid"
                        style="max-width: 90px;">
                </div>
                <div class="col-sm-4 col-lg-2 mb-5 mb-lg-0">
                    <img src="{{ asset('img/images/icon/angular.svg') }}" alt="" class="img-fluid"
                        style="max-width: 90px;">
                </div>
                <div class="col-sm-4 col-lg-2 mb-5 mb-lg-0">
                    <img src="{{ asset('img/images/icon/laravel.svg') }}" alt="" class="img-fluid"
                        style="max-width: 90px;">
                </div>
                <div class="col-sm-4 col-lg-2 mb-5 mb-sm-0">
                    <img src="{{ asset('img/images/icon/php.svg') }}" alt="" class="img-fluid"
                        style="max-width: 140px;">
                </div>
                <div class="col-sm-4 col-lg-2 mb-5 mb-sm-0">
                    <img src="{{ asset('img/images/icon/python.svg') }}" alt="" class="img-fluid"
                        style="max-width: 90px;">
                </div>
                <div class="col-sm-4 col-lg-2">
                    <img src="{{ asset('img/images/icon/flutter.svg') }}" alt="" class="img-fluid"
                        style="max-width: 70px;">
                </div>
            </div>
        </div>
    </section>

    <section class="section border-0 bg-quaternary m-0">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col col-lg-9 text-center">

                    <div class="divider divider-small divider-small-lg mt-0 text-center appear-animation"
                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
                        <hr class="bg-primary border-radius m-auto">
                    </div>
                    <div class="overflow-hidden mb-1">
                        <h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="100">{{ _('BLOGLARIM') }}</h3>
                    </div>
                    <h2 class="text-color-dark font-weight-bold text-8 pb-4 mb-0 appear-animation"
                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                        {{ _('En Yeni İçerikler') }}</h2>

                </div>
            </div>

            <div class="row justify-content-center appear-animation" data-appear-animation="fadeIn"
                data-appear-animation-delay="300">

                @foreach ($blogs as $blog)
                    <div class="col-9 col-md-6 col-lg-4">
                        <a href="{{ route('frontend.blog.getsinglepost', ['categorySlug' => $blog->category->slug, 'blogSlug' => $blog->slug]) }}"
                            class="text-decoration-none">
                            <div class="card border-0 bg-transparent">
                                <div class="card-img-top position-relative overlay overflow-hidden border-radius">
                                    <div
                                        class="position-absolute bottom-10 right-0 d-flex justify-content-end w-100 py-3 px-4 z-index-3">
                                        @php
                                            $created_at = $blog->created_at;
                                            $carbonDate = \Carbon\Carbon::parse($created_at);

                                            $day = $carbonDate->format('d');
                                            $month = $carbonDate->format('m');

                                            \Carbon\Carbon::setLocale('tr');
                                            $monthName = strtoupper(mb_substr($carbonDate->translatedFormat('F'), 0, 3));
                                        @endphp
                                        <span
                                            class="text-center bg-primary text-color-light border-radius font-weight-semibold line-height-2 px-3 py-2">
                                            <span class="position-relative text-6 z-index-2">
                                                {{ $day }}
                                                <span class="d-block text-0 positive-ls-2 px-1">{{ $monthName }}</span>
                                            </span>
                                        </span>
                                    </div>
                                    <img src="{{ asset($blog->image) }}" class="img-fluid border-radius"
                                        alt="blog-resmi" />
                                </div>
                                <div class="card-body py-4 px-0">
                                    <span
                                        class="d-block text-color-grey font-weight-semibold positive-ls-2 text-2">{{ $blog->user->name }}</span>
                                    <h4 class="font-weight-bold text-5 text-color-hover-primary mb-2">{{ $blog->name }}
                                    </h4>
                                    <a href="{{ route('frontend.blog.getsinglepost', ['categorySlug' => $blog->category->slug, 'blogSlug' => $blog->slug]) }}"
                                        class="read-more text-color-primary font-weight-semibold mt-0 text-2">{{ _('Devamını Okuyun') }}
                                        <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="row justify-content-center">
                <div class="col col-lg-9 text-center">

                    <div class="d-block pt-4 appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="300">
                        <a href="{{ route('frontend.blog.index') }}"
                            class="btn btn-modern btn-primary btn-arrow-effect-1 text-capitalize text-2-5 px-5 py-3 anim-hover-translate-top-5px transition-2ms">{{ _('Daha Fazla Blog') }}
                            <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
