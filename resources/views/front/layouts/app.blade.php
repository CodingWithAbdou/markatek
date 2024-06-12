<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content=" , ,  " />
    <meta name="title" content="" />
    <meta name="description" content="" />
    <meta name="author" content="Khaldi Abdou  https://khaldiabdou.com" />
    <meta name="copyright" content="https://github.com/CodingWithAbdou" />

    {{-- FavIcon --}}
    <link rel="shortcut icon" href="images/logo2.jpeg" type="image/x-icon" />
    {{-- Font Family --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">
    {{-- AOS For Nice effect --}}
    <link href="{{ asset('assets/lib/aos.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/lib/nice-select.css') }}" />
    {{-- slider Library --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/slick/slick-theme.css') }}" />
    {{-- Library Icons --}}
    <link href="{{ asset('../node_modules/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    @stack('style')

    <title></title>
</head>

<body class="relative" style="background:#f0f0f0">
    <!--------------
            Preloader
        --------------->
    <!-- <div class="preloader" data-preloader>
            <div class="circle"></div>
        </div> -->
    <span class="absolute w-1/4 h-full block opacity-[3%] -top-20 -left-50"
        style="background-image: url('{{ asset('assets/images/backgroud.svg') }}')">
    </span>

    <!--------------
            Navigation
        --------------->

    @include('front.layouts.header')

    <!--------------
            Main Content
        --------------->
    <main class="min-h-[600px] relative overflow-hidden">

        @yield('content')
    </main>
    <!--------------
            Footerca
        --------------->
    @include('front.layouts.footer')

    <script src="{{ asset('assets/lib/jquery.js') }}"></script>
    <script src="{{ asset('assets/lib/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/lib/aos.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/lib/slick/slick.js') }}"></script>

    @vite('resources/js/app.js')

    @stack('script')
</body>

</html>
