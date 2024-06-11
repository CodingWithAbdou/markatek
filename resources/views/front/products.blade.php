@extends('front.layouts.app')

@section('content')
    <div class="slider">
        @foreach ($category->products as $product)
            <div
                class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                    <div class="shrink-0 md:order-1">
                        <img class="h-20 w-20 dark:hidden rounded-lg" src="{{ asset($product->cover_path) }}" alt="" />
                    </div>

                    <label for="counter-input" class="sr-only">Choose quantity:</label>
                    <div class="flex items-center justify-between md:order-3 md:justify-end">
                        <div class="flex items-center" data-book='{{ $product->id }}'>
                            <button type="button" id="" data-input-counter-decrement="counter-input"
                                class="decrement-button inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h16" />
                                </svg>
                            </button>
                            <input type="text" id="" data-input-counter
                                class="counter-input w-16 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white"
                                placeholder="" value="1" required />
                            <button type="button" id="" data-input-counter-increment="counter-input"
                                class=" increment-button inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                        <a href="#"
                            class="text-base font-medium text-gray-900 hover:underline dark:text-white">{{ $product->name }}</a>

                        <div class="flex items-center gap-4">
                            <form action="#">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <div class="text-start md:order-4 md:w-32 mb-2">
                                    <p class="text-xs text-neutral-600900 dark:text-white">سعر المنتج :
                                        <span class="text-xs underline"> {{ $product->price }} $ </span>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
