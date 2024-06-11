<nav class="main_color_b py-2 shadow-sm">
    <div class="container">
        <div class="relative flex h-16 items-center justify-between">

            <div class="flex gap-4 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <a href="{{ route('main') }}">
                        <img class="h-8 w-auto"
                            src="{{ asset(App\Models\Setting::where('setting_key', 'logo')->first()->setting_value) }}"
                            alt="ماركتك">
                    </a>
                </div>

                {{-- @auth
                    <div class=" ml-6 block">
                        <div class="flex space-x-4">
                            <a href="{{ route('dashboard.home') }}" class="  rounded-md px-3 py-2 text-sm font-medium"
                                aria-current="page">لوحة
                                التحكم</a>
                        </div>
                    </div>
                @endauth --}}
            </div>
            <div>
                <div class="flex items-center justify-center gap-6">
                    <div class="flex">
                        <a href="{{ route('main') }}" class=" secound_color_t rounded-md py-2 text-sm font-medium"
                            aria-current="page">الرئيسية</a>
                    </div>
                    <div class="flex">
                        <a href="{{ route('main') }}" class=" secound_color_t rounded-md py-2 text-sm font-medium"
                            aria-current="page">تسوق</a>
                    </div>
                </div>
            </div>
            <div>
                <div class=" ml-6 block">
                    <div class="flex space-x-4">
                        <a href="{{ route('main') }}" class=" secound_color_t rounded-md px-3 py-2 text-sm font-medium"
                            aria-current="page">العربة</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
