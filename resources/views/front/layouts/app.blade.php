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

    <link rel="shortcut icon" href="images/logo2.jpeg" type="image/x-icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/lib/aos.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/lib/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/lib/bootstrap.css') }}" />
    @vite('resources/css/app.css')

    <title></title>
</head>

<body>
    <!--------------
            Preloader
        --------------->
    <!-- <div class="preloader" data-preloader>
            <div class="circle"></div>
        </div> -->


    <!--------------
            Navigation
        --------------->

    @include('front.layouts.header')

    <!--------------
            Main Content
        --------------->
    <main class="min-h-[600px] px-2 md:w-10/12 mx-auto py-8">
        @yield('content')
    </main>
    <!--------------
            Footer
        --------------->
    @include('front.layouts.footer')
</body>
<script src="{{ asset('assets/lib/jquery.js') }}"></script>
<script src="{{ asset('assets/lib/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/lib/aos.js') }}"></script>
@vite('resources/js/app.js')

</html>
