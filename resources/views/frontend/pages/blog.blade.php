@extends('frontend.layouts.app')

@push('title')
    <title>{{ __('Muhammet Ali Fidan | Bloglar') }}</title>
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
                            <h1 class="text-dark font-weight-bold text-9 appear-animation"
                                data-appear-animation="maskUp" data-appear-animation-delay="100">{{_('Kaleme Aldığım Bloglarım')}}</h2>
                        </div>
                    </div>
                    <div class="col-md-12 align-self-center order-1">
                        <ul class="breadcrumb d-block text-center appear-animation"
                            data-appear-animation="fadeIn" data-appear-animation-delay="300">
                            <li><a href="{{route('frontend.home.index')}}">{{_('Ana Sayfa')}}</a></li>
                            <li class="active">{{_('Bloglarım')}}</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

    <div class="container py-4">

        <div class="row">
            <div class="col-lg-3 order-lg-2">
                @include('frontend.inc.blog-sidebar')
            </div>

            <div class="col-lg-9 order-lg-1">
                <div class="blog-posts">

                    @if ($blogs->count() > 0)

                        <div class="row px-3">

                                @foreach ($blogs as $blog)
                                    <div class="col-sm-6">
                                        <article class="post post-medium border-0 pb-0 mb-5">
                                            <div class="post-image">
                                                <a href="{{ route('frontend.blog.getsinglepost', ['categorySlug' => $blog->category->slug, 'blogSlug' => $blog->slug]) }}">
                                                    <img src="{{ asset($blog->image) }}"
                                                        class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0"
                                                        alt="blog-image" />
                                                </a>
                                            </div>

                                            <div class="post-content">

                                                <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a
                                                        href="{{ route('frontend.blog.getsinglepost', ['categorySlug' => $blog->category->slug, 'blogSlug' => $blog->slug]) }}">{{ $blog->name }}</a>
                                                </h2>
                                                <p>{{$blog->summary}}</p>

                                                <div class="post-meta">
                                                    <span><i class="far fa-user"></i>{{ $blog->user->name }}</span>
                                                    <span><i class="far fa-folder"></i> <a
                                                            href="{{ route('frontend.blog.getbycategory', $blog->category->slug) }}">{{ $blog->category->name }}</a></span>
                                                    <span><i class="fa-regular fa-eye"></i>{{ $blog->view }}</span>
                                                    <span class="d-block mt-2"><a href="{{ route('frontend.blog.getsinglepost', ['categorySlug' => $blog->category->slug, 'blogSlug' => $blog->slug]) }}"
                                                            class="btn btn-xs btn-light text-1 text-uppercase">{{ _('Daha Fazlasını Oku') }}</a></span>
                                                </div>

                                            </div>
                                        </article>
                                    </div>
                                @endforeach

                        </div>

                        <div class="row">
                            <div class="col">
                                <ul class="pagination float-end">

                                    @if ($blogs->currentPage() > 1)
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $blogs->previousPageUrl() }}">
                                                <i class="fas fa-angle-left"></i>
                                            </a>
                                        </li>
                                    @endif

                                    @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                                        <li class="page-item {{ $i == $blogs->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $blogs->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    @if ($blogs->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $blogs->nextPageUrl() }}">
                                                <i class="fas fa-angle-right"></i>
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </div>

                    @else
                        <section class="http-error">
                            <div class="row justify-content-center py-3">
                                <div class="col-md-7 text-center">
                                    <div class="http-error-main">
                                        <h2>404!</h2>
                                        <p>{{_('Üzgünüm, böyle bir blog bulamadık.')}}</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif

                </div>
            </div>
        </div>

    </div>

    </div>
@endsection
