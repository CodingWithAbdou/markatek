<nav class="relative flex items-center justify-center z-10 px-4 md:px-12 bg-white py-2 shadow-sm  bg-prima">
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
                            class="border border-neutral-300  bg-white h-10 py-2 px-5 pl-16 rounded-full text-sm focus:outline-none focus:border-primary "
                            type="search" name="search" placeholder="إبحث عن المنتجات">
                        <button type="submit" class="absolute left-0 top-0 mt-5 ml-4">
                            <i class='bx bx-search text-primary'></i>
                        </button>
                    </div>
                </div>
            </div>
            <div>
                <div class="  block">
                    <div class="flex gap-3">
                        <a href="{{ route('main') }}"
                            class=" flex items-center justify-center gap-1 text-neutral-800 rounded-md px-3 py-2 text-sm font-medium trnsition duration-200 hover:text-primary"
                            aria-current="page">
                            <i class='bx bxs-truck text-2xl' style="transform: rotateY(180deg)"></i>
                            <span class="mt-1">تتبع الطلبات</span>
                        </a>

                        <a href="{{ route('cart.index') }}"
                            class=" flex items-center justify-center gap-1 text-neutral-800 rounded-md ps-3 py-2 text-sm font-medium trnsition duration-200 hover:text-primary"
                            aria-current="page">
                            <div class="relative">
                                @php
                                    $cart = session()->get('cart', []);
                                @endphp
                                @if (count($cart))
                                    <span id="badge-cart"
                                        class="absolute -bottom-2 -right-2 bg-primary flex items-center font-bold justify-center w-4 h-4 rounded-full text-[10px] text-white">
                                        {{ count($cart) }}
                                    </span>
                                @else
                                    <span id="badge-cart"
                                        class="hidden absolute -bottom-2 -right-2 bg-primary  items-center font-bold justify-center w-4 h-4 rounded-full text-[10px] text-white">
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
<div class="flex gap-2 relative z-10  bg-primary py-2 shadow-sm ">
    <div class="flex">
        <a href="{{ route('main') }}"
            class="flex items-center gap-1 px-4 md:ps-44 md:pe-8 rounded-md py-2 text-sm font-medium text-white transition duration-200 hover:text-gray-100"
            aria-current="page">
            <span><i class='bx bx-home-alt-2  '></i></span>
            الرئيسية</a>
        @php
            $categories = App\Models\Category::orderBy('order_by', 'asc')->get();
        @endphp
        @foreach ($categories as $category)
            @if ($loop->index < 5)
                <a href="{{ route('product.index', $category->id) }}"
                    class="flex items-center gap-1 px-4  rounded-md py-2 text-sm font-medium text-white transition duration-200 hover:text-gray-100"
                    aria-current="page">
                    {{ $category->name }}</a>
            @endif
        @endforeach
    </div>
</div>
