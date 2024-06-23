@extends('front.layouts.app')


@section('title')
    {{ __('front.error_paid') }}
@endsection

@section('content')
    <section class="max-w-screen-2xl mx-auto px-4 md:px-12">
        <div class=" mt-24 col-span-3 px-4 py-3 leading-normal text-red-700 border border-red-700   rounded-lg"
            role="alert">
            <p>{{ __('front.error_paid') }}</p>
        </div>
    </section>
@endsection
