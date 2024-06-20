<footer class="mx-auto pb-6 max-w-screen-2xl relative">
    <div class="mx-6 mt-6 rounded-xl shadow border border-gray-200 bg-white">
        <div class="w-full max-w-screen-xl mx-auto p-6 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div>
                    {{-- <a href="{{ route('main') }}">
                        <img class="h-8 w-auto mb-8"
                            src="{{ asset(App\Models\Setting::where('setting_key', 'logo')->first()->setting_value) }}"
                            alt="ماركتك">
                    </a> --}}
                    <div class="flex items-center gap-4">
                        <h3 class="text-neutral-600">{{ __('front.contact_us') }}</h3>
                        <ul class="flex flex-wrap items-center text-sm font-medium  sm:mb-0 secound_color_t">
                            @php
                                $facebook = App\Models\Setting::where('setting_key', 'facebook')->first()
                                    ->setting_value;
                                $instagram = App\Models\Setting::where('setting_key', 'instagram')->first()
                                    ->setting_value;
                                $whatsapp = App\Models\Setting::where('setting_key', 'whatsapp')->first()
                                    ->setting_value;
                                $gmail = App\Models\Setting::where('setting_key', 'gmail')->first()->setting_value;
                            @endphp
                            <li>
                                @if ($facebook)
                                    <a href="{{ $facebook }}" target="__blank"
                                        class="hover:opacity-75 transition duration-200 me-2 ">
                                        <i class='bx bxl-facebook-circle text-2xl text-[#1877f2]'></i>
                                    </a>
                                @endif

                                @if ($instagram)
                                    <a href="{{ $instagram }}" target="__blank"
                                        class="hover:opacity-75 transition duration-200 me-2 ">
                                        <i class='bx bxl-instagram text-2xl text-[#c32aa3]'></i>
                                    </a>
                                @endif

                                @if ($whatsapp)
                                    <a href="{{ $whatsapp }}" target="__blank"
                                        class="hover:opacity-75 transition duration-200 me-2 ">
                                        <i class='bx bxl-whatsapp text-2xl text-[#25d366]'></i>
                                    </a>
                                @endif

                                @if ($gmail)
                                    <a href="{{ $gmail }}" target="__blank"
                                        class="hover:opacity-75 transition duration-200 me-2 ">
                                        <i class='bx bx-envelope text-2xl text-neutral-700'></i>
                                    </a>
                                @endif
                            </li>
                        </ul>
                    </div>

                </div>
                <ul class="flex gap-4 flex-wrap items-center mb-6 text-sm font-medium  sm:mb-0 secound_color_t">
                    <li>
                        <img class="grayscale" src="{{ asset('assets/images/mastercard.png') }}" width="30"
                            alt="">
                    </li>
                    <li>
                        <img class="grayscale" src="{{ asset('assets/images/visacard.png') }}" width="30"
                            alt="">
                    </li>
                    <li>
                        <img class="w-12 grayscale" src="{{ asset('assets/images/keynet.png') }}" width="30"
                            alt="">
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-300 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span
                class="block text-sm secound_color_t sm:text-center ">{{ App\Models\Setting::where('setting_key', 'footer_description_' . getLocale())->first()->setting_value }}</span>
        </div>
    </div>
</footer>
