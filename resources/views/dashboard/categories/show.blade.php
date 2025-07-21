<x-layouts.app>
    <!-- Breadcrumbs -->
    <div class="mb-6 flex items-center text-sm">
        <a href="{{ route('dashboard.index') }}"
           class="text-blue-600 dark:text-blue-400 hover:underline">{{ __('keywords.dashboard') }}</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <a href="{{ route('dashboard.categories.index') }}"
           class="text-blue-600 dark:text-blue-400 hover:underline">{{ __('keywords.categories') }}</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <span class="text-gray-500 dark:text-gray-400">{{ __('keywords.show') }}</span>
    </div>

    <!-- Page Title -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('messages.show_category') }}</h1>
        {{--        <p class="text-gray-600 dark:text-gray-400 mt-1">{{ __('Update your name and email address') }}</p>--}}
    </div>

    <div class="flex-1">
        <div
            class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
            <div class="p-6">

                <img class="mb-3 h-auto max-w-sm transition-all duration-300 rounded-lg cursor-pointer" src="{{$category->image}}" alt="image description">

                <div class="mb-4">
                        <x-forms.input label="{{__('attributes.name_ar')}}" name="name_ar" type="text" value="{{ $category->name_ar }}" readonly="true"/>
                    </div>

                    <div class="mb-4">
                        <x-forms.input label="{{__('attributes.name_en')}}" name="name_en" type="text" value="{{ $category->name_en }}" readonly="true"/>
                    </div>

                    <div class="mb-6">
                        <x-forms.toggle label="{{__('attributes.is_active')}}" name="is_active" type="text" value="{{ $category->is_active }}" />
                    </div>


                <div class="inline-flex" role="group">
                    <button>
                        <a href="{{route('dashboard.categories.edit', $category->id)}}"
                           class="mx-3 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors flex items-center">
                            {{ __('keywords.edit') }}
                        </a>
                    </button>

                    <button>
                        <a href="{{route('dashboard.categories.index')}}"
                           class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors flex items-center">
                            {{ __('keywords.back') }}
                        </a>
                    </button>
                </div>


            </div>
        </div>
    </div>


</x-layouts.app>
