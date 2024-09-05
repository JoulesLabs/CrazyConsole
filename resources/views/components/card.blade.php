<div>
    <div class="card">
        <div {{ $attributes->merge(['class' => 'card-header d-flex align-items-center']) }}>{{ $title }}

            <div class="ms-auto me-1 d-print-none">
                {{ $actions ?? '' }}
            </div>

        </div>
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>
</div>
