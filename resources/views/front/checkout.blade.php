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
                                    <option value="KW" selected>{{ __('front.Kuwait') }} </option>
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
                                        <svg fill="none" aria-hidden="true" class="me-2 h-4 w-4" viewBox="0 0 20 15">
                                            <rect width="19.6" height="14" y=".5" fill="#fff" rx="2" />
                                            <mask id="a" style="mask-type:luminance" width="20" height="15"
                                                x="0" y="0" maskUnits="userSpaceOnUse">
                                                <rect width="19.6" height="14" y=".5" fill="#fff" rx="2" />
                                            </mask>
                                            <g mask="url(#a)">
                                                <path fill="#D02F44" fill-rule="evenodd"
                                                    d="M19.6.5H0v.933h19.6V.5zm0 1.867H0V3.3h19.6v-.933zM0 4.233h19.6v.934H0v-.934zM19.6 6.1H0v.933h19.6V6.1zM0 7.967h19.6V8.9H0v-.933zm19.6 1.866H0v.934h19.6v-.934zM0 11.7h19.6v.933H0V11.7zm19.6 1.867H0v.933h19.6v-.933z"
                                                    clip-rule="evenodd" />
                                                <path fill="#46467F" d="M0 .5h8.4v6.533H0z" />
                                                <g filter="url(#filter0_d_343_121520)">
                                                    <path fill="url(#paint0_linear_343_121520)" fill-rule="evenodd"
                                                        d="M1.867 1.9a.467.467 0 11-.934 0 .467.467 0 01.934 0zm1.866 0a.467.467 0 11-.933 0 .467.467 0 01.933 0zm1.4.467a.467.467 0 100-.934.467.467 0 000 .934zM7.467 1.9a.467.467 0 11-.934 0 .467.467 0 01.934 0zM2.333 3.3a.467.467 0 100-.933.467.467 0 000 .933zm2.334-.467a.467.467 0 11-.934 0 .467.467 0 01.934 0zm1.4.467a.467.467 0 100-.933.467.467 0 000 .933zm1.4.467a.467.467 0 11-.934 0 .467.467 0 01.934 0zm-2.334.466a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.466a.467.467 0 11-.933 0 .467.467 0 01.933 0zM1.4 4.233a.467.467 0 100-.933.467.467 0 000 .933zm1.4.467a.467.467 0 11-.933 0 .467.467 0 01.933 0zm1.4.467a.467.467 0 100-.934.467.467 0 000 .934zM6.533 4.7a.467.467 0 11-.933 0 .467.467 0 01.933 0zM7 6.1a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.467a.467.467 0 11-.933 0 .467.467 0 01.933 0zM3.267 6.1a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.467a.467.467 0 11-.934 0 .467.467 0 01.934 0z"
                                                        clip-rule="evenodd" />
                                                </g>
                                            </g>
                                            <defs>
                                                <linearGradient id="paint0_linear_343_121520" x1=".933" x2=".933"
                                                    y1="1.433" y2="6.1" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#fff" />
                                                    <stop offset="1" stop-color="#F0F0F0" />
                                                </linearGradient>
                                                <filter id="filter0_d_343_121520" width="6.533" height="5.667" x=".933"
                                                    y="1.433" color-interpolation-filters="sRGB"
                                                    filterUnits="userSpaceOnUse">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                    <feColorMatrix in="SourceAlpha" result="hardAlpha"
                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                                    <feOffset dy="1" />
                                                    <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0" />
                                                    <feBlend in2="BackgroundImageFix"
                                                        result="effect1_dropShadow_343_121520" />
                                                    <feBlend in="SourceGraphic" in2="effect1_dropShadow_343_121520"
                                                        result="shape" />
                                                </filter>
                                            </defs>
                                        </svg>
                                        +966
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
                                    <label for="select-city-input-3" class="label_desgin">
                                        {{ __('front.place') }} <span class="text-primary font-bold">*</span> </label>
                                </div>
                                <select id="select-city-input-3" name="place_id" class="select_design">
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
                                    {{ $places->first()->delivery_price ?? 0 }}
                                    {{ __('front.kwd') }}</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-neutral-600 "> {{ __('front.code_discount') }}</dt>
                                <dd id="coupon-cost" class="text-base font-medium  text-neutral-600 dark:text-white">0
                                    <span class="text-sm"> {{ __('front.kwd') }}</span>
                                </dd>
                            </dl>


                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-bold text-neutral-800"> {{ __('front.total') }}
                                </dt>
                                <dd id="total-cost" class="text-base font-bold  text-neutral-600 dark:text-white">
                                    {{ $total }} <span class="text-sm"> {{ __('front.kwd') }}</span>
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
                                        name="payment_method" checked />
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

                        <button
                            class="flex mt-12 items-center w-full justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-primary focus:outline-none focus:ring-4 focus:ring-indbg-primary dark:bg-primary dark:hover:bg-primary dark:focus:ring-indbg-primary">{{ __('front.pay') }}
                        </button>

                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
@push('script')
    <x-js.form />
    <script>
        $(document).ready(function() {
            $('#checkout-form').on('submit', function(e) {
                e.preventDefault();
                toastr.info('تتم معالجة الطلب');

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
                        let array = []
                        let form = $('#checkout-form')
                        $.each(response.responseJSON.errors, function(i, value) {
                            let index = i.split('.')[0];
                            showValidationError(form, index, value);
                        });

                        // toastr.error('حدث خطأ ما');
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
                            toastr.success(`تم خصم ${response.discount} بنجاح`);
                            $('#coupon_value').attr('readonly', '');
                            $('#btn-apply').attr('disabled', 'disabled');
                        } else {
                            toastr.error('الكوبون غير صالح');
                        }
                        $("#coupon-cost").html(response.discount);
                        freshTotal({{ $places->first()->delivery_price }})
                    },
                    error: function(response) {
                        toastr.success(`تم خصم ${response.discount}% بنجاح`);
                    }
                });
            })

            function freshTotal(delivery_pricee) {
                let total = 0;
                let sub_total = {{ $sub_total }};
                let delivery_price = delivery_pricee;
                let coupon = $('#coupon-cost').html();
                total = sub_total + delivery_price - coupon;
                $('#total-cost').html(total);
            }
        });
    </script>
@endpush
