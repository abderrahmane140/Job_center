<x-app-layout>
    <div class="min-h-screen bg-gray-100 py-8">
        <div class="max-w-4xl mx-auto px-4">

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-semibold text-gray-900">
                    Find professionals
                </h1>
                <p class="text-gray-600 mt-1">
                    Connect with people and explore opportunities
                </p>
            </div>

            @if(isset($users) && $users->isNotEmpty())
                <div class="space-y-4">
                    @foreach($users as $user)
                        <div
                            class="bg-white border border-gray-200 rounded-lg p-5
                                   hover:shadow-sm hover:border-blue-500 transition">

                            <div class="flex gap-4">
                                <!-- Avatar -->
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-14 h-14 rounded-full bg-blue-600
                                               flex items-center justify-center
                                               text-white font-semibold text-lg">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                </div>

                                <!-- Main content -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex justify-between gap-4">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900">
                                                {{ $user->name }}
                                            </h3>

                                            <!-- Job / Role tags -->
                                            <div class="mt-1 flex flex-wrap gap-2">
                                                <span
                                                    class="inline-flex items-center px-3 py-1
                                                           text-xs font-semibold
                                                           bg-blue-50 text-blue-700
                                                           rounded-full">
                                                    {{ ucfirst($user->role) }}
                                                </span>

                                                @if($user->specialty)
                                                    <span
                                                        class="inline-flex items-center px-3 py-1
                                                               text-xs font-semibold
                                                               bg-blue-100 text-blue-700
                                                               rounded-full">
                                                        {{ $user->specialty }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Profile link -->
                                        <a href="#"
                                            class="text-sm font-semibold text-blue-600 hover:underline whitespace-nowrap">
                                            View profile
                                        </a>
                                    </div>

                                    <!-- Bio -->
                                    @if($user->bio)
                                        <p class="mt-3 text-sm text-gray-700 line-clamp-2">
                                            {{ $user->bio }}
                                        </p>
                                    @endif

                                    <!-- Footer -->
                                    <div class="mt-4 flex items-center justify-between">
                                        <span class="text-xs text-gray-500 truncate">
                                            {{ $user->email }}
                                        </span>

                                        <!-- Dynamic Button Based on Friendship Status -->
                                        @if($user->friendship_status === 'accepted')
                                            <!-- Already Friends -->
                                            <span class="inline-flex items-center gap-2
                                                       px-4 py-1.5 text-sm font-semibold
                                                       rounded-full
                                                       bg-green-50 text-green-700
                                                       border border-green-200">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                                Connected
                                            </span>

                                        @elseif($user->friendship_status === 'pending' && $user->is_sender)
                                            <!-- Pending (you sent the request) -->
                                            <span class="inline-flex items-center gap-2
                                                       px-4 py-1.5 text-sm font-semibold
                                                       rounded-full
                                                       bg-gray-100 text-gray-600
                                                       border border-gray-300">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                Pending
                                            </span>

                                        @elseif($user->friendship_status === 'pending' && !$user->is_sender)
                                            <!-- They sent you a request -->
                                            <a href="{{ route('friends.index') }}"
                                               class="inline-flex items-center gap-2
                                                      px-4 py-1.5 text-sm font-semibold
                                                      rounded-full
                                                      bg-blue-50 text-blue-700
                                                      border border-blue-600
                                                      hover:bg-blue-100 transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                </svg>
                                                Respond
                                            </a>

                                        @else
                                            <!-- Not connected - show Connect button -->
                                            <form action="{{ route('friend.send', $user->id) }}" method="POST">
                                                @csrf
                                                <button
                                                    class="inline-flex items-center gap-2
                                                           px-4 py-1.5 text-sm font-semibold
                                                           rounded-full
                                                           border border-blue-600
                                                           text-blue-600
                                                           hover:bg-blue-50 transition">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                                    </svg>
                                                    Connect
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            @else
                <div class="bg-white border border-gray-200 rounded-lg p-10 text-center">
                    <h3 class="text-lg font-semibold text-gray-900">
                        No results
                    </h3>
                    <p class="text-gray-600 mt-2">
                        Try a different search.
                    </p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>