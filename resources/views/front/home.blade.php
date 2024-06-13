@extends('front.layouts.app')

@section('content')
    @if ($banners->count() > 0)
        <section class=" rounded-lg slider">
            @foreach ($banners as $banner)
                <div class="relative overflow-hidden" style="max-height: calc(100vh - 130px);">
                    @if ($banner->{'title_ar'} || $banner->{'description_ar'})
                        <span class="absolute  inset-0 bg-neutral-800 opacity-70"></span>
                    @endif
                    <div class="absolute left-2/4 top-2/4  -translate-x-2/4  -translate-y-2/4  text-white">
                        <h1 class="text-center text-4xl md:text-7xl">
                            {{ $banner->{'title_ar'} }}
                        </h1>
                        <p class="text-center  mt-6">{{ $banner->{'description_ar'} }}</p>
                    </div>
                    <img class="w-full object-cover  shadow-sm border-indigo-200" style="height: calc(100vh - 130px);"
                        src="{{ asset($banner->image_path) }}"alt="">
                </div>
            @endforeach
        </section>
    @endif
    <section class="relative z-30 max-w-screen-2xl mx-auto grid grid-cols-2  md:grid-cols-4 border">
        <div class="flex  gap-4 items-center justify-center  md:text-3xl bg-white py-6 border-l">
            <i class='bx bxs-purchase-tag mt-1'></i>
            <span>تخفيضات مذهلة
            </span>
        </div>
        <div class="flex  gap-4 items-center justify-center  md:text-3xl bg-white py-4 border-l">
            <i class='bx bxs-package mt-1'></i>
            <span>توصيل سريع
            </span>
        </div>
        <div class="flex  gap-4 items-center justify-center  md:text-3xl bg-white py-4 border-l">
            <i class='bx bxs-offer mt-1'></i>
            <span>عروض حصرية
            </span>
        </div>
        <div class="flex  gap-4 items-center justify-center  md:text-3xl bg-white py-4 border-l">
            <i class='bx bxs-bomb mt-1'></i>
            <span>منتجات مميزة
            </span>
        </div>
    </section>

    <section class="mt-16">
        <div class="flex items-center  gap-2 text-neutral-800 w-fit mx-auto text-5xl mb-16 relative ">
            <i class='bx bx-category-alt'></i>
            <h2 class="">جميع تصنيفاتنا</h2>
        </div>
        <div class="p-1 flex flex-wrap items-center justify-center">
            @foreach ($categories as $category)
                <div class="flex-shrink-0 m-6 relative overflow-hidden bg-teal-600 rounded-lg max-w-xs shadow-lg">
                    <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none"
                        style="transform: scale(1.5); opacity: 0.1;">
                        <rect x="159.52" y="175" width="152" height="152" rx="8"
                            transform="rotate(-45 159.52 175)" fill="white" />
                        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)"
                            fill="white" />
                    </svg>
                    <div class="relative pt-10 px-10 flex items-center justify-center">
                        <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3"
                            style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
                        </div>
                        <img class="relative w-40" src="{{ asset($category->image_path) }}" alt="">
                    </div>
                    <div class="relative text-white px-6 pb-6 mt-6">
                        <span class="block opacity-75 -mb-1">{{ $category->description }}</span>
                        <div class="flex justify-between">
                            <span class="block font-semibold text-xl">{{ $category->name }}</span>
                            <a href="{{ route('product.index', $category->id) }}"
                                class=" bg-white rounded-full text-teal-500 text-xs font-bold px-3 py-2 leading-none flex items-center">
                                المنتجات</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </section>

@endsection



@push('script')
    <script>
        $(document).ready(function() {
            $('.slider').slick({
                rtl: true,

                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear'

            });
        });
    </script>
@endpush
