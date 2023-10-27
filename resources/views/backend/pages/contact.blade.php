@extends('backend.layouts.app')

@push('title')
    <title>{{ __('Muhammet Ali Fidan | İletişim') }}</title>
@endpush

@push('customCss')
    <style>
        .my-striped-bg {
            --table-striped-bg: #f7fbff !important;
        }

        .my-bordered-color {
            --table-border-color: #e4e6e9 !important;
        }

        .my-hover-bg {
            --table-hover-bg: #dfdfe1 !important;
        }

        .my-buttons-margin {
            margin-right: 4px;
        }

        .my-select-checkbox {
            --dt-check-border: 10px !important;
            --dt-check-border-radius: 0.25rem !important;
            --dt-check-bg: #b9b9b9 !important
        }

        .my-badge {
            --badge-padding-y: 0.6125rem !important;
        }
    </style>
@endpush

@push('customJs')
    <!-- Scripts -->
    <script src="{{ asset('assets/backend/js/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/datatable/select.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/datatable/vfs_fonts.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/datatable/buttons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/datatable/my_datatable_extensions.js') }}"></script>

    <script src="{{ asset('assets/backend/js/form/validate.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form/select2.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form/form_validation_library.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form/messages_tr.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form/imask.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form/form_controls_extended.js') }}"></script>
    <script src="{{asset('assets/backend/js/form/sweet_alert.min.js')}}"></script>
    <!-- /scripts -->

    <!-- Sweet Alert Custom -->
    <script>
        const swalInit = swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-light',
                denyButton: 'btn btn-light',
                input: 'form-control'
            }
        });
    </script>
    <!-- /sweet alert custom -->

    <!-- Form Validation Alert -->
    <script>
        $(document).ready(function()
        {
            const validator = $('#my_contact_form').submit(function(e)
            {
                e.preventDefault();
                $.ajax(
                {
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response)
                    {
                        swalInit.fire({
                            icon: 'success',
                            title: response.message,
                            timer: 2000,
                            timerProgressBar: true,
                            showCancelButton: false,
                            showConfirmButton: false
                        }).then(function () {
                            location.reload();
                        });
                    },
                    error: function(response)
                    {
                        if (response.status === 422)
                        {
                            var errorHtml = '<ul class="list-group list-group-flush">';
                            $.each(response.responseJSON.errors, function(index, error) {
                                errorHtml += '<li class="list-group-item">' + error[0] + '</li>';
                            })
                            errorHtml += '</ul>';

                            swalInit.fire({
                                icon: 'error',
                                title: 'Lütfen Formu Eksiksiz Doldurunuz.',
                                html: '<br>' + errorHtml,
                                timer: 5000,
                                timerProgressBar: true,
                                showCancelButton: false,
                                showConfirmButton: false,
                            });
                        }
                        else
                        {
                            swalInit.fire({
                                icon: 'error',
                                title: 'Sistemsel bir hata. Lütfen sonra tekrar deneyiniz.',
                                timer: 3000,
                                timerProgressBar: true,
                                showCancelButton: false,
                                showConfirmButton: false,
                            });
                        }
                    }
                });
            });
        });
    </script>
    <!-- /form validation alert -->
@endpush

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="#" class="breadcrumb-item"><i class="ph-house"></i><mark>!Burayı unutma!</mark></a>
                    <a href="{{ route('backend.dashboard.index') }}" class="breadcrumb-item">{{ __('Ana Sayfa') }}</a>
                    <span class="breadcrumb-item active">{{ __('İletişim') }}</span>
                </div>
                <a href="#breadcrumb_elements"
                    class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                    data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content container">

        <!-- Datatable -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('İletişimler') }}</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#my_add_contact_modal">
                        {{ __('İletişim Ekle') }}
                    </button>
                </div>
            </div>

            <table
                class="table my-datatable-extensions table-striped table-bordered table-hover
                my-striped-bg my-bordered-color my-hover-bg text-center">
                <thead>
                    <tr>
                        <th></th>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('İsim') }}</th>
                        <th>{{ __('Başlık') }}</th>
                        <th>{{ __('Oluşturulma Zamanı') }}</th>
                        <th>{{ __('Durum') }}</th>
                        <th>{{ __('Düzenle') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($contacts->count() != null && $contacts->count() > 0)
                        @foreach ($contacts as $contact)
                            <tr>
                                <td class="my-select-checkbox"></td>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->title }}</td>
                                <td>{{ $contact->created_at }}</td>
                                <td>
                                    <select
                                        class="badge bg-opacity-20 rounded-pill text-reset
                                        <?php
                                        if ($contact->status == 'waiting') {
                                            echo 'bg-warning';
                                        } elseif ($contact->status == 'active') {
                                            echo 'bg-success';
                                        } else {
                                            echo 'bg-danger';
                                        }
                                        ?>">
                                        <option value="1" <?php if ($contact->status == 'active') {
                                            echo 'selected';
                                        } ?>>{{ __('Aktif') }}</option>
                                        <option value="2" <?php if ($contact->status == 'inactive') {
                                            echo 'selected';
                                        } ?>>{{ __('Pasif') }}</option>
                                        <option value="3" <?php if ($contact->status == 'waiting') {
                                            echo 'selected';
                                        } ?>>{{ __('Beklemede') }}</option>
                                    </select>
                                </td>
                                <td class="text-center">
                                    <div class="d-inline-flex">
                                        <div class="d-flex">
                                            <button type="button"
                                                class="btn btn-outline-info rounded-pill btn-sm my-buttons-margin"
                                                data-bs-popup="tooltip" title="Ayrıntılar" data-bs-placement="bottom">
                                                <i class="ph-arrows-out-simple"></i>
                                            </button>
                                            <button class="btn btn-outline-primary rounded-pill btn-sm my-buttons-margin"
                                                data-bs-popup="tooltip" title="Güncelle" data-bs-placement="bottom">
                                                <i class="ph-wrench"></i>
                                            </button>
                                            <button class="btn btn-outline-danger rounded-pill btn-sm"
                                                data-bs-popup="tooltip" title="Sil" data-bs-placement="bottom">
                                                <i class="ph-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /datatable -->
    </div>
    <!-- /content area -->

    <!-- Add contact modal -->
    <div id="my_add_contact_modal" class="modal fade" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('İletişim Ekleme Formu') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form class="form-horizontal form-validate-jquery" id="my_contact_form" action="{{route('backend.contact.add')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Ad - Soyad:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="my_modal_name" placeholder="Ahmet Yılmaz" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Telefon:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="my_modal_phone" placeholder="+90 (000)-000-0000" required>
                                <div class="form-text text-muted">{{ __('Başında sıfır olmadan 10 haneli telefon numanızı giriniz') }}</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('E-posta:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="my_modal_email" placeholder="ahmetyilmaz@domain.com" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Konu:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="my_modal_title" placeholder="Bir internet sitesine ihtiyacım var" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Detay:') }}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="my_modal_content" rows="3" cols="3"
                                placeholder="Kendi işimi insanlara tanıtmak için bir şık siteye ihtiyacım var" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Durum:') }}</label>
                            <div class="col-sm-2 mt-1">
                                <select class="form-control my-badge badge bg-opacity-20 rounded-pill text-reset" name="my_modal_status">
                                    <option value="waiting">{{ __('Beklemede') }}</option>
                                    <option value="active">{{ __('Aktif') }}</option>
                                    <option value="inactive">{{ __('Pasif') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-bs-dismiss="modal">{{ __('İptal') }}
                        </button>
                        <button type="submit" class="btn btn-primary" id="ekle">{{ __('Ekle') }}
                            <i class="ph-paper-plane-tilt ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /add contact modal -->
@endsection
