<div class="p-1 grid grid-cols-1 items-center justify-center">
    @foreach ($categories as $category)
        <div class="p-4 flex relative overflow-hidden bg-gray-400 rounded-lg h-48 shadow-lg mb-6">
            <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none"
                style="transform: scale(1.5); opacity: 0.1;">
                <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)"
                    fill="white" />
                <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)"
                    fill="white" />
            </svg>
            <div class="elative flex ">
                <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3"
                    style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
                </div>
                <span
                    class="absolute top-4 rtl:right-7 ltr:left-7 text-white z-10 block opacity-75 -mb-1 text-xs mt-2 bg-primary rounded-lg p-2">
                    {{ __('front.count_of_products') }}
                    :
                    {{ $category->products->where('quantity', '>', 0)->count() }}</span>

                <img class="relative w-72  object-cover h-40 rounded-lg " src="{{ asset($category->image_path) }}"
                    alt="">
            </div>
            <div class="w-full relative text-white px-6 pb-4 mt-4">
                <div class="flex justify-between">
                    <span class="block font-semibold text-xl">{{ $category->{'name_' . getLocale()} }}</span>
                    <a href="{{ route('product.index', $category->id) }}"
                        class=" bg-white rounded-full text-primary text-xs font-bold px-3 py-2 leading-none flex items-center">
                        {{ __('front.show') }}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
