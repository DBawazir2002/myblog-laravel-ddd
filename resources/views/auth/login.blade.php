<x-layouts.auth :title="__('keywords.login')">
    <!-- Login Card -->
    <div
        class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="p-6">
            <!-- Language Dropdown Button -->
            <button id="languageDropdownButton" data-dropdown-toggle="languageDropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                <iconify-icon icon="iconoir:language" class="me-2"></iconify-icon>
                {{ LaravelLocalization::getCurrentLocaleNative() }}
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="languageDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700" data-dropdown>
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="languageDropdownButton">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        @if ($localeCode != LaravelLocalization::getCurrentLocale())
                            <li>
                                <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>


            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('keywords.login') }}</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">{{__('messages.login_note')}}</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Input -->
                <div class="mb-4">
                    <x-forms.input label="{{__('emails.email')}}" name="email" type="email" placeholder="your@email.com" />
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <x-forms.input label="{{__('attributes.password')}}" name="password" type="password" placeholder="••••••••" />
                </div>

                <!-- Login Button -->
                <x-buttons.primary class="w-full">{{ __('keywords.login') }}</x-buttons.primary>
            </form>
        </div>
    </div>
</x-layouts.auth>
