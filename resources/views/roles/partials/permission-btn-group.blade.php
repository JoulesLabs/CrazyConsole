<div class="col-12">
    <div class="float-start">
        <h4>Permissions</h4>
    </div>
    <div class="float-end">
        <div class="col col-md-12">
            <div class="form-group">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <x-button.secondary id="denyall" data-action="click->permission#denyAll">Deny All</x-button.secondary>
                    <x-button.secondary id="defaultall" data-action="click->permission#inheritAll">Inherit All</x-button.secondary>
                    <x-button.secondary id="allowall" data-action="click->permission#allowAll">Allow All</x-button.secondary>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')

@endpush
