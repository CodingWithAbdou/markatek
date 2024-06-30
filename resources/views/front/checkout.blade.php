@extends('front.layouts.app')

@section('title')
    {{ __('front.finsh_order') }}
@endsection

@if (getLocale() == 'ar')
    @push('style')
        <style>
            [dir=rtl] .iti--allow-dropdown .iti__country-container {
                right: auto;
                left: 0;
            }

            .iti__selected-country {
                flex-direction: row-reverse
            }

            .iti--inline-dropdown .iti__dropdown-content {
                left: 0;
            }

            [dir=rtl] .iti--allow-dropdown input.iti__tel-input,
            [dir=rtl] .iti--allow-dropdown input.iti__tel-input[type=text],
            [dir=rtl] .iti--allow-dropdown input.iti__tel-input[type=tel] {
                padding-right: 1rem !important;
                padding-left: 94px;
                border-radius: 6px
            }

            .iti__selected-dial-code {
                direction: ltr;
            }
        </style>
    @endpush
@endif


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
                                    <option value="{{ __('front.Kuwait') }}" selected>{{ __('front.Kuwait') }} </option>
                                </select>
                            </div>

                            <div class="">
                                <label for="phone" class="label_desgin"> {{ __('front.phone_number') }} <span
                                        class="text-primary font-bold">*</span>
                                </label>
                                <input type="tel" id="phone" name="phone"
                                    class="input_desgin pl-16 rounded-tr-none rounded-br-none ltr:rounded-tl-none ltr:rounded-bl-none " />
                            </div>


                            <div>
                                <label for="your_name" class="label_desgin">
                                    {{ __('front.name') }} <span class="text-primary font-bold">*</span></label>
                                <input type="text" id="your_name" name="name" class="input_desgin"
                                    placeholder=" {{ __('front.enter_you_name') }} " />
                            </div>

                            <div class="">
                                <label for="your_email" class="label_desgin ">
                                    {{ __('front.email') }} <span class="text-primary font-bold"></span>
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
                                    <option value="{{ __('front.shoos_place') }}" disabled selected>
                                        {{ __('front.shoos_place') }}</option>
                                    @foreach ($places as $place)
                                        <option value="{{ $place->id }}">
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
                                    {{ __('front.avenue') }} <span class="text-primary font-bold"></span></label>
                                <input type="text" id="your_avenue" name="avenue" class="input_desgin"
                                    placeholder=" {{ __('front.avenue_example') }}" />
                            </div>

                            <div>
                                <label for="your_house_number" class="label_desgin">
                                    {{ __('front.number_house') }}<span class="text-primary font-bold">*</span></label>
                                <input type="text" id="your_house_number" name="house_number" class="input_desgin"
                                    placeholder=" {{ __('front.enter_number_house') }}" />
                            </div>

                            <div></div>

                            <div>
                                <label for="message" class="label_desgin"> {{ __('front.note') }} <span
                                        class="text-primary font-bold"></span></label>
                                <textarea id="message" rows="4" name="note" class="input_desgin resize-none h-fit block p-4"
                                    placeholder=" {{ __('front.enter_note') }}..."></textarea>
                            </div>
                            <div></div>


                            <div id="coupon-content">
                                <input type="hidden" name="coupon_applay" value="0" id="coupon-applay">
                                {{-- <label for="your_coupon" class="label_desgin"> {{ __('front.active_you_coupon') }}<span
                                        class="text-primary font-bold"></span>
                                </label> --}}
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
                                <dd class="text-base font-medium  text-neutral-600 ">
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
                                <dd class="text-base font-medium  text-neutral-600 ">
                                    <span id="coupon-cost">0</span>
                                    <span class="text-sm"> {{ __('front.kwd') }}</span>
                                </dd>
                            </dl>


                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-bold text-neutral-800"> {{ __('front.total') }}
                                </dt>
                                <dd class="text-base font-bold  text-neutral-600 ">
                                    <span id="total-cost">0</span> <span class="text-sm">
                                        {{ __('front.kwd') }}</span>
                                </dd>
                            </dl>

                            <div class="py-8">
                                <div class="relative z-50">
                                    <input class="peer hidden" id="radio_2" value='knet' type="radio"
                                        name="payment_method" checked />
                                    <span
                                        class=" peer-checked:border-primary absolute -z-10 right-4 rtl:right-auto rtl:left-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
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
                                <div class="relative mt-2 z-50">
                                    <input class="peer hidden" value="credit_card" id="radio_1" type="radio"
                                        name="payment_method" />
                                    <span
                                        class=" peer-checked:border-primary absolute -z-10 right-4 rtl:right-auto rtl:left-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                                    <label
                                        class=" peer-checked:border peer-checked:border-primary flex items-center cursor-pointer select-none rounded-lg border border-gray-300 p-4"
                                        for="radio_1">
                                        <img class="w-14 object-contain" src="{{ asset('assets/images/pngegg.png') }}"
                                            alt="" />
                                        <div class="ms-5">
                                            <p class="text-slate-500 text-sm leading-6">
                                                {{ __('front.visa_and_mastercard') }}</p>
                                        </div>
                                    </label>
                                </div>

                            </div>

                        </div>
                        <div class="flex items-center gap-0 mb-4 text-xs">
                            <input id="default-checkbox" type="checkbox" value="1" name="terms"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2  font-medium text-neutral-800 bg-white">
                                {{ __('front.accept_all_terms') }}
                                <a class="text-primary underline mx-1" href="{{ route('terms.index') }}">
                                    {{ __('front.link_terms') }} </a>
                                {{ __('front.after_complete_order') }}
                            </label>
                        </div>

                        <button id="btn-checkout"
                            class="flex mt-12 items-center w-full justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-primary focus:outline-none focus:ring-4 focus:ring-indbg-primary dark:bg-primary dark:hover:bg-primary dark:focus:ring-indbg-primary">{{ __('front.countinue_pay') }}
                        </button>

                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
@push('script')
    <script>
        const input = document.querySelector("#phone");
        window.intlTelInput(input, {
            separateDialCode: true,
            initialCountry: "kw",
            onlyCountries: ['kw', 'sa', 'bh', 'ae', 'om', 'qa'],
            hiddenInput: () => ({
                phone: "full_phone",
            }),
            i18n: {
                kw: "{{ __('front.kw') }}",
                sa: "{{ __('front.sa') }}",
                bh: "{{ __('front.bh') }}",
                ae: "{{ __('front.ae') }}",
                om: "{{ __('front.om') }}",
                qa: "{{ __('front.qa') }}",
            },
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.1.0/build/js/utils.js" // just for formatting/placeholders etc
        });
        $(document).ready(function() {
            $('#checkout-form').on('submit', function(e) {
                e.preventDefault();
                $('#btn-checkout').attr('disabled', 'disabled');
                toastr.info("{{ __('front.request_processing') }}");
                HideValidationError($('#checkout-form'))
                let data = new FormData(this)
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
            if (!data.place) return
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
