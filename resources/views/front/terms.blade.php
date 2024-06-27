@extends('front.layouts.app')
@section('title')
    {{ __('front.terms') }}
@endsection

@section('content')
    <section class="py-16" style="background: url('{{ asset('assets/images/head-bg.png') }}')">
        <div class="flex items-center justify-center flex-col  text-neutral-800 mx-auto relative ">
            <h2 class=" text-5xl font-bold text-neutral-700"> <span>{{ __('front.terms') }} </h2>
            <div class="pt-8">
                <a class="hover:text-primary" href="{{ route('main') }}">{{ __('front.home') }}</a>
                /
                <span>{{ __('front.terms') }}</span>
            </div>
        </div>
    </section>
    <section class="max-w-screen-2xl mx-auto p-4 shadow md:p-12 bg-white rounded-lg">
        <div class="  col-span-3 px-4 py-3 leading-normal text-primary  text-2xl">
            <p>{{ __('front.terms') }}</p>
        </div>
        <div class=" mt-4 col-span-3 px-4 py-3 rounded-lg" role="alert">
            {{ $text }}
        </div>
    </section>
@endsection
