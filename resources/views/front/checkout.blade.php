@extends('front.layouts.app')



@section('content')
    <section class="py-16" style="background: url('{{ asset('assets/images/head-bg.png') }}')">
        <div class="flex items-center justify-center flex-col  text-neutral-800 mx-auto relative ">
            <h2 class=" text-5xl font-bold text-neutral-700"> <span>تكملة الطلب</h2>
            <div class="pt-8">
                <a class="hover:text-primary" href="{{ route('main') }}">الرئسية</a>
                /
                <a class="hover:text-primary" href="{{ route('cart.index') }}">العربة</a>
                /
                <span>تكملة الطلب</span>
            </div>
        </div>
    </section>
    <section class="pb-8  dark:bg-gray-900 ">
        <form id="checkout-form" action="{{ route('checkout.store') }}" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class=" lg:flex lg:items-start lg:gap-12 xl:gap-16 bg-white  p-12  border shadow-md rounded-xl">
                <div class="min-w-0 flex-1 space-y-8">
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                            <div>
                                <div class="mb-2 flex items-center gap-2">
                                    <label for="select-country-input-3"
                                        class="block text-sm font-medium text-gray-900 dark:text-white"> الدولة * </label>
                                </div>
                                <select id="select-country-input-3" name="country"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                                    <option value="KW" selected>الكويت </option>
                                    <option value="SA">السعودية</option>
                                </select>
                            </div>

                            <div>
                                <label for="phone-input-3"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> رقم الهاتف*
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
                                            class="z-20 block w-full rounded-e-lg border border-s-0 border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:border-s-gray-700  dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500"
                                            placeholder="123-456-7890" />
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="your_email"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> الإيميل*
                                </label>
                                <input type="email" id="your_email" name="email"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50  p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="name@flowbite.com" />
                            </div>

                            <div>
                                <div class="mb-2 flex items-center gap-2">
                                    <label for="select-city-input-3"
                                        class="block text-sm font-medium text-gray-900 dark:text-white"> المنطقة* </label>
                                </div>
                                <select id="select-city-input-3" name="place_id"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 h-12 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                                    @foreach ($places as $place)
                                        <option value="{{ $place->id }}" {{ $loop->index == 0 ? 'selected' : '' }}>
                                            {{ $place->{'name_' . getLocale()} }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="your_name"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                    قطعة </label>
                                <input type="text" id="your_name" name="piece"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="أدخل إسم القطعة" />
                            </div>

                            <div>
                                <label for="your_name"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                    الشارع </label>
                                <input type="text" id="your_name" name="street"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="أدخل إسم الشارع" />
                            </div>


                            <div>
                                <label for="your_name"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                    جادة </label>
                                <input type="text" id="your_name" name="avenue"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="Bonnie Green" />
                            </div>

                            <div>
                                <label for="your_name"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                    رقم المنزل </label>
                                <input type="text" id="your_name" name="house_number"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="أدخل رقم المنزل" />
                            </div>

                            <div>
                                <label for="message"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ملاحظة</label>
                                <textarea id="message" rows="4" name="note"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="أدخل ملاحظة..."></textarea>
                            </div>
                            <div></div>

                            <div id="coupon-content">
                                <label for="voucher"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> فعل الكوبون
                                </label>
                                <div class="flex max-w-md items-center gap-4">
                                    <input id="coupon_value" type="text" id="voucher" name="coupon"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                        placeholder="أدخل برومو كود" />
                                    <button type="button" id="btn-apply"
                                        class="flex items-center justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-primary focus:outline-none focus:ring-4 focus:ring-indbg-primary dark:bg-primary dark:hover:bg-primary dark:focus:ring-indbg-primary">تطبيق</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
                    <div class="flow-root">
                        <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">المجموع</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">{{ $sub_total }}</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">تكلفة التوصيل</dt>
                                <dd class="text-base font-medium text-red-500">{{ $places->first()->delivery_price }}</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">كود خصم</dt>
                                <dd id="coupon-cost" class="text-base font-medium text-green-500 dark:text-white">0</dd>
                            </dl>


                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">الإجمالي</dt>
                                <dd id="total-cost" class="text-base font-bold text-gray-900 dark:text-white">
                                    {{ $total }}
                                </dd>
                            </dl>

                            <div class="py-8">
                                <div class="flex items-center mb-4">
                                    <input id="default-radio-1" type="radio" value="knet" name="payment_method"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-radio-1"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">كي نت</label>
                                </div>
                                <div class="flex items-center">
                                    <input checked id="default-radio-2" type="radio" value="credit_card"
                                        name="payment_method"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-radio-2"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">فيزا / ماستر
                                        كارد</label>
                                </div>
                            </div>

                        </div>
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value="1" name="terms"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">أقر على الموافقة على
                                الشروط والاحكام</label>
                        </div>

                        <button
                            class="flex mt-12 items-center w-full justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-primary focus:outline-none focus:ring-4 focus:ring-indbg-primary dark:bg-primary dark:hover:bg-primary dark:focus:ring-indbg-primary">إتمام
                            الطلب</button>
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
                        // toastr.success('تمت عملية الشراء بنجاح');
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
