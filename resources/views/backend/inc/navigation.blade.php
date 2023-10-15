<!-- Main navbar -->
<div class="navbar navbar-expand-xl navbar-static shadow">
    <div class="container-fluid">
        <div class="navbar-brand flex-1"></div>
        <div class="d-flex w-100 w-xl-auto overflow-auto overflow-xl-visible scrollbar-hidden border-top border-top-xl-0 order-1 order-xl-0 pt-2 pt-xl-0 mt-2 mt-xl-0">
            <ul class="nav gap-1 justify-content-center flex-nowrap flex-xl-wrap mx-auto">
                <li class="nav-item">
                    <a href="{{ route('backend.dashboard.index') }}" class="navbar-nav-link rounded
                    {{Route::currentRouteName() === 'backend.dashboard.index' ? 'active' : ''}}">
                        <i class="ph-house me-2"></i>
                        {{__('Ana Sayfa')}}
                    </a>
                </li>

                <li class="nav-item nav-item-dropdown">
                    <a href="{{ route('backend.contact.index') }}" class="navbar-nav-link rounded
                    {{Route::currentRouteName() === 'backend.contact.index' ? 'active' : ''}}">
                        <i class="ph-phone-call me-2"></i>
                        {{__('İletişim')}}
                    </a>
                </li>

                <li class="nav-item nav-item-dropdown-xl dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle rounded
                    {{(Route::currentRouteName() === 'backend.blog.index') ||
                    (Route::currentRouteName() === 'backend.blogcategory.index') }}" data-bs-toggle="dropdown">
                        <i class="ph-article me-2"></i>
                        {{__('Blog')}}
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('backend.blog.index') }}" class="dropdown-item rounded
                        {{Route::currentRouteName() === 'backend.blog.index' ? 'active' : ''}}"><i class="ph-stack me-2"></i>{{__('Bloglar')}}</a>
                        <a href="{{ route('backend.blogcategory.index') }}" class="dropdown-item rounded
                        {{Route::currentRouteName() === 'backend.blogcategory.index' ? 'active' : ''}}"><i class="ph-folders me-2"></i>{{__('Kategoriler')}}</a>
                    </div>
                </li>

                <li class="nav-item nav-item-dropdown-xl dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle rounded
                    {{(Route::currentRouteName() === 'backend.comment.index') ||
                    (Route::currentRouteName() === 'backend.commentreport.index') ? 'active' : ''}}" data-bs-toggle="dropdown">
                        <i class="ph-chat-circle-dots me-2"></i>
                        {{__('Yorum')}}
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('backend.comment.index') }}" class="dropdown-item rounded
                        {{Route::currentRouteName() === 'backend.comment.index' ? 'active' : ''}}"><i class="ph-chats-circle me-2"></i>{{__('Yorumlar')}}</a>
                        <a href="{{ route('backend.commentreport.index') }}" class="dropdown-item rounded
                        {{Route::currentRouteName() === 'backend.commentreport.index' ? 'active' : ''}}"><i class="ph-smiley-sad me-2"></i>{{__('Şikayetler')}}</a>
                    </div>
                </li>

                <li class="nav-item nav-item-dropdown-xl dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle rounded
                    {{(Route::currentRouteName() === 'backend.portfolio.index') || (Route::currentRouteName() === 'backend.portfoliocategory.index')
                        ? 'active' : ''}}" data-bs-toggle="dropdown">
                        <i class="ph-code me-2"></i>
                        {{__('Portföy')}}
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('backend.portfolio.index') }}" class="dropdown-item rounded
                        {{Route::currentRouteName() === 'backend.portfolio.index' ? 'active' : ''}}"><i class="ph-note-pencil me-2"></i>{{__('Çalışmalırım')}}</a>
                        <a href="{{ route('backend.portfoliocategory.index') }}"
                            class="dropdown-item rounded
                        {{Route::currentRouteName() === 'backend.portfoliocategory.index' ? 'active' : ''}}"><i class="ph-folders me-2"></i>{{__('Kategoriler')}}</a>
                    </div>
                </li>
            </ul>
        </div>

        <ul class="nav gap-1 flex-xl-1 justify-content-end order-0 order-xl-1">

            <li class="nav-item">
                <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="offcanvas"
                    data-bs-target="#notifications">
                    <i class="ph-bell"></i>
                    <span
                        class="badge bg-yellow text-black position-absolute top-0 end-0 translate-middle-top zindex-1 rounded-pill mt-1 me-1">2</span>
                </a>
            </li>

            <li class="nav-item nav-item-dropdown-xl dropdown">
                <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                    <div class="status-indicator-container">
                        <img src="@php Auth::user()->image; @endphp" class="w-32px h-32px rounded-pill"
                            alt="Profil Resmi">
                    </div>
                    <span class="d-none d-md-inline-block mx-md-2">@php echo Auth::user()->name @endphp</span>
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{route('profile.edit')}}" class="dropdown-item">
                        <i class="ph-gear me-2"></i>
                        {{__('Hesap Ayarları')}}
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                            class="dropdown-item">
                            <i class="ph-sign-out me-2"></i>
                            {{__('Çıkış Yap')}}
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->
