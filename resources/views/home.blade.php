<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content=" , ,  " />
    <meta name="title" content="" />
    <meta name="description" content="" />
    <meta name="author" content="Khaldi Abdou  @https://khamsat.com/user/khaldi_abdou" />
    <meta name="copyright" content="https://github.com/CodingWithAbdou" />

    <link rel="shortcut icon" href="images/logo2.jpeg" type="image/x-icon" />

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
    <nav class="bg-gray-50 py-2 shadow-sm">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">

                <div class="flex flex-1 gap-4 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <a href="{{ route('main') }}">
                            <img class="h-8 w-auto"
                                src="{{ App\Models\Setting::where('setting_key', 'logo')->first()->setting_value }}"
                                alt="ماركتك">
                        </a>
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="{{ route('main') }}"
                                class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                                aria-current="page">الرئيسية</a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    {{-- <button type="button"
                        class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button> --}}
                </div>
            </div>
        </div>
    </nav>

    <!--------------
            Main Content
        --------------->
    <main></main>
    <!--------------
            Footer
        --------------->
    <footer></footer>
</body>
<script src="{{ asset('assets/lib/jquery.js') }}"></script>
<script src="{{ asset('assets/lib/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/lib/aos.js') }}"></script>
@vite('resources/js/app.js')

</html>
