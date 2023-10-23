<!-- Notifications -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="notifications">
    <div class="offcanvas-header py-0">
        <h5 class="offcanvas-title py-3">{{ __('Bildirimler') }}</h5>
        <button type="button" class="btn btn-light btn-sm btn-icon border-transparent rounded-pill"
            data-bs-dismiss="offcanvas">
            <i class="ph-x"></i>
        </button>
    </div>

    <div class="offcanvas-body p-0">
        <div class="bg-light fw-medium py-2 px-3">{{ __('Beklemede Olan Mesajlar') }}</div>
        <div class="p-3">
            @if ($waitingContacts != null && $waitingContacts->count() > 0)
                @foreach ($waitingContacts as $contact)
                    <div class="d-flex align-items-start mb-3">
                        <div class="me-3">
                            <div class="bg-warning bg-opacity-10 text-warning rounded-pill">
                                <i class="ph-user-plus p-2"></i>
                            </div>
                        </div>
                        <div class="flex-1">
                            <strong>{{ $contact->title }}</strong> - <i>{{ $contact->name }}</i>
                            {{ __('kişisinden yanıtlamayan bir mesajınız var.') }}
                            <div class="fs-sm text-muted mt-1">
                                @php
                                    $created_at = \Carbon\Carbon::parse($contact->created_at);
                                    $today = \Carbon\Carbon::now();
                                    $daysPassed = $today->diffInDays($created_at);
                                @endphp
                                @if ($daysPassed > 0)
                                    {{ $daysPassed }} {{ __('gün önce') }}
                                @else
                                    {{ __('Bugün') }}
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="d-flex align-items-start ">
                    <div class="me-3">
                        <div class="bg-success bg-opacity-10 text-success rounded-pill">
                            <i class="ph-check p-2"></i>
                        </div>
                    </div>
                    <div class="flex-fill mt-2">
                        {{ __('Yanıtlanmamış bir mesaj yok') }}
                    </div>
                </div>
            @endif
        </div>

        <div class="bg-light fw-medium py-2 px-3">{{ __('Bildirilen Yorumlar') }}</div>
        <div class="p-3">
            @if ($commentReports != null && $commentReports->count() > 0)
                @foreach ($commentReports as $commentReport)
                    <div class="d-flex align-items-start mb-3">
                        <div class="me-3">
                            <div class="bg-danger bg-opacity-10 text-danger rounded-pill">
                                <i class="ph-thumbs-down p-2"></i>
                            </div>
                        </div>
                        <div class="flex-fill">
                            <strong>{{ __('Yorum Şikayeti') }}</strong> - <i>{{ $commentReport->user->name }}</i>
                            {{ __('kişisinin bir yorum hakkında şikayeti var.') }}
                            <div class="fs-sm text-muted mt-1">
                                @php
                                    $created_at = \Carbon\Carbon::parse($commentReport->created_at);
                                    $today = \Carbon\Carbon::now();
                                    $daysPassed = $today->diffInDays($created_at);
                                @endphp
                                @if ($daysPassed > 0)
                                    {{ $daysPassed }} {{ __('gün önce') }}
                                @else
                                    {{ __('Bugün') }}
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="d-flex align-items-start ">
                    <div class="me-3">
                        <div class="bg-success bg-opacity-10 text-success rounded-pill">
                            <i class="ph-check p-2"></i>
                        </div>
                    </div>
                    <div class="flex-fill mt-2">
                        {{ __('Şikayet edilen bir yorum yok') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<!-- /notifications -->
