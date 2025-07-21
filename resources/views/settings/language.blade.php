<x-layouts.app>
    <!-- Breadcrumbs -->
    <div class="mb-6 flex items-center text-sm">
        <a href="{{ route('dashboard.index') }}"
           class="text-blue-600 dark:text-blue-400 hover:underline">{{ __('keywords.dashboard') }}</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <a href="{{ route('settings.language.edit') }}"
           class="text-blue-600 dark:text-blue-400 hover:underline">{{ __('keywords.language') }}</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <span class="text-gray-500 dark:text-gray-400">{{ __('keywords.language') }}</span>
    </div>

    <!-- Page Title -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('keywords.language') }}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">
            {{ __('') }}
        </p>
    </div>

    <div class="p-6">
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Sidebar Navigation -->
            @include('settings.partials.navigation')

            <!-- Profile Content -->
            <div class="flex-1">
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
                    <div class="p-6">
                        <!-- Profile Form -->
                        <div class="mb-4">
                            <label for="theme"
                                   class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('keywords.language') }}</label>

                            <div class="inline-flex rounded-md shadow-xs" role="group">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    @if($localeCode == 'en')
                                        <a rel="alternate" type="button" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"  hreflang="{{$localeCode}}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                            {{$properties['native']}}
                                        </a>

                                    @elseif($localeCode == 'ar')
                                        <a rel="alternate" type="button" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"  hreflang="{{$localeCode}}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                            {{$properties['native']}}
                                        </a>
                                    @endif
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-layouts.app>
