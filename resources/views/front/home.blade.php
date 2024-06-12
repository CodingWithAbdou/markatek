@extends('front.layouts.app')

@section('content')
    @if ($banners->count() > 0)
        <div class=" rounded-lg slider">
            @foreach ($banners as $banner)
                <div class="relative overflow-hidden" style="max-height: calc(100vh - 132px);">
                    <span class="absolute  inset-0 bg-neutral-800 opacity-70"></span>
                    <div class="absolute left-2/4 top-2/4  -translate-x-2/4  -translate-y-2/4  text-white">
                        <h1 class="text-center text-4xl md:text-7xl">
                            {{ $banner->{'title_ar'} }}
                        </h1>
                        <p class="text-center  mt-4">{{ $banner->{'description_ar'} }}</p>
                    </div>
                    <img class="w-full object-cover  shadow-sm border-indigo-200" style="height: calc(100vh - 132px);"
                        src="{{ asset($banner->image_path) }}"alt="">
                </div>
            @endforeach
        </div>
    @endif
    <div class="mt-12">
        <h3 class="text-neutral-700 text-4xl w-fit mx-auto mb-12">التصــنيفات</h3>
        <div class="grid grid-cols-3 gap-6">
            @foreach ($categories as $category)
                <a href="{{ route('product.index', $category->id) }}"
                    class="relative grid-cols-1  max-w-52 max-h-52 overflow-hidden shadow-sm rounded-md ">
                    <div class="bg-gray-100 opacity-50 absolute inset-0"></div>
                    <img class="min-w-[100%]" src="{{ asset($category->image_path) }}" width="400" alt="">
                    <h3 class="absolute bottom-3 left-3 text-white text-lg">{{ $category->name }}</h3>
                </a>
            @endforeach
        </div>
    </div>
@endsection



@push('script')
    <script>
        $(document).ready(function() {
            $('.slider').slick({
                rtl: true,
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                adaptiveHeight: true,
            });
        });
    </script>
@endpush
