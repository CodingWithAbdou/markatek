@extends('front.layouts.app')

@section('content')
    <div class="slider">
        @foreach ($banners as $banner)
            <div class="rounded-lg  max-h-[200px] overflow-hidden">
                <img class="w-full h-[200px]  object-cover  rounded-lg shadow-sm border-indigo-200"
                    src="{{ asset($banner->image_path) }}" loading="lazy" alt="">
            </div>
        @endforeach
    </div>

    <div class="mt-24">
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
