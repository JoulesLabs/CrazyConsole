@unless ($breadcrumbs->isEmpty())
    <turbo-frame id="breadcrumbs-frame" class="container-fluid px-4">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0">
                    @foreach($breadcrumbs as $breadcrumb)
                        @if ($breadcrumb->url && !$loop->last)
                            <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}" data-turbo-frame="main-frame"  data-turbo-action="advance">{{ $breadcrumb->title }}</a></li>
                        @else
                            <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb->title }}</li>
                        @endif
                    @endforeach
                </ol>

        </nav>
    </turbo-frame>
@endunless

