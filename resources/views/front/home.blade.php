@extends('front.layouts.app')
@section('title', __('front.home'))

@section('content')
    <section class="slider rounded-lg   max-h-[450px] overflow-hidden">
        @if ($banners->count() > 0)
            @foreach ($banners as $banner)
                <div class="relative  max-h-[450px]" overflow-hidden>
                    @if ($banner->{'title_' . getLocale()} || $banner->{'description_ar'})
                        <span class="absolute  inset-0 bg-neutral-800 opacity-70"></span>
                    @endif
                    <div class="absolute left-2/4 top-2/4  -translate-x-2/4  -translate-y-2/4  text-white">
                        <h1 class="text-center text-4xl md:text-7xl">
                            {{ $banner->{'title_' . getLocale()} }}
                        </h1>
                        <p class="text-center  mt-6">{{ $banner->{'description_ar'} }}</p>
                    </div>
                    <img class="w-full object-cover shadow-sm border-indigo-200 h-[450px]"
                        src="{{ asset($banner->image_path) }}"alt="">
                </div>
            @endforeach
        @endif
    </section>
    {{-- <section class="relative z-30 max-w-screen-2xl mx-auto grid grid-cols-2  md:grid-cols-4 border">
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
    </section> --}}

    <section class="mt-16 max-w-screen-2xl mx-auto">
        <div class="flex items-center  gap-2 text-neutral-800 w-fit mx-auto text-4xl mb-8 relative ">
            <i class='bx bx-category-alt'></i>
            <h2 class="">{{ __('front.all_category') }}</h2>
        </div>
        @if (App\Models\Setting::where('setting_key', 'dir_category')->first()->setting_value == '1')
            @include('front.category.row')
        @else
            @include('front.category.col')
        @endif

    </section>
@endsection



@push('script')
    <script>
        $(document).ready(function() {
            $('.slider').slick({
                autoplay: true,
                autoplaySpeed: 3000,
                rtl: {{ getlocale() == 'ar' ? 'true' : 'false' }},
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear'
            });
        });
    </script>
@endpush
