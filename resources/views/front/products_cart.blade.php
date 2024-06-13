@foreach ($items as $id => $item)
    <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex  sm:gap-6 sm:justify-start">
        <img src="{{ asset($item['image']) }}" alt="product-image" class="w-40 h-40 object-cover rounded-lg sm:w-40" />
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
                    <input class="count_product h-8 w-8 border  bg-white text-center text-xs outline-none"
                        type="number" value="{{ $item['quantity'] }}" min="1" disabled />
                    <span
                        class="asc_product cursor-pointer rounded-l  py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50">
                        + </span>
                </div>
            </div>
        </div>
    </div>
@endforeach
