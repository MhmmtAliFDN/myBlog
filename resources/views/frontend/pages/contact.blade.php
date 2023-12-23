@extends('frontend.layouts.app')

@push('title')
    <title>{{ __('Muhammet Ali Fidan | İletişim') }}</title>
@endpush

@push('customCss')
@endpush

@push('customJs')
    <script src="{{asset('assets/frontend/js/form/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/form/my_form_validation.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/form/validate.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/form/imask.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/form/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/form/messages_tr.js') }}"></script>

    <!-- Form Masking -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ExtendedFormControls.init();
        });
    </script>
    <!-- /form masking -->

    <!-- Form Validation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            FormValidation.init();
        });
    </script>
    <!-- /form validation -->

    <!-- Sweet Alert Custom -->
    <script>
        const Toast = Swal.mixin({
            showCancelButton: false,
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    </script>
    <!-- /sweet alert custom -->

    <!-- Contact Add & Validation -->
    <script>
        $(document).ready(function() {
            const validator = $('#my_add_item_form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#add_button').show();
                        $('#adding_button').hide();

                        Toast.fire({
                            icon: 'success',
                            title: response.message,
                            toast: true,
                            position: "top-end",
                        }).then(function() {
                            location.reload();
                        });
                    },
                    error: function(response) {
                        $('#add_button').show();
                        $('#adding_button').hide();

                        if (response.status === 422) {
                            var errorHtml = '<ul class="list-group list-group-flush">';
                            $.each(response.responseJSON.errors, function(index, error) {
                                errorHtml += '<li class="list-group-item">' + error[0] +
                                    '</li>';
                            })
                            errorHtml += '</ul>';

                            Toast.fire({
                                icon: 'error',
                                title: 'Lütfen Formu Eksiksiz Doldurunuz.',
                                html: '<br>' + errorHtml,
                            });
                        } else {
                            $('#add_button').show();
                            $('#adding_button').hide();

                            Toast.fire({
                                icon: 'error',
                                title: 'Sistemsel bir hata. Lütfen sonra tekrar deneyiniz.',
                            });
                        }
                    }
                });
            });
        });
    </script>
    <!-- /contact add & validation -->
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
                                data-appear-animation="maskUp" data-appear-animation-delay="100">{{_('İsteklerini Dile Getir')}}</h2>
                        </div>
                    </div>
                    <div class="col-md-12 align-self-center order-1">
                        <ul class="breadcrumb d-block text-center appear-animation"
                            data-appear-animation="fadeIn" data-appear-animation-delay="300">
                            <li><a href="{{route('frontend.home.index')}}">{{_('Ana Sayfa')}}</a></li>
                            <li class="active">{{_('İletişim')}}</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
    <div class="container">

        <div class="row">
            <div class="col-lg-7">

                <h2 class="font-weight-bold text-8 mt-2 mb-0">{{ _('İletişim Formu') }}</h2>
                <p class="mb-4">{{ _('Bana merak ettiklerini saygı çerçevesinde sorabilirsin.') }}</p>

                <form class="form-horizontal" id="my_add_item_form" action="{{ route('frontend.contact.add') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label
                                class="col-form-label text-center col-sm-2 fs-lg fw-bold text-dark">{{ __('Ad - Soyad:') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control border-3" name="name"
                                    placeholder="Ahmet Yılmaz" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                class="col-form-label text-center col-sm-2 fs-lg fw-bold text-dark">{{ __('Telefon:') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control border-3" name="phone"
                                    placeholder="+90 (500)-000-0000" required>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                class="col-form-label text-center col-sm-2 fs-lg fw-bold text-dark">{{ __('E-posta:') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control border-3" name="email"
                                    placeholder="ahmetyilmaz@domain.com" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                class="col-form-label text-center col-sm-2 fs-lg fw-bold text-dark">{{ __('Konu:') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control border-3" name="title"
                                    placeholder="Bir internet sitesine ihtiyacım var" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                class="col-form-label text-center col-sm-2 fs-lg fw-bold text-dark">{{ __('Detay:') }}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control border-3" name="content" rows="3" cols="3"
                                    placeholder="Kendi işimi insanlara tanıtmak için bir şık siteye ihtiyacım var" required></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button id="add_button" type="submit" class="btn btn-primary">{{ __('Gönder') }}
                            <i class="ph-paper-plane-tilt ms-2"></i>
                        </button>

                        <button id="adding_button" class="btn btn-primary" type="button" style="display:none;" disabled>
                            <span role="status">{{ __('Gönderiyor') }}</span>
                            <span class="spinner-border spinner-border-sm ms-2" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

            <div class="col-lg-5 pt-5">

                <h4 class="pt-5">{{ _('Dikkat Edilmesi Gerekenler') }}</h4>
                <p class="lead mb-0 text-4 text-dark">
                    {{ _('Formu doldururken istenilen bütün bilgilerin eksiksiz girildiğine emin olunuz.') }} <br><br>
                    {{ _('Formda boş alan kalmamalıdır. Telefon numarası başında 0 olmadan 10 hane olarak girilmelidir.') }}
                </p>

                <div class="appear-animation pt-5" data-appear-animation="fadeIn" data-appear-animation-delay="800">
                    <h4 class="mt-2 mb-1">{{ _('Ek İletişim Yöntemi') }}</h4>
                    <ul class="list list-icons list-icons-style-2 mt-2">
                        <li><i class="fas fa-envelope top-6"></i> <strong class="text-dark">Email:</strong> <a
                                href="mailto:muhammetalifidan@email.com">muhammetalifidan@email.com</a></li>
                    </ul>
                </div>

            </div>

        </div>

    </div>
@endsection
