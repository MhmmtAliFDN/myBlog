@extends('backend.layouts.app')

@push('title')
    <title>{{ __('Muhammet Ali Fidan | Çalışmalarım') }}</title>
@endpush

@push('customCss')
@endpush

@push('customJs')
    <!-- Scripts -->
    <script src="{{ asset('assets/backend/js/datatable/my_datatable.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form/my_form_validation.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form/my_text_editor.js') }}"></script>
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
    <script src="{{ asset('assets/backend/js/form/ckeditor.js') }} "></script>
    <script async charset="utf-8" src="{{ asset('assets/backend/js/form/embed.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form/tr.js') }}"></script>
    <script src="{{ asset('assets/backend/js/datatable/lightbox.min.js') }}"></script>
    <!-- /scripts -->

    <!-- CkEditor Add Modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AddModalEditor.init();
        });
    </script>
    <!-- /ckeditor add modal -->

    <!-- CkEditor Update Modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            UpdateModalEditor.init();
        });
    </script>
    <!-- /ckeditor update modal -->

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

    <!-- DataTable Initialize Module -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            PortfolioDataTable.init();
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
            PortfolioFormValidation.init();
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
            var status = $(this).find("option:selected").text();
            var val = $(this).find("option:selected").val();

            $.ajax({
                url: '{{ route('backend.portfolio.statusUpdate') }}',
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

    <!-- Stage Update -->
    <script>
        $(document).on('change', '#my_item_stage', function() {
            var id = $(this).closest(".table_item").attr("item-id");
            var stage = $(this).find("option:selected").text();
            var val = $(this).find("option:selected").val();

            $.ajax({
                url: '{{ route('backend.portfolio.stageUpdate') }}',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id,
                    'stage': stage,
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
    <!-- /stage update -->

    <!-- Portfolio Detail -->
    <script>
        $(document).on('click', '#my_item_detail', function() {
            var item = $(this).closest(".table_item");
            id = item.attr('item-id');

            $.ajax({
                type: 'GET',
                url: '{{ route('backend.portfolio.get') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id,
                },
                success: function(response) {
                    const monthNames = ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz",
                        "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"
                    ];

                    var createdDate = new Date(response.data[0].created_at);
                    var updatedDate = new Date(response.data[0].updated_at);

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

                    var img = response.data[3];

                    $('#my_item_detail_form #my_modal_id').val(response.data[0].id);
                    $('#my_item_detail_form #my_modal_user').val(response.data[1]);
                    $('#my_item_detail_form #my_modal_category').val(response.data[2]);
                    $('#my_item_detail_form #my_modal_name').val(response.data[0].name);
                    $('#my_item_detail_form #my_modal_slug').val(response.data[0].slug);
                    $('#my_item_detail_form #my_modal_comment').val(response.data[0].comment);
                    $('#my_item_detail_form #my_modal_view').val(response.data[0].view);
                    $('#my_item_detail_form #my_modal_image').val(response.data[0].image);
                    $('#my_item_detail_form #my_modal_created_at').val(formatingDate(createdDate));
                    $('#my_item_detail_form #my_modal_updated_at').val(formatingDate(updatedDate));
                    $('#my_item_detail_form #my_modal_summary').val(response.data[0].summary);
                    $('#my_item_detail_form #my_modal_content').val(response.data[0].content);
                    $('#my_item_detail_form #my_modal_stage').val(response.data[0].stage);
                    $('#my_item_detail_form #my_modal_status').val(response.data[0].status);

                    $('#my_detail_modal_image_src').attr('src', img);
                    $('#my_detail_modal_image_href').attr('href', img);
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
    <!-- /portfolio detail -->

    <!-- Portfolio Add & Validation -->
    <script>
        $(document).ready(function() {
            const validator = $('#my_add_item_form').submit(function(e) {
                e.preventDefault();
                $('#add_button').hide();
                $('#adding_button').show();

                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#add_button').show();
                        $('#adding_button').hide();

                        swalInit.fire({
                            icon: 'success',
                            title: response.message,
                            timer: 3000,
                            timerProgressBar: true,
                            showCancelButton: false,
                            showConfirmButton: false
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
                            $('#add_button').show();
                            $('#adding_button').hide();

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
    <!-- /portfolio add & validation -->

    <!-- Portfolio Update & Validation -->
    <script>
        $(document).ready(function() {
            var id;
            $(document).on('click', '#my_update_item', function() {
                var item = $(this).closest(".table_item");
                id = item.attr('item-id');
                var image;

                let my_update_modal_editor;
                var ckEditor = UpdateModalEditor.getEditor();
                ckEditor.then(editor => {
                    window.editor = editor;
                    my_update_modal_editor = editor;
                });

                $.ajax({
                    type: 'GET',
                    url: '{{ route('backend.portfolio.get') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id,
                    },
                    success: function(response) {
                        img = response.data[3];

                        $('#my_update_item_form #my_modal_id').val(response.data[0].id);
                        $('#my_update_item_form #my_modal_category').val(response.data[0]
                            .category_id);
                        $('#my_update_item_form #my_modal_name').val(response.data[0].name);
                        $('#my_update_item_form #my_modal_summary').val(response.data[0]
                            .summary);
                        $('#my_update_item_form #my_modal_stage').val(response.data[0].stage);
                        $('#my_update_item_form #my_modal_status').val(response.data[0].status);
                        $('#my_update_item_form #my_update_modal_image_src').attr('src', img);
                        $('#my_update_item_form #my_update_modal_image_href').attr('href', img);
                        my_update_modal_editor.setData(response.data[0].content);
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
                $('#update_button').hide();
                $('#updating_button').show();

                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#update_button').show();
                        $('#updating_button').hide();

                        swalInit.fire({
                            icon: 'success',
                            title: response.message,
                            timer: 3000,
                            timerProgressBar: true,
                            showCancelButton: false,
                            showConfirmButton: false
                        }).then(function() {
                            location.reload();
                        });
                    },
                    error: function(response) {
                        $('#update_button').show();
                        $('#updating_button').hide();

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
                            $('#update_button').show();
                            $('#updating_button').hide();

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
    <!-- /portfolio update & validation -->

    <!-- Portfolio Delete -->
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
                        url: '{{ route('backend.portfolio.delete') }}',
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
    <!-- /portfolio delete -->

    <!-- Portfolio Delete Multiple -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var datatable = PortfolioDataTable.getDataTable();

            dataTable.on('select', function() {
                var selectedRowsCount = dataTable.rows({
                    selected: true
                }).count();

                if (selectedRowsCount >= 2) {
                    $('#my_delete_items').show();
                } else {
                    $('#my_delete_items').hide();
                }
            });

            dataTable.on('deselect', function() {
                var selectedRowsCount = dataTable.rows({
                    selected: true
                }).count();

                if (selectedRowsCount >= 2) {
                    $('#my_delete_items').show();
                } else {
                    $('#my_delete_items').hide();
                }
            });
        });

        $('#my_delete_items').on('click', function() {
            var selectedRows = dataTable.rows('.selected').data();
            var selectedIds = [];

            for (var i = 0; i < selectedRows.length; i++) {
                var id = selectedRows[i][1];
                selectedIds.push(id);
            }

            swalInit.fire({
                title: 'Birden çok satırı silmek istediğinize emin misiniz?',
                text: "Onaylarsanız birden çok satırı tek seferde sileceksiniz. Bu geri dönüşü olmayan bir silme işlemidir!",
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
                        url: '{{ route('backend.portfolio.deleteMultiple') }}',
                        method: 'POST',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'ids': selectedIds,
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
    <!-- /portfolio delete multiple -->

    <!-- Lightbox -->
    <script>
        document.querySelectorAll('.my-lightbox-toggle').forEach((el) => el.addEventListener('click', (e) => {
            e.preventDefault();
            const lightbox = new Lightbox(el, options);
            lightbox.show();
        }));
    </script>
    <!-- /lightbox -->
@endpush

@section('content')

    @push('header')
        <span class="breadcrumb-item active">{{ __('Çalışmalarım') }}</span>
    @endpush

    <!-- Content area -->
    <div class="content container">

        <!-- Datatable -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <div class="p-1 flex-grow-1">
                        <h5 class="mb-0">{{ __('Çalışmalarım') }}</h5>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-danger me-3" id="my_delete_items" style="display:none;">
                            {{ __('Çoklu Sil') }}
                            <i class="ph-trash ms-1"></i>
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#my_add_item_modal">
                            {{ __('Çalışma Ekle') }}
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
                        <th>{{ __('Yazar') }}</th>
                        <th>{{ __('Kategori') }}</th>
                        <th>{{ __('Başlık') }}</th>
                        <th>{{ __('Slug') }}</th>
                        <th>{{ __('Resim') }}</th>
                        <th>{{ __('Oluşturulma Zamanı') }}</th>
                        <th>{{ __('Güncelleme Zamanı') }}</th>
                        <th>{{ __('Özet') }}</th>
                        <th>{{ __('İçerik') }}</th>
                        <th>{{ __('Aşama') }}</th>
                        <th>{{ __('Durum') }}</th>
                        <th>{{ __('Düzenle') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($portfolios->count() != null && $portfolios->count() > 0)
                        @foreach ($portfolios as $portfolio)
                            <tr class="table_item" item-id="{{ $portfolio->id }}">
                                <td class="my-select-checkbox"></td>
                                <td>{{ $portfolio->id }}</td>
                                <td>{{ $portfolio->user->name }}</td>
                                @if ($portfolio->category->status == 'Aktif')
                                    <td>{{ $portfolio->category->name }}</td>
                                @else
                                    <td>{{ $portfolio->category->name }} (Pasif)</td>
                                @endif
                                <td>{{ $portfolio->name }}</td>
                                <td>{{ $portfolio->slug }}</td>
                                <td>{{ $portfolio->image }}</td>
                                <td>{{ $portfolio->created_at }}</td>
                                <td>{{ $portfolio->updated_at }}</td>
                                <td>{{ $portfolio->summary }}</td>
                                <td>{{ $portfolio->content }}</td>
                                <td>
                                    <select id="my_item_stage"
                                        class="badge bg-opacity-20 rounded-pill text-reset">
                                        <option value="1" <?php if ($portfolio->stage == 'Başlangıç') {
                                            echo 'selected';
                                        } ?>>{{ __('Başlangıç') }}</option>
                                        <option value="2" <?php if ($portfolio->stage == 'Geliştirme') {
                                            echo 'selected';
                                        } ?>>{{ __('Geliştirme') }}</option>
                                        <option value="3" <?php if ($portfolio->stage == 'Tamamlandı') {
                                            echo 'selected';
                                        } ?>>{{ __('Tamamlandı') }}</option>
                                    </select>
                                </td>
                                <td>
                                    <select id="my_item_status"
                                        class="badge bg-opacity-20 rounded-pill text-reset
                                        <?php
                                        if ($portfolio->status == 'Aktif') {
                                            echo 'bg-success';
                                        } else {
                                            echo 'bg-danger';
                                        }
                                        ?>">

                                        <option value="1" <?php if ($portfolio->status == 'Aktif') {
                                            echo 'selected';
                                        } ?>>{{ __('Aktif') }}</option>
                                        <option value="2" <?php if ($portfolio->status == 'Pasif') {
                                            echo 'selected';
                                        } ?>>{{ __('Pasif') }}</option>
                                    </select>
                                </td>
                                <td class="text-center">
                                    <div class="d-inline-flex">
                                        <div class="d-flex">
                                            <a href="{{route('frontend.portfolio.getsingleportfolio', ['categorySlug' => $portfolio->category->slug, 'portfolioSlug' => $portfolio->slug])}}"
                                                class="btn btn-outline-info rounded-pill btn-sm my-buttons-margin"
                                                data-bs-popup="tooltip" title="Sayfaya Git" target="_blank">
                                                <i class="ph-link"></i>
                                            </a>
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
                                            <button class="btn btn-outline-danger rounded-pill btn-sm" id="my_delete_item"
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

    <!-- Add portfolio modal -->
    <div id="my_add_item_modal" class="modal fade" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Çalışma Ekleme Formu') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form class="form-horizontal" id="my_add_item_form" action="{{ route('backend.portfolio.add') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Kategori:') }}</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            @if ($category->status == 'Aktif')
                                                {{ $category->name }}
                                            @else
                                                {{ $category->name }} (Dikkat Pasif Kategori!)
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Başlık:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name"
                                    placeholder="PHP Laravel Framework'ü ile Blog Sitesi" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Resim:') }}</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image" accept="image/*" required>
                                <div class="form-text">
                                    {{ __('Resim boyutu en fazla 2 MB olabilir.') }}
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Özet:') }}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="summary" rows="2" placeholder="Laravel ile Blog Sitesi" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('İçerik:') }}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="my_add_modal_editor" name="content" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Aşama:') }}</label>
                            <div class="col-sm-2 mt-1">
                                <select class="form-control my-badge badge bg-opacity-20 rounded-pill text-reset"
                                    name="stage">
                                    <option value="Başlangıç">{{ __('Başlangıç') }}</option>
                                    <option value="Geliştirme">{{ __('Geliştirme') }}</option>
                                    <option value="Tamamlandı">{{ __('Tamamlandı') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Durum:') }}</label>
                            <div class="col-sm-2 mt-1">
                                <select class="form-control my-badge badge bg-opacity-20 rounded-pill text-reset"
                                    name="status">
                                    <option value="Aktif">{{ __('Aktif') }}</option>
                                    <option value="Pasif">{{ __('Pasif') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-bs-dismiss="modal">{{ __('İptal') }}</button>
                        <button id="add_button" type="submit" class="btn btn-primary">{{ __('Ekle') }}
                            <i class="ph-paper-plane-tilt ms-2"></i>
                        </button>

                        <button id="adding_button" class="btn btn-primary" type="button" style="display:none;"
                            disabled>
                            <span role="status">{{ __('Ekleniyor') }}</span>
                            <span class="spinner-border spinner-border-sm ms-2" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /add portfolio modal -->

    <!-- Update portfolio modal -->
    <div id="my_update_item_modal" class="modal fade" data-bs-keyboard="false" data-bs-backdrop="static"
        tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Çalışma Güncelleme Formu') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form class="form-horizontal" id="my_update_item_form" action="{{ route('backend.portfolio.update') }}"
                    method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="my_modal_id" name="id" value="{{ $portfolio->id }}">

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('ID:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_id" name="id" disabled
                                    readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Kategori:') }}</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="my_modal_category" name="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            @if ($category->status == 'Aktif')
                                                {{ $category->name }}
                                            @else
                                                {{ $category->name }} (Dikkat Pasif Kategori!)
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Başlık:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_name" name="name" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Güncel Resim:') }}</label>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card">
                                    <div class="card-img-actions m-1">
                                        <img id="my_update_modal_image_src" class="card-img img-fluid">
                                        <div class="card-img-actions-overlay card-img">
                                            <a id="my_update_modal_image_href"
                                                class="btn btn-outline-white btn-icon rounded-pill"
                                                data-toggle="lightbox">
                                                <i class="ph-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Resim:') }}</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="my_modal_image" name="image"
                                    accept="image/*">
                                <div class="form-text">
                                    {{ __('Yalnızca resim dosyası formatlarını desteklenmektedir. Resim boyutu en fazla 2 MB olabilir.') }}
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Özet:') }}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="my_modal_summary" name="summary" rows="2" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('İçerik:') }}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="my_update_modal_editor" name="content" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Aşama:') }}</label>
                            <div class="col-sm-2 mt-1">
                                <select class="form-control my-badge badge bg-opacity-20 rounded-pill text-reset"
                                    id="my_modal_stage" name="stage">
                                    <option value="Başlangıç">{{ __('Başlangıç') }}</option>
                                    <option value="Geliştirme">{{ __('Geliştirme') }}</option>
                                    <option value="Tamamlandı">{{ __('Tamamlandı') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Durum:') }}</label>
                            <div class="col-sm-2 mt-1">
                                <select class="form-control my-badge badge bg-opacity-20 rounded-pill text-reset"
                                    id="my_modal_status" name="status">
                                    <option value="Aktif">{{ __('Aktif') }}</option>
                                    <option value="Pasif">{{ __('Pasif') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('İptal') }}
                        </button>
                        <button id="update_button" type="submit" class="btn btn-primary">{{ __('Güncelle') }}
                            <i class="ph-paper-plane-tilt ms-2"></i>
                        </button>

                        <button id="updating_button" class="btn btn-primary" type="button" style="display:none;"
                            disabled>
                            <span role="status">{{ __('Güncelleniyor') }}</span>
                            <span class="spinner-border spinner-border-sm ms-2" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /update portfolio modal -->

    <!-- Detail portfolio modal -->
    <div id="my_item_detail_modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Çalışma Ayrıntıları') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form class="form-horizontal" id="my_item_detail_form">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('ID:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_id" name="id" disabled
                                    readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Yazar:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_user" name="user" disabled
                                    readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Kategori:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_category" name="category"
                                    disabled readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Başlık:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_name" name="name" disabled
                                    readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Slug:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_slug" name="slug" disabled
                                    readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Resim URL:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_image" name="image" disabled
                                    readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Resim:') }}</label>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card">
                                    <div class="card-img-actions m-1">
                                        <img id="my_detail_modal_image_src" class="card-img img-fluid">
                                        <div class="card-img-actions-overlay card-img">
                                            <a id="my_detail_modal_image_href"
                                                class="btn btn-outline-white btn-icon rounded-pill"
                                                data-toggle="lightbox">
                                                <i class="ph-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Oluşturulma Tarihi:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_created_at" name="created_at"
                                    disabled readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Değiştirilme Tarihi:') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="my_modal_updated_at" name="updated_at"
                                    disabled readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Özet:') }}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="my_modal_summary" name="summary" rows="2" disabled readonly></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('İçerik:') }}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="my_modal_content" name="content" rows="3" cols="3" disabled
                                    readonly></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Aşama:') }}</label>
                            <div class="col-sm-2 mt-1">
                                <select class="form-control my-badge badge bg-opacity-20 rounded-pill text-reset"
                                    id="my_modal_stage" name="stage" disabled readonly>
                                    <option value="Başlangıç">{{ __('Başlangıç') }}</option>
                                    <option value="Geliştirme">{{ __('Geliştirme') }}</option>
                                    <option value="Tamamlandı">{{ __('Tamamlandı') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label text-center col-sm-3 fs-lg fw-bold">{{ __('Durum:') }}</label>
                            <div class="col-sm-2 mt-1">
                                <select class="form-control my-badge badge bg-opacity-20 rounded-pill text-reset"
                                    id="my_modal_status" name="status" disabled readonly>
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
    <!-- /detail portfolio modal -->
@endsection
