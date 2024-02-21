@extends('frontend.layouts.app')

@push('metaData')
    <meta name="keywords" content="projelerim, muhammet ali fidan, coderlog" />
    <meta name="description" content="Yaptığım çalışmaları ve becerilerimi gösteren portfolyoma hoş geldiniz!">
    <title>Çalışmalar</title>
@endpush

@push('customCss')
@endpush

@push('customJs')
@endpush

@section('content')
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col">
                    <div class="row">
                        <div class="col-md-12 align-self-center p-static order-2 text-center">
                            <div class="overflow-hidden pb-2">
                                <h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="maskUp"
                                    data-appear-animation-delay="100">{{ _('Geliştirdiğim Projelerim') }}</h2>
                            </div>
                        </div>
                        <div class="col-md-12 align-self-center order-1">
                            <ul class="breadcrumb d-block text-center appear-animation" data-appear-animation="fadeIn"
                                data-appear-animation-delay="200">
                                <li><a href="{{ route('frontend.home.index') }}">{{ _('Ana Sayfa') }}</a></li>
                                <li class="active">{{ _('Çalışmalarım') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="container py-2">
        <ul class="nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="portfolio"
            data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
            <li class="nav-item active" data-option-value="*"><a class="nav-link text-2-5 text-uppercase active"
                    href="#">{{ _('TÜMÜ') }}</a>
            </li>
            @foreach ($categories as $category)
                @if ($category->portfolios->count() > 0 && $category->portfolios->where('status', 'Pasif')->isEmpty())
                    <li class="nav-item" data-option-value=".{{ $category->slug }}"><a
                            class="nav-link text-2-5 text-uppercase" href="#">{{ $category->name }}</a>
                    </li>
                @endif
            @endforeach

        </ul>

        <div class="sort-destination-loader sort-destination-loader-showing mt-3">
            <div class="row portfolio-list sort-destination" data-sort-id="portfolio">

                @foreach ($portfolios as $portfolio)
                    <div class="col-lg-12 isotope-item mt-4 {{ $portfolio->category->slug }}">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="portfolio-item">
                                    <a
                                        href="{{ route('frontend.portfolio.getsingleportfolio', ['categorySlug' => $portfolio->category->slug, 'portfolioSlug' => $portfolio->slug]) }}">
                                        <span
                                            class="thumb-info thumb-info-no-zoom thumb-info-lighten border-radius-0 appear-animation"
                                            data-appear-animation="fadeIn" data-appear-animation-delay="100">
                                            <span class="thumb-info-wrapper border-radius-0">
                                                <img src="{{ asset($portfolio->image) }}" class="img-fluid border-radius-0"
                                                    alt="calisma-resim">

                                                <span class="thumb-info-action">
                                                    <span class="thumb-info-action-icon bg-dark opacity-8"><i
                                                            class="fas fa-plus"></i></span>
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6">

                                <div class="overflow-hidden">
                                    <h2 class="text-color-dark font-weight-bold text-5 mb-2 appear-animation"
                                        data-appear-animation="maskUp" data-appear-animation-delay="200"><a
                                            href="{{ route('frontend.portfolio.getsingleportfolio', ['categorySlug' => $portfolio->category->slug, 'portfolioSlug' => $portfolio->slug]) }}">
                                            {{ $portfolio->name }} </a></h2>
                                </div>

                                <p class="appear-animation" data-appear-animation="fadeInUpShorter"
                                    data-appear-animation-delay="400">{{ $portfolio->summary }}</p>

                                <ul class="list list-icons list-primary list-borders text-2 appear-animation"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                                    <li><i class="fas fa-caret-right left-10"></i> <strong
                                            class="text-color-primary">{{ _('Proje Sahibi:') }}</strong>
                                        {{ $portfolio->user->name }}</li>

                                    @php
                                        $created_at = $portfolio->created_at;
                                        $carbonDate = \Carbon\Carbon::parse($created_at);

                                        $month = $carbonDate->format('m');
                                        $year =  $carbonDate->format('Y');

                                        \Carbon\Carbon::setLocale('tr');
                                        $monthName = $carbonDate->translatedFormat('F');
                                    @endphp
                                    <li><i class="fas fa-caret-right left-10"></i> <strong
                                            class="text-color-primary">{{ _('Yayın Tarihi:') }}</strong>
                                        {{ $monthName }} {{$year}}</li>
                                    <li><i class="fas fa-caret-right left-10"></i> <strong
                                            class="text-color-primary">{{ _('Aşama:') }}</strong>
                                        {{ $portfolio->stage }}</li>
                                    {{-- <li><i class="fas fa-caret-right left-10"></i> <strong
                                            class="text-color-primary">Skills:</strong> <a href="#"
                                            class="badge badge-dark badge-sm badge-pill px-2 py-1 ml-1">DESIGN</a><a
                                            href="#"
                                            class="badge badge-dark badge-sm badge-pill px-2 py-1 ml-1">BRAND</a><a
                                            href="#"
                                            class="badge badge-dark badge-sm badge-pill px-2 py-1 ml-1">WEBSITES</a></li> --}}
                                </ul>

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
@endsection
