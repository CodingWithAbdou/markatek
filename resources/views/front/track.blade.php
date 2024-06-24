@extends('front.layouts.app')
@section('title')
    {{ __('front.track') }}
@endsection

@section('content')
    <section class="py-16" style="background: url('{{ asset('assets/images/head-bg.png') }}')">
        <div class="flex items-center justify-center flex-col  text-neutral-800 mx-auto relative ">
            <h2 class=" text-5xl font-bold text-neutral-700"> <span>{{ __('front.track') }} </h2>
            <div class="pt-8">
                <a class="hover:text-primary" href="{{ route('main') }}">{{ __('front.home') }}</a>
                /
                <span>{{ __('front.track') }}</span>
            </div>
        </div>
    </section>
    <section class="max-w-screen-2xl mx-auto p-4 md:px-12 ">
        <div class="relative w-full max-w-xl mx-auto  rounded-full">
            <form action="" id="track-from">
                <input placeholder="{{ __('front.enter_order_id') }}"
                    class="rounded-full w-full h-16 bg-transparent py-2 pl-8 ps-4 pe-48 outline-none border border-primary shadow-md hover:outline-none focus:ring-primary focus:border-primary text-sm md:text-base"
                    type="text" name="query" id="query">
                <button
                    class="absolute inline-flex items-center gap-2 h-10 px-4 py-2 text-sm text-white transition duration-150 ease-in-out rounded-full outline-none ltr:right-3 rtl:left-3 top-3 bg-primary sm:px-6 sm:text-base sm:font-medium hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    <i class='bx bx-search-alt xl'
                        style="{{ getLocale() == 'en' ? 'transform: rotateY(180deg)' : '' }}"></i>
                    <span>{{ __('front.track') }}</span>
                </button>
            </form>
            <div class="text-neutral-600 px-4 text-xs">{{ __('front.example_order_id') }} : <span class="text-xs">
                    4061557</span></div>

            <div id="order-content" class="hidden bg-white mt-16 py-6 px-4 rounded-lg shadow w-full">
                <span id="order-status">
                </span>
            </div>
        </div>
    </section>
@endsection


@push('script')
    <script>
        $(document).ready(function() {
            $('#track-from').on('submit', function(e) {
                e.preventDefault();
                let data = {
                    track: $('#query').val()
                }
                $('#order-content').addClass('hidden');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ route('track.search') }}",
                    data: data,
                    success: function(response) {
                        if (response.msg == 'not_found') {
                            toastr.error("{{ __('front.order_not_found') }}")
                        } else {
                            toastr.success("{{ __('front.order_found') }}")
                            let color, bg, msg
                            if (response.status_order == 'pending') {
                                msg = "{{ __('front.pending') }}"
                                bg = '#fdf6b2'
                                color = '#854d0e'
                            } else if (response.status_order == 'processing') {
                                msg = "{{ __('front.processing') }}"
                                bg = '#93c5fd'
                                color = '#075985'
                            } else if (response.status_order == 'completed') {
                                msg = "{{ __('front.completed') }}"
                                bg = '#86efac'
                                color = '#155e75'
                            } else {
                                msg = "{{ __('front.cancelled') }}"
                                bg = '#fda4af'
                                color = '#9f1239'
                            }

                            $('#order-status').html(
                                `<span style="color: ${color}">${msg}</span>`
                            )
                            $('#order-content').removeClass('hidden').css('background', bg)
                        }
                    },
                    error: function(response) {
                        console.log(response);
                        toastr.error(response.responseJSON.message)
                    }
                });

            })
        });
    </script>
@endpush
