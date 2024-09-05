<div {{ $attributes->merge(['class' => 'accordion-item']) }}>
    <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-coreui-toggle="collapse" data-coreui-target="#collapse-{{ $identifier }}" aria-expanded="true" aria-controls="collapse-{{ $identifier }}">
            {{ $title }}
        </button>
    </h2>
    <div id="collapse-{{ $identifier }}" class="accordion-collapse collapse" data-coreui-parent="#{{ $parentId }}">
        <div class="accordion-body">
            {{ $slot }}
        </div>
    </div>
</div>
