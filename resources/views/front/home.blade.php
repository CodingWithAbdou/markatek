@extends('front.layouts.app')

@section('content')
    <div class="grid grid-cols-3 gap-6">
        @foreach ($categories as $category)
            <div class="relative grid-cols-1  max-w-52 max-h-52 overflow-hidden shadow-sm rounded-md">
                <img class="min-w-[100%]" src="{{ asset($category->image_path) }}" width="400" alt="">
                <h3>{{ $category->name }}</h3>
            </div>
        @endforeach
    </div>
@endsection
