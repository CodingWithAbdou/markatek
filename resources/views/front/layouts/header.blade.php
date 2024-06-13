<nav class="relative flex items-center justify-center z-10 px-4 md:px-12 bg-white py-2 shadow-sm ">
    <div class="max-w-screen-2xl flex-1">
        <div class="relative flex h-16 items-center justify-between">

            <div class="flex gap-4 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <a href="{{ route('main') }}">
                        <img class="h-10 w-auto"
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
                <div class="flex-1 flex  items-center justify-center gap-8 mb-2">
                    <div class="pt-2 relative mx-auto text-gray-600">
                        <input
                            class="border border-neutral-300  bg-white h-10 py-2 px-5 pl-16 rounded-full text-sm focus:outline-none focus:border-neutral-400"
                            type="search" name="search" placeholder="إبحث عن المنتجات">
                        <button type="submit" class="absolute left-0 top-0 mt-5 ml-4">
                            <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                xml:space="preserve" width="512px" height="512px">
                                <path
                                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div>
                <div class="  block">
                    <div class="flex gap-3">
                        <a href="{{ route('main') }}"
                            class=" flex items-center justify-center gap-1 text-neutral-800 rounded-md px-3 py-2 text-sm font-medium"
                            aria-current="page">
                            <i class='bx bxs-truck text-2xl' style="transform: rotateY(180deg)"></i>
                            <span class="mt-1">تتبع الطلبات</span>
                        </a>

                        <a href="{{ route('cart.index') }}"
                            class=" flex items-center justify-center gap-1 text-neutral-800 rounded-md ps-3 py-2 text-sm font-medium"
                            aria-current="page">
                            <div class="relative">
                                @php
                                    $cart = session()->get('cart', []);
                                @endphp
                                @if (count($cart))
                                    <span id="badge-cart"
                                        class="absolute -bottom-2 -right-2 bg-orange-500 flex items-center font-bold justify-center w-4 h-4 rounded-full text-[10px] text-white">
                                        {{ count($cart) }}
                                    </span>
                                @else
                                    <span id="badge-cart"
                                        class="hidden absolute -bottom-2 -right-2 bg-orange-500  items-center font-bold justify-center w-4 h-4 rounded-full text-[10px] text-white">
                                    </span>
                                @endif

                                <i id="cart" class='bx bx-shopping-bag text-2xl relative'></i>
                            </div>
                            <span class="mt-1">سلة التسوق</span>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="relative z-10  bg-teal-600 py-2 shadow-sm ">
    <div class="flex">
        <a href="{{ route('main') }}"
            class="flex items-center gap-1 px-4 md:px-44 rounded-md py-2 text-sm font-medium text-white transition duration-200 hover:text-gray-100"
            aria-current="page">
            <span><i class='bx bx-home-alt-2  '></i></span>
            الرئيسية</a>
    </div>
</div>
