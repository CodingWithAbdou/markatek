@php
    $cart = session()->get('cart', []);
@endphp
@foreach ($items as $id => $item)
    <div class="mb-6 rounded-lg bg-white p-6 shadow-md flex  gap-6 justify-start">
        <img src="{{ asset($item->cover_path) }}" alt="product-image" class=" h-40 object-cover rounded-lg w-40" />
        <div class="relative ml-4 flex w-full justify-between flex-col sm:flex-row ">
            <div class=" mt-0 flex items-start justify-between flex-col pb-4 sm:py-6">
                <h2 class="text-lg font-bold text-gray-900">{{ $item->{'name_' . getLocale()} }}</h2>
                <p class="mt-1 text-xs text-gray-700">{{ $item->{'description_' . getLocale()} }}</p>
                <p class="mt-1 text-xs text-gray-700"><span>{{ $item->price }}</span><span> {{ __('front.kwd') }}</span>
                </p>
            </div>
            <div class=" flex justify-between  sm:block gap-6">
                <input type="hidden" name="product" value="{{ $item['id'] }}">
                <div class="flex items-center border-gray-100">
                    <button
                        class="desc_product cursor-pointer  rtl:rounded-r ltr:rounded-l py-1 px-3.5 duration-100 hover:bg-primary hover:text-white">
                        - </button>
                    <input class="count_product h-8 w-8 border  bg-white text-center text-xs outline-none"
                        type="number" value="{{ isset($cart["$item->id"]) ? $cart["$item->id"]['quantity'] : '1' }}"
                        min="1" disabled />
                    <button
                        class="asc_product cursor-pointer  rtl:rounded-l ltr:rounded-r   py-1 px-3 duration-100 hover:bg-primary hover:text-white">
                        + </button>
                </div>
            </div>
        </div>
    </div>
@endforeach
