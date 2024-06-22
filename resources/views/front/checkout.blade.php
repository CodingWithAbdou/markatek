@extends('front.layouts.app')



@section('content')
    <section class="py-16" style="background: url('{{ asset('assets/images/head-bg.png') }}')">
        <div class="flex items-center justify-center flex-col  text-neutral-800 mx-auto relative ">
            <h2 class=" text-5xl font-bold text-neutral-700"> <span>{{ __('front.finsh_order') }}</h2>
            <div class="pt-8">
                <a class="hover:text-primary" href="{{ route('main') }}">{{ __('front.home') }}</a>
                /
                <a class="hover:text-primary" href="{{ route('cart.index') }}">{{ __('front.cart') }}</a>
                /
                <span>{{ __('front.finsh_order') }}</span>
            </div>
        </div>
    </section>
    <section class="pb-8  dark:bg-gray-900 ">
        <form id="checkout-form" action="{{ route('checkout.store') }}" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class=" lg:flex lg:items-start lg:gap-12 xl:gap-16 bg-white  p-12  border shadow-md rounded-xl ">
                <div class="min-w-0 flex-1 space-y-8">
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                            <div>
                                <div class="">
                                    <label for="select-country-input-3" class="label_desgin">
                                        {{ __('front.country') }} <span class="text-primary font-bold">*</span> </label>
                                </div>
                                <select id="select-country-input-3" name="country" class="select_design">
                                    <option value="{{ __('front.country') }}" selected>{{ __('front.Kuwait') }} </option>
                                </select>
                            </div>

                            <div>
                                <label for="phone-input" class="label_desgin"> {{ __('front.phone_number') }} <span
                                        class="text-primary font-bold">*</span>
                                </label>
                                <div class="flex items-center">
                                    <button id="dropdown-phone-button-3"
                                        class="z-10 inline-flex shrink-0 items-center rounded-s-lg border border-gray-300 bg-gray-100 px-4 py-2.5 text-center text-sm font-medium text-gray-900 hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700"
                                        type="button">
                                        <span class="me-2 mt-[1px] -mb-[1px] text-xs">+ 966</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 32 32">
                                            <path fill="#fff" d="M1 11H31V21H1z"></path>
                                            <path d="M5,4H27c2.208,0,4,1.792,4,4v4H1v-4c0-2.208,1.792-4,4-4Z"
                                                fill="#357942"></path>
                                            <path d="M5,20H27c2.208,0,4,1.792,4,4v4H1v-4c0-2.208,1.792-4,4-4Z"
                                                transform="rotate(180 16 24)" fill="#be2a2c"></path>
                                            <path
                                                d="M11,12L2.316,5.053c-.803,.732-1.316,1.776-1.316,2.947V24c0,1.172,.513,2.216,1.316,2.947l8.684-6.947V12Z">
                                            </path>
                                            <path
                                                d="M27,4H5c-2.209,0-4,1.791-4,4V24c0,2.209,1.791,4,4,4H27c2.209,0,4-1.791,4-4V8c0-2.209-1.791-4-4-4Zm3,20c0,1.654-1.346,3-3,3H5c-1.654,0-3-1.346-3-3V8c0-1.654,1.346-3,3-3H27c1.654,0,3,1.346,3,3V24Z"
                                                opacity=".15"></path>
                                            <path
                                                d="M27,5H5c-1.657,0-3,1.343-3,3v1c0-1.657,1.343-3,3-3H27c1.657,0,3,1.343,3,3v-1c0-1.657-1.343-3-3-3Z"
                                                fill="#fff" opacity=".2"></path>
                                        </svg>
                                    </button>

                                    <div class="relative w-full">
                                        <input type="text" id="phone-input" name="phone"
                                            class="input_desgin pl-16 rounded-tr-none rounded-br-none ltr:rounded-tl-none ltr:rounded-bl-none "
                                            placeholder="123-456-7890" />
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <label for="your_email" class="label_desgin ">
                                    {{ __('front.email') }} <span class="text-primary font-bold">*</span>
                                </label>
                                <input type="email" id="your_email" name="email" class="input_desgin"
                                    placeholder="test@test.com" />
                            </div>

                            <div>
                                <div class="">
                                    <label for="place" class="label_desgin">
                                        {{ __('front.place') }} <span class="text-primary font-bold">*</span> </label>
                                </div>
                                <select id="place" name="place_id" class="select_design" id="place">
                                    @foreach ($places as $place)
                                        <option value="{{ $place->id }}" {{ $loop->index == 0 ? 'selected' : '' }}>
                                            {{ $place->{'name_' . getLocale()} }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="your_peice" class="label_desgin">
                                    {{ __('front.piece') }} <span class="text-primary font-bold">*</span></label>
                                <input type="text" id="your_peice" name="piece" class="input_desgin"
                                    placeholder=" {{ __('front.enter_number_piece') }} " />
                            </div>

                            <div>
                                <label for="your_street" class="label_desgin">
                                    {{ __('front.street') }} <span class="text-primary font-bold">*</span></label>
                                <input type="text" id="your_street" name="street" class="input_desgin"
                                    placeholder=" {{ __('front.enter_street') }}" />
                            </div>

                            <div>
                                <label for="your_avenue" class="label_desgin">
                                    {{ __('front.avenue') }} <span class="text-primary font-bold">*</span></label>
                                <input type="text" id="your_avenue" name="avenue" class="input_desgin"
                                    placeholder=" {{ __('front.avenue_example') }}" />
                            </div>

                            <div>
                                <label for="your_house_number" class="label_desgin">
                                    {{ __('front.number_house') }}<span class="text-primary font-bold">*</span></label>
                                <input type="text" id="your_house_number" name="house_number" class="input_desgin"
                                    placeholder=" {{ __('front.enter_number_house') }}" />
                            </div>

                            <div>
                                <label for="message" class="label_desgin"> {{ __('front.note') }} <span
                                        class="text-primary font-bold">*</span></label>
                                <textarea id="message" rows="4" name="note" class="input_desgin resize-none h-fit block p-4"
                                    placeholder=" {{ __('front.enter_note') }}..."></textarea>
                            </div>

                            <div></div>

                            <div id="coupon-content">
                                <input type="hidden" name="coupon_applay" value="0" id="coupon-applay">
                                <label for="your_coupon" class="label_desgin"> {{ __('front.active_you_coupon') }}<span
                                        class="text-primary font-bold">*</span>
                                </label>
                                <div class="flex max-w-md items-center gap-4">
                                    <input id="coupon_value" type="text" id="your_coupon" name="coupon"
                                        class="input_desgin" placeholder=" {{ __('front.enter_promo_code') }}" />
                                    <button type="button" id="btn-apply"
                                        class="flex items-center justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-primary focus:outline-none focus:ring-4 focus:ring-indbg-primary dark:bg-primary dark:hover:bg-primary dark:focus:ring-indbg-primary">{{ __('front.applay') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
                    <div class="flow-root">
                        <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-neutral-600 "> {{ __('front.sub_total') }}</dt>
                                <dd class="text-base font-medium  text-neutral-600 dark:text-white">
                                    {{ $sub_total }} {{ __('front.kwd') }}</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-neutral-600 "> {{ __('front.delivery_price') }}</dt>
                                <dd class="text-base font-medium  text-neutral-600 ">
                                    <span id="delivery-price"> 0</span>
                                    <span> {{ __('front.kwd') }}</span>
                                </dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-neutral-600 "> {{ __('front.code_discount') }}</dt>
                                <dd class="text-base font-medium  text-neutral-600 dark:text-white"> <span
                                        id="coupon-cost">0</span>
                                    <span class="text-sm"> {{ __('front.kwd') }}</span>
                                </dd>
                            </dl>


                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-bold text-neutral-800"> {{ __('front.total') }}
                                </dt>
                                <dd class="text-base font-bold  text-neutral-600 dark:text-white">
                                    <span id="total-cost"> {{ $total }} </span> <span class="text-sm">
                                        {{ __('front.kwd') }}</span>
                                </dd>
                            </dl>

                            <div class="py-8">
                                <div class="relative mb-2">
                                    <input class="peer hidden" value="credit_card" id="radio_1" type="radio"
                                        name="payment_method" checked />
                                    <span
                                        class=" peer-checked:border-primary absolute right-4 rtl:right-auto rtl:left-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                                    <label
                                        class=" peer-checked:border peer-checked:border-primary flex items-center cursor-pointer select-none rounded-lg border border-gray-300 p-4"
                                        for="radio_1">
                                        <img class="w-14 object-contain"
                                            src="{{ asset('assets/images/mastercard.png') }}" alt="" />
                                        <div class="ms-5">
                                            <p class="text-slate-500 text-sm leading-6">
                                                {{ __('front.visa_and_mastercard') }}</p>
                                        </div>
                                    </label>
                                </div>
                                <div class="relative">
                                    <input class="peer hidden" id="radio_2" value='knet' type="radio"
                                        name="payment_method" />
                                    <span
                                        class=" peer-checked:border-primary absolute right-4 rtl:right-auto rtl:left-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                                    <label
                                        class=" peer-checked:border peer-checked:border-primary  flex items-center cursor-pointer select-none rounded-lg border border-gray-300 p-4"
                                        for="radio_2">
                                        <img class="w-14 object-contain" src="{{ asset('assets/images/keynet.png') }}"
                                            alt="" />
                                        <div class="ml-5">
                                            <p class="text-slate-500 text-sm leading-6">{{ __('front.knet') }}</p>
                                        </div>
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value="1" name="terms"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('front.accept_all_terms') }}</label>
                        </div>

                        <button id="btn-checkout"
                            class="flex mt-12 items-center w-full justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-primary focus:outline-none focus:ring-4 focus:ring-indbg-primary dark:bg-primary dark:hover:bg-primary dark:focus:ring-indbg-primary">{{ __('front.pay') }}
                        </button>

                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#checkout-form').on('submit', function(e) {
                e.preventDefault();
                $('#btn-checkout').attr('disabled', 'disabled');
                toastr.info("{{ __('front.request_processing') }}");
                HideValidationError($('#checkout-form'))
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ route('checkout.store') }}",
                    processData: false,
                    contentType: false,
                    cache: false,

                    data: new FormData(this),
                    success: function(response) {
                        if (response.msg == 'change_url') {
                            window.location.href = response.url;
                        }
                    },
                    error: function(response) {
                        $('#btn-checkout').removeAttr('disabled');

                        let array = []
                        let form = $('#checkout-form')
                        $.each(response.responseJSON.errors, function(i, value) {
                            let index = i.split('.')[0];
                            showValidationError(form, index, value);
                        });
                        toastr.error("{{ __('front.there_are_errors') }}");
                    }
                });
            })
            $('#btn-apply').on('click', function(e) {
                let data = {
                    coupon: $('#coupon_value').val()
                }
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ route('coupon.apply') }}",
                    data: data,
                    success: function(response) {
                        if (response.msg == 'coupon_applied') {
                            toastr.success(
                                `{{ __('front.we_cut') }} ${response.discount}   {{ __('front.kwd') }} {{ __('front.succesfully') }}`
                            );
                            $('#coupon_value').attr('readonly', '');
                            $('#btn-apply').attr('disabled', 'disabled');
                            $('#coupon-applay').val(1);
                        } else {
                            toastr.error("{{ __('front.coupon_not_found') }}");
                        }
                        $("#coupon-cost").html(response.discount);
                        freshTotal($('#delivery-price').html())
                    },
                    error: function(response) {
                        toastr.error(response.responseJSON.message);
                    }
                });
            })


            $('#place').on('change', function(e) {
                let data = {
                    place: $('#place').val()
                }
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ route('place.change') }}",
                    data: data,
                    success: function(response) {
                        toastr.success(
                            `{{ __('front.price_delivery') }} ${response.name_place} {{ __('front.it_is') }} ${response.delivery_price} {{ __('front.kwd') }} `
                        );
                        $('#delivery-price').html(response.delivery_price);
                        freshTotal(response.delivery_price)
                    },
                    error: function(response) {
                        toastr.error(response.responseJSON.message);
                    }
                });
            })
        });


        function showValidationError(form, index, value) {
            form.find("input[name='" + index + "'][type=file]").parents('.error-here').append(
                '<div class="block text-xs text-red-600 invalid-feedback">' + value + '</div');
            form.find("input[name='" + index + "'][type!=file]").parent().append(
                '<div class="block text-xs text-red-600 invalid-feedback">' + value + '</div');
            form.find("select[name='" + index + "']").parent().append(
                '<div class="block text-xs text-red-600 invalid-feedback">' + value +
                '</div');
            form.find("textarea[name='" + index + "']").parent().append(
                '<div class="block text-xs text-red-600 invalid-feedback">' + value +
                '</div');
            form.find("input[name='" + index + "[]'][type=file]").parents('.error-here').append(
                '<div class="block text-xs text-red-600 invalid-feedback">' + value + '</div');
            form.find("input[name='" + index + "[]'][type!=file]").parent().append(
                '<div class="block text-xs text-red-600 invalid-feedback">' + value + '</div');
            form.find("select[name='" + index + "[]']").parent().append(
                '<div class="block text-xs text-red-600 invalid-feedback">' + value +
                '</div');
            form.find("textarea[name='" + index + "[]']").parent().append(
                '<div class="block text-xs text-red-600 invalid-feedback">' +
                value + '</div');
        }

        function HideValidationError(form) {
            form.find('.invalid-feedback').remove();
        }

        function getPlaceDelivery() {
            let data = {
                place: $('#place').val()
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('place.get') }}",
                data: data,
                success: function(response) {
                    freshTotal(response.delivery_price)
                    $('#delivery-price').html(response.delivery_price);
                },
                error: function(response) {
                    $('#delivery-price').html(0);
                    toastr.error(response.responseJSON.message);
                }
            });
        }

        function freshTotal(delivery_pricee) {
            let total = 0;
            let sub_total = {{ $sub_total }};
            let delivery_price = +delivery_pricee;
            let coupon = $('#coupon-cost').html();
            total = sub_total + delivery_price - coupon;
            $('#total-cost').html(total);
        }
        $(window).on('pageshow', function(event) {
            getPlaceDelivery()
        });
    </script>
@endpush
