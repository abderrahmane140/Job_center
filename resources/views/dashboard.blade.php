<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="p-6">
                        <form method="GET" action="{{ route('search') }}" class="flex items-center gap-4">
                            <input
                                type="text"
                                name="profile"
                                placeholder="Search for a profile..."
                                class="flex-1 rounded-lg border border-gray-300 dark:border-gray-600
                                    bg-white dark:bg-gray-700
                                    px-4 py-2.5
                                    text-gray-900 dark:text-gray-100
                                    placeholder-gray-400 dark:placeholder-gray-400
                                    focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500
                                    focus:outline-none transition"
                            />
    
                            <button
                                type="submit"
                                class="inline-flex items-center justify-center
                                    rounded-lg bg-indigo-600 px-6 py-2.5
                                    text-sm font-semibold text-white
                                    shadow-sm
                                    hover:bg-indigo-500
                                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                                    dark:focus:ring-offset-gray-800
                                    transition"
                            >
                                Search
                            </button>
                        </form>
                    </div>
                        @if(isset($users))
    <div class="mt-6">
        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Search Results</h3>

                @if($users->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400">No profiles found.</p>
                @else
                    <div class="flex flex-wrap -mx-2">
                        @foreach($users as $user)
                            <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                                <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow hover:shadow-md transition">
                                    <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">{{ $user->name }}</h4>
                                    <p class="text-gray-600 dark:text-gray-400"><span class="font-medium">Email:</span> {{ $user->email }}</p>
                                    <p class="text-gray-600 dark:text-gray-400"><span class="font-medium">Role:</span> {{ ucfirst($user->role) }}</p>
                                    @if(isset($user->specialty))
                                        <p class="text-gray-600 dark:text-gray-400"><span class="font-medium">Specialty:</span> {{ $user->specialty }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif


                </div>

            </div>
        </div>
    </div>  
</x-app-layout>
