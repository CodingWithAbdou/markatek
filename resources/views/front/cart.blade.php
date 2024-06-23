@extends('front.layouts.app')

@section('title')
    {{ __('front.cart') }}
@endsection


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
            <div class="" id="cart_section">
                <div class=" justify-center px-6 md:flex md:gap-6 xl:px-0">
                    <div id="items" class="rounded-lg md:w-2/3">
                        @include('front.products_cart')
                    </div>
                    <!-- Sub total -->

                    <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                        <div class="mb-2 flex justify-between">
                            <p class="text-gray-700">{{ __('front.sub_cost') }}</p>
                            <p class="text-gray-700"><span id="global">{{ $global }}</span> <span
                                    class="text-sm">{{ __('front.kwd') }}</span>
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
            $('.asc_product').on('click', ascProduct);
            $('.desc_product').on('click', descProduct);


            function changeCart(data, input, value, method, btn, show_toast = true) {
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
                            toastr.success("{{ __('front.add_to_cart') }}");
                        } else if (response.msg == 'not_enough') {
                            toastr.error("{{ __('front.not_enough') }}")
                        } else {
                            if (method == 'asc') {
                                toastr.success("{{ __('front.update_cart') }}");
                                input.val(value + 1);
                                $('#global').text(parseInt($('#global').text()) + +response.price);
                                btn.removeAttr('disabled');
                            } else {
                                if (parseInt($('#global').text()) - +response.price == 0) {
                                    $('#cart_section').remove()
                                    location.reload();
                                } else {
                                    if (show_toast) {
                                        toastr.success("{{ __('front.update_cart') }}");
                                    }
                                    $('#global').text(parseInt($('#global').text()) - +response.price);
                                    input.val(value - 1);
                                    btn.removeAttr('disabled');
                                }

                            }
                        }
                    },
                    error: function(response) {
                        toastr.error("{{ __('front.error_message') }}");
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
                            toastr.success("{{ __('front.delete_cart') }}");
                            $('.asc_product').off('click');
                            $('.desc_product').off('click');
                            $('.asc_product').on('click', ascProduct);
                            $('.desc_product').on('click', descProduct);
                        }
                    },
                    error: function(response) {
                        toastr.error("{{ __('front.error_message') }}");
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
                $(this).prop('disabled', true);
                let data = {
                    product: $(this).parent().parent().find('[name="product"]').val(),
                    quantity: quantity,
                };
                changeCart(data, input, value, 'asc', $(this));
            }

            function descProduct() {
                let input = $(this).parent().find('.count_product');
                let value = parseInt(input.val());
                let quantity = value - 1;
                $(this).prop('disabled', true);
                let show_toast = true
                if (value <= 1) {
                    removeCart($(this).parent().parent().find('[name="product"]').val());
                    show_toast = false
                }
                let data = {
                    product: $(this).parent().parent().find('[name="product"]').val(),
                    quantity: quantity,
                };
                changeCart(data, input, value, 'desc', $(this), show_toast);
            }
        });
    </script>
@endpush
