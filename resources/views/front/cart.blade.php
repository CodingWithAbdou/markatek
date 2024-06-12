@extends('front.layouts.app')



@section('content')
    <section class="py-12 max-w-full mx-auto px-4 md:px-12">
        <div class="h-screen  pt-20">
            <h1 class="mb-10 text-center text-2xl font-bold">عربة التسوق</h1>
            <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:gap-6 xl:px-0">
                <div class="rounded-lg md:w-2/3">
                    @php
                        $global = 0;
                    @endphp
                    @foreach ($items as $id => $item)
                        @php
                            $global += $item['price'] * $item['quantity'];
                        @endphp
                        <div
                            class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex  sm:gap-6 sm:justify-start">
                            <img src="{{ asset($item['image']) }}" alt="product-image"
                                class="w-40 h-40 object-cover rounded-lg sm:w-40" />
                            <div class="relative sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                <div class="mt-5 sm:mt-0 flex items-start justify-between flex-col py-6">
                                    <h2 class="text-lg font-bold text-gray-900">{{ $item['name'] }}</h2>
                                    <p class="mt-1 text-xs text-gray-700">{{ $item['description'] }}</p>
                                    <p class="mt-1 text-xs text-gray-700">{{ $item['price'] }}</p>
                                </div>
                                <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                    <input type="hidden" name="product" value="{{ $item['id'] }}">
                                    <div class="flex items-center border-gray-100">
                                        <span
                                            class="desc_product cursor-pointer rounded-r  py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                            - </span>
                                        <input
                                            class="count_product h-8 w-8 border  bg-white text-center text-xs outline-none"
                                            type="number" value="{{ $item['quantity'] }}" min="1" disabled />
                                        <span
                                            class="asc_product cursor-pointer rounded-l  py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                            + </span>
                                    </div>

                                </div>
                                <form id="delete-cart">
                                    <button class="absolute flex items-center text-sm text-red-500 gap-1 bottom-0 left-1">
                                        حذف
                                        <i class='bx bx-folder-minus text-red-500'></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Sub total -->

                <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                    <div class="mb-2 flex justify-between">
                        <p class="text-gray-700">مجموع المنتجات</p>
                        <p id="global" class="text-gray-700">{{ $global }}</p>
                    </div>

                    <hr class="my-4" />

                    <button
                        class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">إكمال
                        الطلب</button>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script></script>
    <script>
        $('.desc_product').on('click', async function() {
            let input = $(this).parent().find('.count_product')
            let value = parseInt(input.val())
            let quantity = +input.val() - 1;

            if (value > 1) {
                let data = {
                    product: $(this).parent().parent().find('[name="product"]').val(),
                    quantity: quantity,
                }
                changeCart(data, input, value, 'desc')
            }
        })

        $('.asc_product').on('click', function() {
            let input = $(this).parent().find('.count_product')
            let value = parseInt(input.val())
            let quantity = +input.val() + 1;
            let data = {
                product: $(this).parent().parent().find('[name="product"]').val(),
                quantity: quantity,
            }
            changeCart(data, input, value, 'asc')
        })

        function changeCart(data, input, value, method) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('cart.store') }}",
                data: data,
                success: function(response) {
                    if (response.msg == 'set_number') {
                        setBadge(response.cart_items)
                        toastr.success('تمت الإضافة المنتج الي السلة')
                    } else {
                        toastr.success('تمت تحديث عدد المنتجات ')
                        if (method == 'asc') {
                            input.val(value + 1)
                            $('#global').text(parseInt($('#global').text()) + +response.price)
                        } else {
                            $('#global').text(parseInt($('#global').text()) - +response.price)
                            input.val(value - 1)
                        }
                    }
                },
                error: function(response) {
                    toastr.error('حدث خطأ ما')
                }
            });
        }

        $('#delete-cart').on('submit', function(e) {
            e.preventDefault();
            let data = {
                product: $(this).parent().find('[name="product"]').val(),
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('cart.destroy') }}",
                data: data,
                success: function(response) {
                    if (response.msg == 'delete') {
                        setBadge(response.cart_items)
                        toastr.success('تمت الحذف من السلة')
                    }
                },
                error: function(response) {
                    toastr.error('حدث خطأ ما')
                }
            });

        })

        function setBadge(count) {
            $('#badge-cart').text(count)
            $('#badge-cart').removeClass('hidden')
            $('#badge-cart').addClass('flex')
        }
    </script>
@endpush
