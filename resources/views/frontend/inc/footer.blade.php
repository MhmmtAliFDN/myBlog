<footer id="footer" class="position-relative bg-dark border-top-0">
    <div class="container pt-5 pb-3">
        <div class="row pt-5">
            <div class="col-lg-4">
                <a href="demo-business-consulting-4.html" class="text-decoration-none">
                    <img src="{{asset('img/images/logo/coderlog.webp')}}" width="123" height="32" class="img-fluid mb-4 rounded-circle" alt="CoderLog" />
                </a>
                <p class="text-3-5 font-weight-medium pe-lg-2 text-white">{{_('Kod mizah gibidir. Açıklamak zorunda kaldığınızda kötüdür.')}} <br> {{_('- Cory House')}} </p>
                <ul class="list list-unstyled">
                    <li class="d-flex align-items-center mb-4">
                        <i class="icon icon-envelope text-color-light text-5 font-weight-bold position-relative top-1 me-3-5"></i>
                        <a href="mailto:muhammetalifidan@email.com" class="d-inline-flex align-items-center text-decoration-none text-color-light text-color-hover-primary font-weight-semibold text-4-5">muhammetalifidan@email.com</a>
                    </li>
                </ul>

                <ul class="social-icons social-icons-clean social-icons-medium">

                    <li class="social-icons-youtube">
                        <a href="https://www.youtube.com/@coder_log" target="_blank" title="Youtube">
                            <i class="fab fa-youtube text-color-light"></i>
                        </a>
                    </li>
                    <li class="social-icons-instagram">
                        <a href="mailto:muhammetalifidan@email.com" target="_blank" title="Mail.com">
                            <i class="fab fa-at text-color-light"></i>
                        </a>
                    </li>
                    <li class="social-icons-github">
                        <a href="https://github.com/MhmmtAliFDN/" target="_blank" title="Github">
                            <i class="fab fa-github text-color-light"></i>
                        </a>
                    </li>
                    <li class="social-icons-linkedin">
                        <a href="https://www.linkedin.com/in/muhammetalifidan/" target="_blank" title="Linkedin">
                            <i class="fab fa-linkedin text-color-light"></i>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="col-lg-8">
                <div class="row mb-5-5">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <h4 class="text-color-light font-weight-bold mb-3">{{_('Navigasyon')}}</h4>
                        <ul class="list list-unstyled columns-lg-2">
                            <li><a href="{{route('frontend.home.index')}}" class="text-color-grey text-color-hover-primary">{{_('Ana Sayfa')}}</a></li>
                            <li><a href="{{route('frontend.portfolio.index')}}" class="text-color-grey text-color-hover-primary">{{_('Çalışmalarım')}}</a></li>
                            <li><a href="{{route('frontend.blog.index')}}" class="text-color-grey text-color-hover-primary">{{_('Bloglarım')}}</a></li>
                            <li><a href="{{route('frontend.about.index')}}" class="text-color-grey text-color-hover-primary">{{_('Hakkımda')}}</a></li>
                            <li><a href="{{route('frontend.contact.index')}}" class="text-color-grey text-color-hover-primary">{{_('Benimle İletişime Geç')}}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="text-color-light font-weight-bold mb-3">{{_('Ekstra Linkler')}}</h4>
                        <ul class="list list-unstyled columns-lg-2">
                            <li><a href="https://www.youtube.com/@coder_log" class="text-color-grey text-color-hover-primary">{{_('Youtube')}}</a></li>
                            <li><a href="https://www.instagram.com/coderlog/" class="text-color-grey text-color-hover-primary">{{_('Instagram')}}</a></li>
                            <li><a href="https://twitter.com/coderlogx" class="text-color-grey text-color-hover-primary">{{_('X (Twitter)')}}</a></li>
                            <li><a href="https://www.linkedin.com/in/muhammetalifidan/" class="text-color-grey text-color-hover-primary">{{_('LinkedIn')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success d-none" id="newsletterSuccess">
                            <strong>{{_('Başarılı!')}}</strong> {{_("Bültene kayıt oldun.")}}
                        </div>
                        <div class="alert alert-danger d-none" id="newsletterError"></div>
                        <div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center">
                            <h4 class="text-color-light ws-nowrap me-3 mb-3 mb-lg-0">{{_('Bültene Kayıt Ol:')}}</h4>
                            <form id="newsletterForm" class="form-style-3 w-100" action="php/newsletter-subscribe.php" method="POST">
                                <div class="d-flex">
                                    <input class="form-control bg-color-light border-0 box-shadow-none" placeholder="Email Adresi" name="newsletterEmail" id="newsletterEmail" type="text" />
                                    <button class="btn btn-primary ms-2 btn-px-3 btn-py-2 font-weight-bold" type="submit">
                                        {{_('Kaydol')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright bg-transparent">
        <div class="container">
            <hr class="bg-color-light opacity-1">
            <div class="row">
                <div class="col mt-4 mb-4 pb-5">
                    <p class="text-center text-3 mb-0 text-white">Muhammet Ali Fidan © 2024. {{_('Tüm Hakları Saklıdır.')}}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
