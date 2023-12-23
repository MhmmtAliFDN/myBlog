@extends('frontend.layouts.app')

@push('title')
    <title>{{ __('Muhammet Ali Fidan | Blog') }}</title>
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
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-3 order-lg-2">
                @include('frontend.inc.blog-sidebar')
            </div>

            <div class="col-lg-9 order-lg-1">
                <div class="blog-posts single-post">

                    <article class="post post-large blog-single-post border-0 m-0 p-0">

                        <div class="post-image ms-0">
                            <img src="{{ asset($blog->image) }}"
                                class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="blog-image" />
                        </div>

                        <div class="post-date ms-0">
                            <span class="day">{{ $day }}</span>
                            <span class="month">{{ $monthName }}</span>
                        </div>

                        <div class="post-content ms-0">

                            <h2 class="font-weight-semi-bold">{{ $blog->name }}</h2>

                            <div class="post-meta">
                                <span><i class="far fa-user"></i> {{ _('Yazar:') }} {{ $blog->user->name }}</span>
                                <span><i class="far fa-folder"></i> {{ _('Kategori') }} <a
                                        href="{{ route('frontend.blog.getbycategory', ['categorySlug' => $blog->category->slug]) }}">{{ $blog->category->name }}</a>
                                </span>
                                {{-- <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span> --}}
                            </div>

                            <div class="text-4">
                                {!! $blog->content !!}
                            </div>


                            <div class="post-block mt-4 pt-2 post-author">
                                <h4 class="mb-3">{{ _('Yazar') }}</h4>
                                <div class="img-thumbnail img-thumbnail-no-borders d-block pb-3">
                                    <img src="{{ $blog->user->image }}" alt="user-image">
                                    {{-- <a href="blog-post.html">
                                    <img src="{{$blog->user->image}}" alt="user-image">
                                </a> --}}
                                </div>
                                <p><strong class="name"><span
                                            class="text-4 pb-2 pt-2 d-block">{{ $blog->user->name }}</span></strong></p>
                                <p>{{ $blog->user->bio }}</p>
                            </div>



                            <!--<div id="comments" class="post-block mt-5 post-comments">
                                <h4 class="mb-3">{{ _('Yorumlar') }} (3)</h4>

                                <ul class="comments">
                                    <li>
                                        <div class="comment">
                                            <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                <img class="avatar" alt="" src="img/avatars/avatar-2.jpg">
                                            </div>
                                            <div class="comment-block">
                                                <div class="comment-arrow"></div>
                                                <span class="comment-by">
                                                    <strong>John Doe</strong>
                                                    <span class="float-end">
                                                        <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span>
                                                    </span>
                                                </span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.</p>
                                                <span class="date float-end">January 12, 2023 at 1:38 pm</span>
                                            </div>
                                        </div>

                                        <ul class="comments reply">
                                            <li>
                                                <div class="comment">
                                                    <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                        <img class="avatar" alt="" src="img/avatars/avatar-3.jpg">
                                                    </div>
                                                    <div class="comment-block">
                                                        <div class="comment-arrow"></div>
                                                        <span class="comment-by">
                                                            <strong>John Doe</strong>
                                                            <span class="float-end">
                                                                <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span>
                                                            </span>
                                                        </span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
                                                        <span class="date float-end">January 12, 2023 at 1:38 pm</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="comment">
                                                    <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                        <img class="avatar" alt="" src="img/avatars/avatar-4.jpg">
                                                    </div>
                                                    <div class="comment-block">
                                                        <div class="comment-arrow"></div>
                                                        <span class="comment-by">
                                                            <strong>John Doe</strong>
                                                            <span class="float-end">
                                                                <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span>
                                                            </span>
                                                        </span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
                                                        <span class="date float-end">January 12, 2023 at 1:38 pm</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="comment">
                                            <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                <img class="avatar" alt="" src="img/avatars/avatar.jpg">
                                            </div>
                                            <div class="comment-block">
                                                <div class="comment-arrow"></div>
                                                <span class="comment-by">
                                                    <strong>John Doe</strong>
                                                    <span class="float-end">
                                                        <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span>
                                                    </span>
                                                </span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                <span class="date float-end">January 12, 2023 at 1:38 pm</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="comment">
                                            <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                <img class="avatar" alt="" src="img/avatars/avatar.jpg">
                                            </div>
                                            <div class="comment-block">
                                                <div class="comment-arrow"></div>
                                                <span class="comment-by">
                                                    <strong>John Doe</strong>
                                                    <span class="float-end">
                                                        <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span>
                                                    </span>
                                                </span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                <span class="date float-end">January 12, 2023 at 1:38 pm</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                            </div>

                            <div class="post-block mt-5 post-leave-comment">
                                <h4 class="mb-3">{{ _('Kendi yorumunu yaz') }}</h4>

                                <form class="contact-form p-4 rounded bg-color-grey" action="php/contact-form.php" method="POST">
                                    <div class="p-2">
                                        <div class="row">
                                            {{-- <div class="form-group col-lg-6">
                                            <label class="form-label required font-weight-bold text-dark">Full Name</label>
                                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="form-label required font-weight-bold text-dark">Email Address</label>
                                            <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" required>
                                        </div> --}}
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label class="form-label required font-weight-bold text-dark">{{ _('Yorum') }}</label>
                                                <textarea maxlength="5000" data-msg-required="Please enter your message." rows="4" class="form-control"
                                                    name="message" required></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col mb-0">
                                                <input type="submit" value="Gönder" class="btn btn-primary btn-modern" data-loading-text="Loading...">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>-->

                        </div>
                    </article>

                </div>
            </div>
        </div>

    </div>
@endsection
