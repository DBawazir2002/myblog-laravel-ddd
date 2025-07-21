<x-layouts.app>
    <!-- Breadcrumbs -->
    <div class="mb-6 flex items-center text-sm">
        <a href="{{ route('dashboard.index') }}"
           class="text-blue-600 dark:text-blue-400 hover:underline">{{ __('keywords.dashboard') }}</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <a href="{{ route('dashboard.posts.index') }}"
           class="text-blue-600 dark:text-blue-400 hover:underline">{{ __('keywords.posts') }}</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <span class="text-gray-500 dark:text-gray-400">{{ __('messages.add_post') }}</span>
    </div>

    <!-- Page Title -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('messages.add_post') }}</h1>
        {{--        <p class="text-gray-600 dark:text-gray-400 mt-1">{{ __('Update your name and email address') }}</p>--}}
    </div>

    <div class="flex-1">
        <div
            class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
            <div class="p-6">
                @php
                    $currentLocale = LaravelLocalization::getCurrentLocale();
                @endphp
                <!-- Create Post Form -->
                <form action="{{route('dashboard.posts.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <x-forms.select label="{{__('attributes.category')}}" name="category_id" optionExample="{{__('messages.choose_category')}}" :options="$categories" optionDisplay="name_{{$currentLocale}}"/>
                    </div>

                    <div class="mb-4">
                        <x-forms.input label="{{__('attributes.title_ar')}}" name="title_ar" type="text" value="{{ old('title_ar') }}" />
                    </div>

                    <div class="mb-6">
                        <x-forms.input label="{{__('attributes.title_en')}}" name="title_en" type="text" value="{{ old('title_en') }}" />
                    </div>

                    <div class="mb-6">
                        <x-forms.textarea label="{{__('attributes.content_ar')}}" name="content_ar" rows="6" value="{{ old('content_ar') }}" />
                    </div>

                    <div class="mb-6">
                        <x-forms.textarea label="{{__('attributes.content_en')}}" name="content_en" rows="6" value="{{ old('content_en') }}" />
                    </div>

                    <div class="mb-6">
                        <x-forms.file label="{{__('attributes.image')}}" name="image" value="{{ old('image') }}" />
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPEG, PNG, JPG.</p>

                    </div>


                    <div>
                        <x-buttons.primary>{{ __('keywords.save') }}</x-buttons.primary>
                    </div>
                </form>


            </div>
        </div>
    </div>


</x-layouts.app>
