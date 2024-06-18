@extends('front.layouts.app')

@section('content')
    <section class="py-16" style="background: url('{{ asset('assets/images/head-bg.png') }}')">
        <div class="flex items-center justify-center flex-col  text-neutral-800 mx-auto relative ">
            <h2 class=" text-5xl font-bold text-neutral-700"> <span> منتجات </span> {{ $category->name }}</h2>
            <div class="pt-8">
                <a class="hover:text-primary" href="{{ route('main') }}">الرئسية</a>
                /
                <span>المنتجات</span>
            </div>
        </div>
    </section>
    <section class="max-w-screen-2xl mx-auto p-4 md:px-12 ">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3   gap-4 ">
            @forelse ($category->products as $product)
                <div
                    class="relative z-40 col-span-1 flex max-w-md overflow-hidden bg-white rounded-lg shadow-lg border border-neutral-200 ">
                    <div class="w-1/3 bg-cover bg-gray-300 border-l  border-neutral-200 ">
                        <img class="w-full h-full object-cover " src="{{ asset($product->cover_path) }}" width="400"
                            alt="">
                    </div>
                    <div class="w-2/3 p-4 md:p-4 flex flex-col justify-between">
                        <h1 class="text-xl font-bold text-nutueral-800 dark:text-white">{{ $product->name }}</h1>
                        <p class="mt-2 text-sm text-nutueral-400 dark:text-nutueral-300">{{ $product->description }}</p>
                        <div class="flex justify-between mt-3 item-center">
                            <h1 class="text-lg font-bold text-nutueral-700 dark:text-nutueral-200 md:text-xl">
                                {{ $product->price }}
                            </h1>
                            <form class="add-to-cart">
                                @php
                                    $cart = session()->get('cart', []);
                                @endphp
                                <input type="hidden" name="product" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button id="btn-{{ $product->id }}"
                                    class="{{ isset($cart["$product->id"]) ? 'hidden' : 'flex' }}  items-center gap-2 px-2 py-1 text-xs font-bold text-white uppercase transition-colors duration-300 transform bg-gray-800 rounded-lg dark:bg-gray-700 hover:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-700 dark:focus:bg-gray-600
                                    ">
                                    <span> اضف
                                        الي السلة</span>
                                    <i class='bx bx-cart-add text-white text-xl'></i>
                                </button>
                                <div id="input-{{ $product->id }}"
                                    class="{{ isset($cart["$product->id"]) ? 'flex' : 'hidden' }} items-center justify-center border-gray-100">
                                    <span
                                        class="desc_product cursor-pointer rounded-r  py-1 px-3.5 duration-100 hover:bg-primary hover:text-white">
                                        - </span>
                                    <input class="count_product h-8 w-8 border  bg-white text-center text-xs outline-none"
                                        type="number"
                                        value="{{ isset($cart["$product->id"]) ? $cart["$product->id"]['quantity'] : '1' }}"
                                        min="1" disabled />
                                    <span
                                        class="asc_product  cursor-pointer rounded-l  py-1 px-3 duration-100 hover:bg-primary hover:text-white">
                                        + </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-span-3 px-4 py-3 leading-normal text-primary border border-primary rounded-lg"
                    role="alert">
                    <p>لا توجد منتجات تحت هذا التصنيف</p>
                </div>
            @endforelse
        </div>
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
                        toastr.success('تمت الإضافة المنتج الي السلة')
                    } else {
                        toastr.success('تمت تحديث عدد المنتجات ')
                        if (method == 'asc') {
                            input.val(value + 1)
                        } else {
                            input.val(value - 1)
                        }
                    }
                    showInput(data.product)
                },
                error: function(response) {
                    toastr.error('حدث خطأ ما')
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
