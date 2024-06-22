@extends('front.layouts.app')

@section('content')
    <section class="py-16" style="background: url('{{ asset('assets/images/head-bg.png') }}')">
        <div class="flex items-center justify-center flex-col  text-neutral-800 mx-auto relative ">
            <h2 class=" text-5xl font-bold text-neutral-700"> <span> {{ __('front.product_of') }} </span>
                {{ $category->{'name_' . getLocale()} }}
            </h2>
            <div class="pt-8">
                <a class="hover:text-primary" href="{{ route('main') }}">{{ __('front.home') }}</a>
                /
                <span>{{ __('front.products') }}</span>
            </div>
        </div>
    </section>
    <section class="max-w-screen-2xl mx-auto p-4 md:px-12 ">
        @if (App\Models\Setting::where('setting_key', 'dir_production')->first()->setting_value == '1')
            @include('front.production.row')
        @else
            @include('front.production.col')
        @endif
    </section>
@endsection
@push('script')
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
            console.log(quantity)
            let data = {
                product: $(this).parent().parent().find('[name="product"]').val(),
                quantity: quantity,
            }
            changeCart(data, input, value, 'asc')
        })

        $('.add-to-cart').on('submit', function(e) {
            e.preventDefault();
            let data = {
                product: $(this).find('[name="product"]').val(),
                quantity: $(this).find('[name="quantity"]').val(),

            }
            $(this).find('.btn_cart').attr('disabled', true)
            changeCart(data)
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
                        toastr.success("{{ __('front.add_to_cart') }}")
                    } else if (response.msg == 'not_enough') {
                        toastr.error("{{ __('front.not_enough') }}")
                    } else {
                        toastr.success("{{ __('front.update_cart') }}")
                        if (method == 'asc') {
                            input.val(value + 1)
                        } else {
                            input.val(value - 1)
                        }
                    }
                    showInput(data.product)
                },
                error: function(response) {
                    toastr.error("{{ __('front.error_message') }}")
                }
            });
        }

        function setBadge(count) {
            $('#badge-cart').text(count)
            $('#badge-cart').removeClass('hidden')
            $('#badge-cart').addClass('flex')
        }

        function showInput(index) {
            $(`#btn-${index}`).hide()
            $(`#input-${index}`).addClass('flex')
            $(`#input-${index}`).removeClass('hidden')
        }
    </script>
@endpush
