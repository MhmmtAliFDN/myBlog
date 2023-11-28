@extends('backend.layouts.app')

@push('title')
    <title>{{ __('Muhammet Ali Fidan | İletişim') }}</title>
@endpush

@push('customCss')
    <link rel="stylesheet" href="{{asset('assets/backend/css/custom.css') }}">
@endpush

@push('customJs')
    <!-- Scripts -->
    <script src="{{ asset('assets/backend/js/datatable/my_datatable.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form/my_form_validation.js') }}"></script>
    <script src="{{ asset('assets/backend/js/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/datatable/select.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/datatable/vfs_fonts.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/datatable/buttons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form/validate.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form/select2.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form/messages_tr.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form/imask.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form/sweet_alert.min.js') }}"></script>
    <!-- /scripts -->

    <!-- DataTable Initialize Module -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            ContactDataTable.init();
        });
    </script>
    <!-- /dataTable initialize module -->

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

    <!-- Status Update -->
    <script>
        $(document).on('change', '#my_item_status', function() {
            var id = $(this).closest(".table_item").attr("item-id");
            var status = $(this).find("option:selected").text(); //İlk başta $(this) yerine #my_item_status kullanmıştım. Bu da sayfada olan değil sadece ilk satırdaki id'yi alıyordu ve sürekli hatalı çalışıyordu.
            var val = $(this).find("option:selected").val();

            $.ajax({
                url: '{{ route('backend.contact.statusUpdate') }}',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id,
                    'status': status
                },
                success: function(response) {
                    swalInit.fire({
                        text: response.message,
                        icon: 'success',
                        toast: true,
                        timer: 1500,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        position: 'top-end'
                    }).then(function() {
                        location.reload();
                    });
                },
                error: function(response) {
                    swalInit.fire({
                        text: response.responseJSON.message,
                        icon: 'error',
                        toast: true,
                        timer: 1500,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        position: 'top-end'
                    });
                }
            })
        })
    </script>
    <!-- /status update -->

    <!-- Contact Detail -->
    <script>
        $(document).on('click', '#my_item_detail', function() {
            var item = $(this).closest(".table_item");
            id = item.attr('item-id');

            $.ajax({
                type: 'GET',
                url: '{{ route('backend.contact.get') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id,
                },
                success: function(response) {
                    const monthNames = ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz",
                        "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"
                    ];

                    var createdDate = new Date(response.data.created_at);
                    var updatedDate = new Date(response.data.updated_at);

                    function formatingDate(date) {
                        var formattedDate = date.getDate() + " " + monthNames[date.getMonth()] + " " +
                            date.getFullYear() + " | " +
                            addLeadingZero(date.getHours()) + " : " + addLeadingZero(date
                                .getMinutes()) + " : " + addLeadingZero(date.getSeconds());
                        return formattedDate;
                    }

                    function addLeadingZero(value) {
                        return value < 10 ? "0" + value : value;
                    }

                    $('#my_item_detail_form #my_modal_id').val(response.data.id);
                    $('#my_item_detail_form #my_modal_name').val(response.data.name);
                    $('#my_item_detail_form #my_modal_phone').val(response.data.phone);
                    $('#my_item_detail_form #my_modal_email').val(response.data.email);
                    $('#my_item_detail_form #my_modal_created_at').val(formatingDate(createdDate));
                    $('#my_item_detail_form #my_modal_updated_at').val(formatingDate(updatedDate));
                    $('#my_item_detail_form #my_modal_title').val(response.data.title);
                    $('#my_item_detail_form #my_modal_content').val(response.data.content);
                    $('#my_item_detail_form #my_modal_status').val(response.data.status);
                },
                error: function(response) {
                    if (response.status === 500) {
                        swalInit.fire({
                            icon: 'warning',
                            toast: true,
                            text: response.responseJSON.message,
                            timer: 3000,
                            timerProgressBar: true,
                            showCancelButton: false,
                            showConfirmButton: false,
                            position: 'top-end'
                        });
                    }
                }
            })
        });
    </script>
    <!-- /contact detail -->

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
                        swalInit.fire({
                            icon: 'success',
                            title: response.message,
                            //text: "Benimle iletişim kurduğunuz için teşekkür ederim. En kısa zamanda size dönüş yapacağım.",
                            timer: 3000,
                            timerProgressBar: true,
                            showCancelButton: false,
                            showConfirmButton: false
                        }).then(function() {
                            location.reload();
                        });
                    },
                    error: function(response) {
                        if (response.status === 422) {
                            var errorHtml = '<ul class="list-group list-group-flush">';
                            $.each(response.responseJSON.errors, function(index, error) {
                                errorHtml += '<li class="list-group-item">' + error[0] +
                                    '</li>';
                            })
                            errorHtml += '</ul>';

                            swalInit.fire({
                                icon: 'error',
                                title: 'Lütfen Formu Eksiksiz Doldurunuz.',
                                html: '<br>' + errorHtml,
                                timer: 3000,
                                timerProgressBar: true,
                                showCancelButton: false,
                                showConfirmButton: false,
                            });
                        } else {
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
    <!-- /contact add & validation -->

    <!-- Contact Update & Validation -->
    <script>
        $(document).ready(function() {
            var id;
            $(document).on('click', '#my_update_item', function() {
                var item = $(this).closest(".table_item");
                id = item.attr('item-id');

                $.ajax({
                    type: 'GET',
                    url: '{{ route('backend.contact.get') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id,
                    },
                    success: function(response) {
                        $('#my_update_item_form #my_modal_id').val(response.data.id);
                        $('#my_update_item_form #my_modal_name').val(response.data.name);
                        $('#my_update_item_form #my_modal_phone').val(response.data.phone);
                        $('#my_update_item_form #my_modal_email').val(response.data.email);
                        $('#my_update_item_form #my_modal_title').val(response.data.title);
                        $('#my_update_item_form #my_modal_content').val(response.data.content);
                        $('#my_update_item_form #my_modal_status').val(response.data.status);
                    },
                    error: function(response) {
                        if (response.status === 500) {
                            swalInit.fire({
                                icon: 'warning',
                                toast: true,
                                text: response.responseJSON.message,
                                timer: 3000,
                                timerProgressBar: true,
                                showCancelButton: false,
                                showConfirmButton: false,
                                position: 'top-end'
                            });
                        }
                    }
                })
            });

            const validator = $('#my_update_item_form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('backend.contact.update') }}',
                    data: $(this).serialize(),
                    success: function(response) {
                        swalInit.fire({
                            icon: 'success',
                            title: response.message,
                            //text: "Benimle iletişim kurduğunuz için teşekkür ederim. En kısa zamanda size dönüş yapacağım.",
                            timer: 3000,
                            timerProgressBar: true,
                            showCancelButton: false,
                            showConfirmButton: false
                        }).then(function() {
                            location.reload();
                        });
                    },
                    error: function(response) {
                        if (response.status === 422) {
                            var errorHtml = '<ul class="list-group list-group-flush">';
                            $.each(response.responseJSON.errors, function(index, error) {
                                errorHtml += '<li class="list-group-item">' + error[0] +
                                    '</li>';
                            })
                            errorHtml += '</ul>';

                            swalInit.fire({
                                icon: 'error',
                                title: 'Lütfen Formu Eksiksiz Doldurunuz.',
                                html: '<br>' + errorHtml,
                                timer: 3000,
                                timerProgressBar: true,
                                showCancelButton: false,
                                showConfirmButton: false,
                            });
                        } else {
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
    <!-- /contact update & validation -->

    <!-- Contact Delete -->
    <script>
        $(document).on('click', '#my_delete_item', function() {
            var item = $(this).closest(".table_item");
            var id = item.attr('item-id');

            swalInit.fire({
                title: 'Silmek istediğinize emin misiniz?',
                text: "Bu geri dönüşü olmayan bir silme işlemidir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, sil',
                cancelButtonText: 'İptal et',
                buttonsStyling: false,
                allowOutsideClick: false,
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-success'
                }
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: '{{ route('backend.contact.delete') }}',
                        method: 'POST',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id': id,
                        },
                        success: function(respone) {
                            swalInit.fire({
                                icon: 'success',
                                toast: true,
                                text: respone.message,
                                timer: 2000,
                                timerProgressBar: true,
                                showCancelButton: false,
                                showConfirmButton: false,
                                position: 'top-end'
                            }).then(function() {
                                location.reload();
                            });
                        },
                        error: function(response) {
                            if (response.status === 500) {
                                swalInit.fire({
                                    icon: 'warning',
                                    toast: true,
                                    text: response.responseJSON.message,
                                    timer: 2000,
                                    timerProgressBar: true,
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    position: 'top-end'
                                });
                            }
                        }
                    });
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swalInit.fire({
                        icon: 'error',
                        toast: true,
                        text: 'Silme işlemi iptal edildi',
                        timer: 2000,
                        timerProgressBar: true,
                        showCancelButton: false,
                        showConfirmButton: false,
                        position: 'top-end'
                    });
                }
            });
        });
    </script>
    <!-- /contact delete -->

    {{-- <script>
        $(document).ready(function() {
            var table = $('#my_contact_datatable').DataTable();

            $('td.my-select-checkbox').on('click.dtSelect', function() {
                //var checkbox = $(this).is('.select-checkbox');
                console.log(1);
                if ($('.dtSelect')) {

                    console.log("a");
                } else {
                    console.log("seçili değil");
                }
            });
        });
    </script> --}}
@endpush

@section('content')
    @push('header')
        <span class="breadcrumb-item active">{{ __('İletişim') }}</span>
    @endpush

    <!-- Content area -->
    <div class="content container">

        <!-- Datatable -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <div class="p-1 flex-grow-1">
                        <h5 class="mb-0">{{ __('İletişimler') }}</h5>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-danger me-3" hidden>
                            {{ __('Çoklu Sil') }}
                            <i class="ph-trash ms-1"></i>
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#my_add_item_modal">
                            {{ __('İletişim Ekle') }}
                        </button>
                    </div>
                </div>

            </div>

            <table
                class="my_datatable table table-striped table-bordered table-hover
                my-striped-bg my-bordered-color my-hover-bg text-center"
                id="my_datatable">
                <thead>
                    <tr>
                        <th>{{ __('Seç') }}</th>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('İsim') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Telefon') }}</th>
                        <th>{{ __('Başlık') }}</th>
                        <th>{{ __('İçerik') }}</th>
                        <th>{{ __('Oluşturulma Zamanı') }}</th>
                        <th>{{ __('Güncelleme Zamanı') }}</th>
                        <th>{{ __('Durum') }}</th>
                        <th>{{ __('Düzenle') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($contacts->count() != null && $contacts->count() > 0)
                        @foreach ($contacts as $contact)
                            <tr class="table_item" item-id="{{ $contact->id }}">
                                <td class="my-select-checkbox"></td>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->title }}</td>
                                <td>{{ $contact->content }}</td>
                                <td>{{ $contact->created_at }}</td>
                                <td>{{ $contact->updated_at }}</td>
                                <td>
                                    <select id="my_item_status"
                                        class="badge bg-opacity-20 rounded-pill text-reset
                                        <?php
                                        if ($contact->status == 'Beklemede') {
                                            echo 'bg-warning';
                                        } elseif ($contact->status == 'Aktif') {
                                            echo 'bg-success';
                                        } else {
                                            echo 'bg-danger';
                                        }
                                        ?>">

                                        <option value="1" <?php if ($contact->status == 'Aktif') {
                                            echo 'selected';
                                        } ?>>{{ __('Aktif') }}</option>
                                        <option value="2" <?php if ($contact->status == 'Pasif') {
                                            echo 'selected';
                                        } ?>>{{ __('Pasif') }}</option>
                                        <option value="3" <?php if ($contact->status == 'Beklemede') {
                                            echo 'selected';
                                        } ?>>{{ __('Beklemede') }}</option>
                                    </select>
                                </td>
                                <td class="text-center">
                                    <div class="d-inline-flex">
                                        <div class="d-flex">
                                            <button type="button"
                                                class="btn btn-outline-info rounded-pill btn-sm my-buttons-margin"
                                                id="my_item_detail" data-bs-popup="tooltip" title="Ayrıntılar"
                                                data-bs-placement="bottom" data-bs-toggle="modal"
                                                data-bs-target="#my_item_detail_modal">
                                                <i class="ph-arrows-out-simple"></i>
                                            </button>
                                            <button class="btn btn-outline-primary rounded-pill btn-sm my-buttons-margin"
                                                id="my_update_item" data-bs-popup="tooltip" title="Güncelle"
                                                data-bs-placement="bottom" data-bs-toggle="modal"
                                                data-bs-target="#my_update_item_modal">
                                                <i class="ph-wrench"></i>
                                            </button>
                                            <button class="btn btn-outline-danger rounded-pill btn-sm"
                                                id="my_delete_item" data-bs-popup="tooltip" title="Sil"
                                                data-bs-placement="bottom">
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
    <div id="my_add_item_modal" class="modal fade" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('İletişim Ekleme Formu') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form class="form-horizontal" id="my_add_item_form" action="{{ route('backend.contact.add') }}"
                    method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label
                                class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Ad - Soyad:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="my_modal_name" placeholder="Ahmet Yılmaz"
                                    required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Telefon:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="my_modal_phone"
                                    placeholder="+90 (500)-000-0000" value="+90 (5" required>
                                <div class="form-text text-muted">
                                    {{ __('10 haneli telefon numanızı giriniz - +90 (555)-555-5555') }}</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('E-posta:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="my_modal_email"
                                    placeholder="ahmetyilmaz@domain.com" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Konu:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="my_modal_title"
                                    placeholder="Bir internet sitesine ihtiyacım var" required>
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
                                <select class="form-control my-badge badge bg-opacity-20 rounded-pill text-reset"
                                    name="my_modal_status">
                                    <option value="Beklemede">{{ __('Beklemede') }}</option>
                                    <option value="Aktif">{{ __('Aktif') }}</option>
                                    <option value="Pasif">{{ __('Pasif') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('İptal') }}
                        </button>
                        <button type="submit" class="btn btn-primary">{{ __('Ekle') }}
                            <i class="ph-paper-plane-tilt ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /add contact modal -->

    <!-- Update contact modal -->
    <div id="my_update_item_modal" class="modal fade" data-bs-keyboard="false" data-bs-backdrop="static"
        tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('İletişim Güncelleme Formu') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form class="form-horizontal" id="my_update_item_form" action="{{ route('backend.contact.update') }}"
                    method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="my_modal_id" name="my_modal_id" value="{{ $contact->id }}">
                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('ID:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_id" name="my_modal_id" disabled
                                    readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Ad - Soyad:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_name" name="my_modal_name"
                                    placeholder="Ahmet Yılmaz" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Telefon:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_phone" name="my_modal_phone"
                                    placeholder="+90 (500)-000-0000" required>
                                <div class="form-text text-muted">
                                    {{ __('10 haneli telefon numanızı giriniz - +90 (555)-555-5555') }}</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('E-posta:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_email" name="my_modal_email"
                                    placeholder="ahmetyilmaz@domain.com" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Konu:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_title" name="my_modal_title"
                                    placeholder="Bir internet sitesine ihtiyacım var" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Detay:') }}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="my_modal_content" name="my_modal_content" rows="3" cols="3"
                                    placeholder="Kendi işimi insanlara tanıtmak için bir şık siteye ihtiyacım var" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Durum:') }}</label>
                            <div class="col-sm-2 mt-1">
                                <select class="form-control my-badge badge bg-opacity-20 rounded-pill text-reset"
                                    id="my_modal_status" name="my_modal_status">
                                    <option value="Beklemede">{{ __('Beklemede') }}</option>
                                    <option value="Aktif">{{ __('Aktif') }}</option>
                                    <option value="Pasif">{{ __('Pasif') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('İptal') }}
                        </button>
                        <button type="submit" class="btn btn-primary">{{ __('Ekle') }}
                            <i class="ph-paper-plane-tilt ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /update contact modal -->

    <!-- Detail contact modal -->
    <div id="my_item_detail_modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('İletişim Ayrıntıları') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form class="form-horizontal" id="my_item_detail_form">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('ID:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_id" name="my_modal_id" disabled
                                    readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Ad - Soyad:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_name" name="my_modal_name"
                                    disabled readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Telefon:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_phone" name="my_modal_phone"
                                    disabled readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('E-posta:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_email" name="my_modal_email"
                                    disabled readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Konu:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_title" name="my_modal_title"
                                    disabled readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Oluşturulma Tarihi:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_created_at"
                                    name="my_modal_created_at" disabled readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Değiştirilme Tarihi:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_updated_at"
                                    name="my_modal_updated_at" disabled readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Detay:') }}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="my_modal_content" name="my_modal_content" rows="3" cols="3" disabled readonly></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Durum:') }}</label>
                            <div class="col-sm-2 mt-1">
                                <select class="form-control my-badge badge bg-opacity-20 rounded-pill text-reset"
                                    id="my_modal_status" name="my_modal_status" disabled readonly>
                                    <option value="Beklemede">{{ __('Beklemede') }}</option>
                                    <option value="Aktif">{{ __('Aktif') }}</option>
                                    <option value="Pasif">{{ __('Pasif') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /detail contact modal -->
@endsection
