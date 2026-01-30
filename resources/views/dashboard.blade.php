<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <input
                        type="text"
                        name="profile"
                        placeholder="Search for a profile..."
                        class="w-full rounded-lg border border-gray-300 dark:border-gray-600
                            bg-white dark:bg-gray-700
                            px-4 py-2
                            text-gray-900 dark:text-gray-100
                            placeholder-gray-400 dark:placeholder-gray-400
                            focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500
                            focus:outline-none transition"
                    />
                </div>
            </div>
        </div>
    </div>  
</x-app-layout>
