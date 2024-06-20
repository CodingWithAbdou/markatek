@extends('front.layouts.app')



@section('content')
    <section class="py-16" style="background: url('{{ asset('assets/images/head-bg.png') }}')">
        <div class="flex items-center justify-center flex-col  text-neutral-800 mx-auto relative ">
            <h2 class=" text-5xl font-bold text-neutral-700"> <span>{{ __('front.cart') }}</h2>
            <div class="pt-8">
                <a class="hover:text-primary" href="{{ route('main') }}">{{ __('front.home') }}</a>
                /
                <span>{{ __('front.cart') }}</span>
            </div>
        </div>
    </section>
    <section class="max-w-screen-2xl mx-auto px-4 md:px-12">
        @if (count($items) > 0)
            <div class="">
                <div class=" justify-center px-6 md:flex md:gap-6 xl:px-0">
                    <div id="items" class="rounded-lg md:w-2/3">
                        @include('front.products_cart')
                    </div>
                    <!-- Sub total -->

                    <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                        <div class="mb-2 flex justify-between">
                            <p class="text-gray-700">{{ __('front.sub_cost') }}</p>
                            <p id="global" class="text-gray-700">{{ $global }} <span>{{ __('front.kwd') }}</span>
                            </p>
                        </div>

                        <hr class="my-4" />
                        <a href="{{ route('checkout.index') }}"
                            class="block text-center  mt-6 w-full mx-auto text-white rounded-md bg-primary py-1.5 font-medium ">{{ __('front.next_page') }}</a>
                    </div>
                </div>
            </div>
        @else
            <div class="col-span-3 px-4 py-3 leading-normal text-primary border border-primary rounded-lg" role="alert">
                <p>{{ __('front.empty_cart') }}</p>
            </div>
        @endif
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
