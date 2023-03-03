<div class="p-4 bg-white block rounded-lg sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
    <div class="w-full mb-1">
        <div class="sm:flex">
            <div class="items-center mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                <form class="lg:pr-3" action="{{ route('management-user') }}" method="GET">
                    <label for="users-search" class="sr-only">Search</label>
                    <div class="relative mt-1 lg:w-64 xl:w-96 flex space-x-2">
                        <input type="text" name="name" id="users-search" class="inline-flex bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Cari Data User Media Social" value="{{ $query ?? '' }}">
                        <x-primary-button class="inline-flex">{{ __('Cari') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>