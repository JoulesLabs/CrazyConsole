<!DOCTYPE html>

<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,SCSS,HTML,RWD,Dashboard">
    <title>CoreUI Bootstrap Admin Template</title>

    <link rel="manifest" href="{{ asset('assets/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('/assets/vendors/simplebar/css/simplebar.css') }}">
    <!-- Main styles for this application-->
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->

    @stack('styles')

    @vite(['resources/js/app.js'])

    @stack('scripts')
    <!-- End Google Tag Manager-->
</head>
<body>
<x-turbo::frame id="root-frame" target="_top">
<!-- End Google Tag Manager (noscript)-->
    <x-turbo::frame id="main-frame" class="min-vh-100 d-flex flex-row align-items-center" target="_top">
    <div class="container">

        <div class="row justify-content-center">
             @yield('contents')

        </div>
    </div>
    </x-turbo::frame>
</x-turbo::frame>
<!-- CoreUI and necessary plugins-->
<script>
    const header = document.querySelector('header.header');

    document.addEventListener('scroll', () => {
        if (header) {
            header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
        }
    });
</script>

</body>
</html>
