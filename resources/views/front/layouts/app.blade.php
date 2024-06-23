<!DOCTYPE html>
<html lang="en" dir="{{ getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="{{ App\Models\Setting::where('setting_key', 'keywords')->first()->setting_value }}" />
    <meta name="title"
        content=" {{ App\Models\Setting::where('setting_key', 'website_name_' . getLocale())->first()->setting_value }}" />
    <meta name="description"
        content="{{ App\Models\Setting::where('setting_key', 'description_' . getLocale())->first()->setting_value }}" />
    <meta name="author" content="Khaldi Abdou  https://khaldiabdou.com" />
    <meta name="copyright" content="https://github.com/CodingWithAbdou" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- FavIcon --}}
    <link rel="shortcut icon"
        href=" {{ asset(App\Models\Setting::where('setting_key', 'favicon')->first()->setting_value) }}"
        type="image/x-icon" />
    {{-- Font Family --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">
    {{-- slider Library --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/slick/slick-theme.css') }}" />
    {{-- Library Icons --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* @layer base { */
        :root {
            --color-primary: {{ App\Models\Setting::where('setting_key', 'color_site')->first()->setting_value }};
            /* ... */
        }

        /* } */
    </style>
    @vite('resources/css/app.css')
    @stack('style')

    <title>@yield('title')</title>
</head>

<body class="relative ">
    <!--------------
            Preloader
        --------------->

    <span class="absolute w-full h-full block bg-cover bg-center "
        style="background: url('{{ asset('assets/images/background.svg') }}')">
    </span>

    <!--------------
            Navigation
        --------------->

    @include('front.layouts.header')

    <!--------------
            Main Content
        --------------->
    <main class="min-h-[600px] relative overflow-hidden pt-[132px]">
        @yield('content')
    </main>
    <!--------------
            Footerca
        --------------->
    @include('front.layouts.footer')

    <script src="{{ asset('assets/lib/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/lib/slick/slick.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @vite('resources/js/app.js')


    @stack('script')
</body>

</html>
