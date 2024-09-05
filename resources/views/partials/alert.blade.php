<div class="alert alert-{{ $type ?? 'info' }} alert-dismissible fade show" role="alert">
    <div class="fw-semibold">{{ $status == 'error' ? 'Error!' : 'Success!'}}</div>
    <small>   {{ $message }}</small>
    <button type="button" class="btn-close btn-{{ $type ?? 'info' }}" data-coreui-dismiss="alert" aria-label="Close"></button>
</div>
