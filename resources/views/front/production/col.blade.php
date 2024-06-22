<div class="grid grid-cols-1 gap-4 ">
    @forelse ($products as $product)
        <div
            class="relative z-40 col-span-1 flex  overflow-hidden bg-white rounded-lg shadow-lg border border-neutral-200 ">
            <div class="w-1/4 bg-cover bg-gray-300 border-l  border-neutral-200 ">
                <img class="w-full h-full object-cover " src="{{ asset($product->cover_path) }}" width="400"
                    alt="">
            </div>
            <div class="w-3/4 p-4 md:p-4 flex flex-col justify-between">
                <h1 class="text-xl font-bold text-nutueral-800 dark:text-white">
                    {{ $product->{'name_' . getLocale()} }}</h1>
                <p class="mt-2 text-sm text-nutueral-400 dark:text-nutueral-300">
                    {{ $product->{'name_' . getLocale()} }}</p>
                <div class="flex justify-between mt-3 item-center">
                    <h3 class=" font-bold text-nutueral-700 dark:text-nutueral-200 md:text-xl">
                        <span class="text-lg md:text-xl">{{ $product->price }} </span>
                        <span class="text-sm ">{{ __('front.kwd') }}</span>
                    </h3>
                    <form class="add-to-cart">
                        @php
                            $cart = session()->get('cart', []);
                        @endphp
                        <input type="hidden" name="product" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button id="btn-{{ $product->id }}"
                            class="{{ isset($cart["$product->id"]) ? 'hidden' : 'flex' }} btn_cart items-center gap-2 px-2 py-1 text-xs font-bold text-white uppercase transition-colors duration-300 transform bg-gray-800 rounded-lg dark:bg-gray-700 hover:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-700 dark:focus:bg-gray-600
                            ">
                            <span class="hidden md:inline-block">{{ __('front.add_cart') }}</span>
                            <i class='bx bx-cart-add text-white text-xl'></i>
                        </button>
                        <div id="input-{{ $product->id }}"
                            class="{{ isset($cart["$product->id"]) ? 'flex' : 'hidden' }} items-center justify-center border-gray-100">
                            <span
                                class="desc_product cursor-pointer rtl:rounded-r ltr:rounded-l  py-1 px-3.5 duration-100 hover:bg-primary hover:text-white">
                                - </span>
                            <input class="count_product h-8 w-8 border  bg-white text-center text-xs outline-none"
                                type="number"
                                value="{{ isset($cart["$product->id"]) ? $cart["$product->id"]['quantity'] : '1' }}"
                                min="1" disabled />
                            <span
                                class="asc_product  cursor-pointer rtl:rounded-l ltr:rounded-r  py-1 px-3 duration-100 hover:bg-primary hover:text-white">
                                + </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @empty
        <div class="col-span-3 px-4 py-3 leading-normal text-primary border border-primary rounded-lg" role="alert">
            <p>{{ __('front.empty_products') }}</p>
        </div>
    @endforelse
</div>
