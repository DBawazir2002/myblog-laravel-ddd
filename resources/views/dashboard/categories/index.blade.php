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
           class="text-blue-600 dark:text-blue-400 hover:underline">{{ __('keywords.categories') }}</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <span class="text-gray-500 dark:text-gray-400">{{ __('keywords.categories') }}</span>
    </div>

    <!-- Page Title -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('keywords.categories') }}</h1>
        {{--        <p class="text-gray-600 dark:text-gray-400 mt-1">{{ __('Update your name and email address') }}</p>--}}
        <div class="flex justify-end">
            <div>
                <a href="{{route('dashboard.categories.create')}}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors flex items-center">
                    {{ __('keywords.add') }}
                </a>
            </div>
        </div>
    </div>




    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 ">
                    {{__('attributes.name_ar')}}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{__('attributes.name_en')}}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{__('attributes.is_active')}}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{__('keywords.actions')}}
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <td class="px-6 py-4">
                        {{$category->name_ar}}
                    </td>
                    <td class="px-6 py-4">
                        {{$category->name_en}}
                    </td>
                    <td class="px-6 py-4">
                        {{$category->is_active ? __('keywords.active') : __('keywords.dis_active')}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="inline-flex" role="group">
                        <a href="{{route('dashboard.categories.show', absolute: false,parameters: $category->id)}}" class="m-3 font-medium text-gray-600 dark:text-gray-300 hover:underline">{{__('keywords.show')}}</a>
                        <a href="{{route('dashboard.categories.edit', absolute: false,parameters: $category->id)}}" class="m-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">{{__('keywords.edit')}}</a>
                        <a data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="m-3 font-medium text-red-600 dark:text-red-500 hover:underline">
                            {{__('keywords.delete')}}
                        </a>
                        </div>
                    </td>




                    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <form method="POST" action="{{route('dashboard.categories.destroy', parameters: $category->id, absolute: false)}}">
                                        @method('DELETE')
                                        @csrf
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{__('messages.delete_message')}}</h3>
                                        <button type="submit" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            {{__('messages.confirm_delete')}}
                                        </button>
                                    </form>
                                    <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">{{__('messages.cancel_delete')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</x-layouts.app>
