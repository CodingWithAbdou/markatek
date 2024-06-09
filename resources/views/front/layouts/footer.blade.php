<footer class="bg-white border border-gray-300 rounded-lg shadow dark:bg-gray-900 m-4">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="{{ route('main') }}">
                <img class="h-8 w-auto"
                    src="{{ App\Models\Setting::where('setting_key', 'logo')->first()->setting_value }}" alt="ماركتك">
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">التصنيف الاول</a>
                </li>

            </ul>
        </div>
        <hr class="my-6 border-gray-300 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">جميع الحقوق محفوضة مؤسسة
    </div>
</footer>
