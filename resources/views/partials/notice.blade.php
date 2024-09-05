@if($type)
    @php
        $toastId = time();
    @endphp
    <div data-turbo-temporary class="toast toaster {{ $type ? 'fade show' : '' }}" role="alert" aria-live="assertive" aria-atomic="true" id="toaster-{{ $toastId }}" data-duration="{{ round(microtime(true) * 1000) }}">
        <div class="toast-header text-{{ $type === \App\Enums\NoticeType::SUCCESS ? 'success' : 'danger' }}">
            <svg class="docs-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#{{ $type === \App\Enums\NoticeType::SUCCESS ? '00FF00' : 'FF0000' }}"></rect></svg>

            <strong class="me-auto">{{ $type->name }}</strong>
            <button type="button" class="btn-close" data-coreui-dismiss="toast" aria-label="Close" data-action="click->alert#dismiss" data-alert-toastid-param="{{ $toastId }}"></button>
        </div>
        <div class="toast-body">
            {{ $message }}
        </div>
    </div>
@endif
