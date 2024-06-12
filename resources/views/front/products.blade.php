@extends('front.layouts.app')

@section('content')
    <section class="py-12 max-w-full mx-auto px-4 md:px-12">
        <div class="flex items-center  gap-2 text-neutral-800 w-fit mx-auto text-5xl mb-16 relative ">
            <i class='bx bx-category-alt'></i>
            <h2 class="">المنتجات</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            @forelse ($category->products as $product)
                <div
                    class="relative z-40 col-span-1 flex max-w-md overflow-hidden bg-white rounded-lg shadow border border-neutral-200 ">
                    <div class="w-1/3 bg-cover bg-gray-300 border-l  border-neutral-200 ">
                        <img class="w-full h-full object-cover " src="{{ asset($product->cover_path) }}" width="400"
                            alt="">
                    </div>
                    <div class="w-2/3 p-4 md:p-4 flex flex-col justify-between">
                        <h1 class="text-xl font-bold text-nutueral-800 dark:text-white">{{ $product->name }}</h1>
                        <p class="mt-2 text-sm text-nutueral-400 dark:text-nutueral-300">{{ $product->description }}</p>
                        <div class="flex justify-between mt-3 item-center">
                            <h1 class="text-lg font-bold text-nutueral-700 dark:text-nutueral-200 md:text-xl">
                                {{ $product->price }}
                            </h1>
                            <button id="add-to-cart"
                                class="flex items-center gap-2 px-2 py-1 text-xs font-bold text-white uppercase transition-colors duration-300 transform bg-gray-800 rounded-lg dark:bg-gray-700 hover:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-700 dark:focus:bg-gray-600
                                ">
                                <span> اضف
                                    الي السلة</span>
                                <i class='bx bx-cart-add text-white text-xl'></i>
                            </button>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-span-3 px-4 py-3 leading-normal text-indigo-700 border border-indigo-500 rounded-lg"
                    role="alert">
                    <p>لا توجد منتجات تحت هذا التصنيف</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
@push('script')
    <script></script>
@endpush
