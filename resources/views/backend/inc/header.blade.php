<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex border-top">
        <div class="d-flex">
            <div class="breadcrumb py-2">
                <a href="" class="breadcrumb-item"><i class="ph-house"></i><mark>!Burayı unutma!</mark></a>
                <a href="{{ route('backend.dashboard.index') }}" class="breadcrumb-item">{{ __('Ana Sayfa') }}</a>

                @stack('header')
                {{-- <span class="breadcrumb-item active">{{ __('İletişim') }}</span> --}}

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
