<div aria-live="polite" aria-atomic="true"  class="position-relative">
    <div  id="notification" class="toast-container bottom-0 end-0" data-controller="alert">
        @include('partials.notice', [
            'type' => session('_status') == 'success' ? \App\Enums\NoticeType::SUCCESS :( session('_status') == 'error' ?  \App\Enums\NoticeType::ERROR : null),
            'message' => session('_notice')
        ])
    </div>
</div>
