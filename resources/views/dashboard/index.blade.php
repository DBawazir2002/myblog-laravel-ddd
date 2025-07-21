<x-layouts.app>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{__('keywords.dashboard')}}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">{{__('keywords.welcome_dashboard')}}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{__('keywords.total_categories')}}</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100 mt-1">{{$categoriesCount}}</p>
                </div>
                <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-full">
                    @svg('fas-tags', 'w-5 h-5 text-gray-300')
                </div>
            </div>
        </div>

        <!-- Post Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{__('keywords.total_posts')}}</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100 mt-1">{{$postsCount}}</p>
                </div>

                <div class="bg-green-100 dark:bg-green-900 p-3 rounded-full">
                    @svg('fas-pager', 'w-5 h-5 text-gray-300')
                </div>
            </div>
        </div>

    </div>

</x-layouts.app>
