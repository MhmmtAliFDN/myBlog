<aside class="sidebar">
    <form action="{{route('frontend.blog.index')}}" method="get">
        <div class="input-group mb-3 pb-1">
            <input class="form-control text-1" placeholder="Ara..." name="ara" id="ara" type="text">
            <button type="submit" class="btn btn-dark text-1 p-2">
                <i class="fas fa-search m-2"></i>
            </button>
        </div>
    </form>
    <h5 class="font-weight-semi-bold pt-4">{{ _('KATEGORİLER') }}</h5>
    <ul class="nav nav-list flex-column mb-5">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('frontend.blog.index') }}">
                {{ _('Tümü') }}
            </a>
        </li>
        @foreach ($categories as $category)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('frontend.blog.getbycategory', $category->slug) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach

    </ul>
    <div class="tabs tabs-dark mb-4 pb-2">
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link show active text-1 font-weight-bold text-uppercase"
                    href="#popularPosts" data-bs-toggle="tab">{{ _('Çok Okunan') }}</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="popularPosts">
                <ul class="simple-post-list">
                    @foreach ($popularBlogs as $blog)
                        <li>
                            <div class="post-image">
                                <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                    <a href="{{route('frontend.blog.getsinglepost', ['categorySlug' => $blog->category->slug, 'blogSlug' => $blog->slug])}}">
                                        <img src="{{ asset($blog->image) }}" width="75" height="75"
                                            alt="blog-image">
                                    </a>
                                </div>
                            </div>

                            @php
                                $created_at = $blog->created_at;
                                $carbonDate = \Carbon\Carbon::parse($created_at);

                                $day = $carbonDate->format('d');
                                $month = $carbonDate->format('m');
                                $year =  $carbonDate->format('Y');

                                \Carbon\Carbon::setLocale('tr');
                                $monthName = strtoupper($carbonDate->translatedFormat('F'));
                            @endphp
                            <div class="post-info">
                                <a href="{{route('frontend.blog.getsinglepost', ['categorySlug' => $blog->category->slug, 'blogSlug' => $blog->slug])}}">{{ $blog->name }}</a>
                                <div class="post-meta">
                                    <i class="fa-solid fa-calendar-days my-2"></i>
                                    {{$day}} {{ $monthName }} {{$year}}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <h5 class="font-weight-semi-bold pt-4"><strong>{{ _('Unutma') }}</strong></h5>
    <p>{{ _('"Okumanın ve araştırmanın önemi, kendi bilgi dünyanızı genişletmenin ve sınırlarınızı
                                    aşmanın anahtarıdır. Her kitap, makale veya yazı, yeni bir kapı açarak sizi farklı
                                    dünyalara taşıyabilir. Bilgi güçtür, ancak bu gücü elde etmek için önce bilgiye açık olmalısınız."') }}
    </p>
</aside>
