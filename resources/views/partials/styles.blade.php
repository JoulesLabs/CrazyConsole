<link rel="stylesheet" href="{{  asset('assets/vendors/simplebar/css/simplebar.css') }}">
<link rel="stylesheet" href="{{  asset('assets/css/vendors/simplebar.css') }}">
<!-- Main styles for this application-->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<!-- We use those styles to show code examples, you should remove them in your application.-->
<link href="{{ asset('assets/css/examples.css') }}" rel="stylesheet">
<!-- We use those styles to style Carbon ads and CoreUI PRO banner, you should remove them in your application.-->
<link href="{{ asset('assets/css/ads.css') }}" rel="stylesheet">

@vite(['resources/css/app.css'])

@stack('styles')
