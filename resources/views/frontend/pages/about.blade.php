@extends('frontend.layouts.app')

@push('title')
    <title>{{ __('Muhammet Ali Fidan | Hakkımda') }}</title>
@endpush

@push('customCss')
    <link id="skinCSS" rel="stylesheet" href="{{ asset('assets/frontend/css/default.css') }}">
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
                                data-appear-animation="maskUp" data-appear-animation-delay="100">{{_('Nacizane Geçmişim')}}</h2>
                        </div>
                    </div>
                    <div class="col-md-12 align-self-center order-1">
                        <ul class="breadcrumb d-block text-center appear-animation"
                            data-appear-animation="fadeIn" data-appear-animation-delay="300">
                            <li><a href="{{route('frontend.home.index')}}">{{_('Ana Sayfa')}}</a></li>
                            <li class="active">{{_('Hakkımda')}}</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

    <div class="container pt-5">

        <div class="row mb-2">
            <div class="col-md-7 order-2">
                <div class="overflow-hidden">
                    <h2 class="text-color-dark font-weight-bold text-12 mb-2 pt-0 mt-0 appear-animation"
                        data-appear-animation="maskUp" data-appear-animation-delay="300">Muhammet Ali Fidan</h2>
                </div>
                <div class="overflow-hidden mb-3">
                    <p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation"
                        data-appear-animation="maskUp" data-appear-animation-delay="500">{{_('Yazılım Geliştirici')}}</p>
                </div>
                <p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
                    Merhaba, ben Muhammet Ali Fidan. Çanakkale Onsekiz Mart Üniversitesi'nde eğitim gören bir yazılım
                    geliştiricisiyim. Kendimi Web yazılımları üzerinde geliştiriyorum. E-ticaret siteleri, blog siteleri
                    gibi çeşitli projeler kodluyorum.</p>
                <p class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
                    Web geliştirmeye C# dilini öğrenerek başladım. Böylelikle Asp.Net teknolojilerini kullanarak
                    geliştirme yapabilecektim. Backend geliştirme için Asp.Net teknolojilerini kullandıktan sonra
                    frontend için Asp.Net'e yakın olan TypeScript'i kullandığı için Angular teknolojisini kullanmayı
                    tercih ettim. Bu teknolojileri iyice öğrendikten sonra günümüz kaliteli yazılım prensiplerine uygun
                    bir e-ticaret sitesi kodladım. </p>
                <p class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
                    İlk stajımı araç takip sistemi satışı yapan bir şirkette yaptım. Orada da Web geliştirme alanında
                    kendimi geliştirdim. Asp.Net yanında çalıştığım şirketin satış takip sisteminde kullandıkları PHP
                    Laravel teknolojisini kullandıklarını gördüm. Farklı deneyimlerden kaçmak yerine onların bana fayda
                    vereceği inancında olduğumdan bu teknolojiyi de kısa sürede öğrenerek şu an bulunduğunuz kendi blog
                    sitemi geliştirdim.</p>

                <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter"
                    data-appear-animation-delay="600">

                <div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter"
                    data-appear-animation-delay="600">
                    <div class="col-lg-8">
                        <a href="{{ route('frontend.about.downloadcv') }}" class="btn btn-modern btn-dark mt-3">{{_('Özgeçmişimi(CV) İndir')}}</a>
                        <a href="{{route('frontend.contact.index')}}" class="btn btn-modern btn-primary mt-3 ms-3">{{_('Benimle İletişim Kur')}}</a>
                    </div>

                    <div class="col-sm-4 text-lg-end my-4 my-lg-0">
                        <strong class="text-uppercase text-1 me-3 text-dark">{{_('Beni Takip Et')}}</strong>
                        <ul class="social-icons float-lg-end">
                            <li class="social-icons-youtube"><a href="https://www.youtube.com/@coder_log/" target="_blank"
                                    title="Youtube"><i class="fab fa-youtube"></i></a></li>
                            <li class="social-icons-instagram"><a href="https://instagram.com/coderlog" target="_blank"
                                    title="Instagram"><i class="fab fa-instagram"></i></a></li>
                            <li class="social-icons-linkedin"><a href="https://www.linkedin.com/in/muhammetalifidan/" target="_blank"
                                    title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
                <img src="{{asset('img/images/hakkimda.jpg')}}" class="img-fluid mb-2 rounded" alt="technology">
            </div>
        </div>
    </div>

    <section class="section section-default border-0 mt-5 appear-animation" data-appear-animation="fadeIn"
        data-appear-animation-delay="600">
        <h2 class="text-color-dark font-weight-normal text-7 mb-3 pt-1 text-center"><strong class="font-weight-extra-bold">{{_('Kendimi Geliştirdiğim Alanlar')}}</strong></h2>

        <div class="container py-4">

            <div class="row featured-boxes featured-boxes-style-4">
                <div class="col-md-6 col-lg-3 my-2">
                    <div class="m-0 featured-box featured-box-primary featured-box-effect-4 appear-animation"
                        data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="600">
                        <div class="box-content p-0 text-start">
                            <i class="icon-featured icon-layers icons text-12 m-0 p-0"></i>
                            <h4 class="font-weight-bold text-color-dark">{{_('Web Yazılımları')}}</h4>
                            <p class="mb-0">{{_('Asp.Net - Angular')}} <br> {{_('PHP - Laravel')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <div class="m-0 featured-box featured-box-primary featured-box-effect-4 appear-animation"
                        data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="600">
                        <div class="box-content p-0 text-start">
                            <i class="icon-featured icon-screen-tablet icons text-12 m-0 p-0"></i>
                            <h4 class="font-weight-bold text-color-dark">{{_('Mobil Uygulama')}}</h4>
                            <p class="mb-0">{{_('Flutter')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <div class="m-0 featured-box featured-box-primary featured-box-effect-4 appear-animation"
                        data-appear-animation="fadeInRightShorter" data-appear-animation-delay="600">
                        <div class="box-content p-0 text-start">
                            <i class="icon-featured icon-screen-desktop icons text-12 m-0 p-0"></i>
                            <h4 class="font-weight-bold text-color-dark">{{_('İçerik Üretme')}}</h4>
                            <p class="mb-0">{{('Youtube')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <div class="m-0 featured-box featured-box-primary featured-box-effect-4 appear-animation"
                        data-appear-animation="fadeInRightShorter" data-appear-animation-delay="600">
                        <div class="box-content p-0 text-start">
                            <i class="icon-featured icon-magnifier icons text-12 m-0 p-0"></i>
                            <h4 class="font-weight-bold text-color-dark">{{_('Sürekli Araştırma')}}</h4>
                            <p class="mb-0">{{_('Her zaman güncel teknolojiye')}} <br> {{_('ayak uydurma')}}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="container pt-3 pb-2">
        <div class="row">
            <div class="col-md-8 mx-md-auto text-center">

                <h2 class="text-color-dark font-weight-normal text-7 mb-0 pt-2"><strong class="font-weight-extra-bold">{{_('Deneyimim')}}</strong></h2>
                <p>{{_('Deneyim, öğrenmenin kısa yolu ve yaşamın en iyi öğretmenidir.')}}</p>

                <section class="timeline" id="timeline">
                    <div class="timeline-body">

                        <div class="timeline-date">
                            <h3 class="text-primary font-weight-bold">2023</h3>
                        </div>

                        <article class="timeline-box left text-start appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="600">
                            <div class="timeline-box-arrow"></div>
                            <div class="p-2">
                                <img alt="envepo-logo" class="img-fluid" src="{{asset('img/images/logo/envepo.svg')}}" />
                                <h3 class="font-weight-bold text-3 mt-3 mb-1">{{_('Envepo Yazılım A.Ş.')}}</h3>
                                <p class="mb-0 text-2">
                                    {{_("Envepo Yazılım şirketinde 4 hafta zorunlu 2 hafta gönüllü olarak toplam 6 hafta
                                    süren stajımı yaptım. Bu süreç boyunca PHP Laravel framework'ünü kullanarak web
                                    geliştirme üzerinde çalışıp kendimi geliştirdim. Kendi blog sitemi de burada
                                    öğrendiğim bilgiler ile geliştirdim.")}}
                                </p>
                            </div>
                        </article>

                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection
