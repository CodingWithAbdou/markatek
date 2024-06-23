@extends('front.layouts.app')
@section('title')
    {{ __('front.search_on') }} : {{ $search }}
@endsection

@section('content')
    <section class="py-16" style="background: url('{{ asset('assets/images/head-bg.png') }}')">
        <div class="flex items-center justify-center flex-col  text-neutral-800 mx-auto relative ">
            <h2 class=" text-5xl font-bold text-neutral-700"> <span>{{ __('front.search_on') }} : {{ $search }} </h2>
            <div class="pt-8">
                <a class="hover:text-primary" href="{{ route('main') }}">{{ __('front.home') }}</a>
                /
                <span>{{ __('front.search') }}</span>
            </div>
        </div>
    </section>
    <section class="max-w-screen-2xl mx-auto p-4 md:px-12 ">
        @if (count($products) > 0)
            <div class="col-span-3 mb-4 px-4 py-3 leading-normal text-primary border border-primary rounded-lg"
                role="alert">
                <p>{{ __('front.count_search') }} : {{ count($products) }}</p>
            </div>
        @endif
        @if (App\Models\Setting::where('setting_key', 'dir_production')->first()->setting_value == '1')
            @include('front.production.row')
        @else
            @include('front.production.col')
        @endif
    </section>
@endsection
