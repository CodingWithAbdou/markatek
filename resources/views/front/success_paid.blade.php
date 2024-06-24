@extends('front.layouts.app')

@section('title')
    {{ __('front.success_paid') }}
@endsection


@section('content')
    <section class="max-w-screen-2xl mx-auto p-4 mt-16 shadow md:p-12 bg-white rounded-lg">
        <div class="  col-span-3 px-4 py-3 leading-normal text-primary  text-2xl">
            <p>{{ __('front.success_paid') }}</p>
        </div>
        <div class=" mt-4 col-span-3 px-4 py-3    rounded-lg" role="alert">
            @if ($order->email)
                <p class="mb-4"> * {{ __('front.we_send_invoice_to_email') }} : {{ $order->email }}</p>
            @endif
            <p>* {{ __('front.coupy_unique_code_for_track_order') }} : {{ $order->InvoiceId }}</p>
        </div>
    </section>
@endsection
