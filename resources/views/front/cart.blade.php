@extends('front.layouts.app')



@section('content')
    <section class="py-12 max-w-full mx-auto px-4 md:px-12">
        <div class="h-screen  pt-20">
            <h1 class="mb-10 text-center text-2xl font-bold">عربة التسوق</h1>
            <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:gap-6 xl:px-0">
                <div id="items" class="rounded-lg md:w-2/3">
                    @include('front.products_cart')
                </div>
                <!-- Sub total -->

                <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                    <div class="mb-2 flex justify-between">
                        <p class="text-gray-700">مجموع المنتجات</p>
                        <p id="global" class="text-gray-700">{{ $global }}</p>
                    </div>

                    <hr class="my-4" />

                    <a href="#"
                        class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">إكمال
                        الطلب</a>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('.asc_product').on('click', function() {
                let input = $(this).parent().find('.count_product');
                let value = parseInt(input.val());
                let quantity = value + 1;
                let data = {
                    product: $(this).parent().parent().find('[name="product"]').val(),
                    quantity: quantity,
                };
                changeCart(data, input, value, 'asc');
            });

            $('.desc_product').on('click', async function() {
                let input = $(this).parent().find('.count_product');
                let value = parseInt(input.val());
                let quantity = value - 1;
                if (value > 1) {
                    let data = {
                        product: $(this).parent().parent().find('[name="product"]').val(),
                        quantity: quantity,
                    };
                    changeCart(data, input, value, 'desc');
                } else {
                    removeCart($(this).parent().parent().find('[name="product"]').val());
                }
            });

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
                            setBadge(response.cart_items);
                            toastr.success('تمت الإضافة المنتج الي السلة');
                        } else {
                            toastr.success('تمت تحديث عدد المنتجات ');
                            if (method == 'asc') {
                                input.val(value + 1);
                                $('#global').text(parseInt($('#global').text()) + +response.price);
                            } else {
                                $('#global').text(parseInt($('#global').text()) - +response.price);
                                input.val(value - 1);
                            }
                        }
                    },
                    error: function(response) {
                        toastr.error('حدث خطأ ما');
                    }
                });
            }

            function removeCart(product) {
                let data = {
                    product: product,
                };
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ route('cart.destroy') }}",
                    data: data,
                    success: function(response) {
                        if (response.msg == 'delete') {
                            setBadge(response.cart_items);
                            $('#items').html(response.view);
                            toastr.success('تمت الحذف من السلة');
                            $('.asc_product').off('click');
                            $('.desc_product').off('click');
                            $('.asc_product').on('click', ascProduct);
                            $('.desc_product').on('click', descProduct);
                        }
                    },
                    error: function(response) {
                        toastr.error('حدث خطأ ما');
                    }
                });
            }

            function setBadge(count) {
                $('#badge-cart').text(count);
                $('#badge-cart').removeClass('hidden');
                $('#badge-cart').addClass('flex');
            }

            function ascProduct() {
                let input = $(this).parent().find('.count_product');
                let value = parseInt(input.val());
                let quantity = value + 1;
                let data = {
                    product: $(this).parent().parent().find('[name="product"]').val(),
                    quantity: quantity,
                };
                changeCart(data, input, value, 'asc');
            }

            function descProduct() {
                let input = $(this).parent().find('.count_product');
                let value = parseInt(input.val());
                let quantity = value - 1;
                if (value > 1) {
                    let data = {
                        product: $(this).parent().parent().find('[name="product"]').val(),
                        quantity: quantity,
                    };
                    changeCart(data, input, value, 'desc');
                } else {
                    removeCart($(this).parent().parent().find('[name="product"]').val());
                }
            }
        });
    </script>
@endpush
