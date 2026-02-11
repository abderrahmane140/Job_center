<x-app-layout>
    <div class="min-h-screen bg-[#f3f2ef] py-6">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-12 gap-5">

                <aside class="hidden lg:block lg:col-span-3 space-y-4">
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="h-14 bg-gradient-to-r from-blue-400 to-blue-600"></div>
                        <div class="px-4 pb-4">
                            <div class="-mt-8 mb-3">
                                <div class="w-16 h-16 rounded-full bg-white p-1 mx-auto">
                                    <div class="w-full h-full rounded-full bg-gray-200 flex items-center justify-center font-bold text-gray-600 border border-gray-100">
                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                    </div>
                                </div>
                            </div>
                            <div class="text-center border-b border-gray-100 pb-4">
                                <h2 class="font-bold text-gray-800">{{ auth()->user()->name }}</h2>
                                <p class="text-xs text-gray-500">Welcome back!</p>
                            </div>
                            <nav class="mt-4 space-y-1">
                                <a href="#" class="flex justify-between items-center p-2 rounded hover:bg-gray-100 text-sm font-medium text-gray-600 transition">
                                    <span>Connections</span>
                                    <span class="text-blue-600 font-bold">{{ count($friends) }}</span>
                                </a>
                                <a href="#" class="flex justify-between items-center p-2 rounded hover:bg-gray-100 text-sm font-medium text-gray-600 transition">
                                    <span>Invitations</span>
                                    <span class="text-blue-600 font-bold">{{ count($requests) }}</span>
                                </a>
                            </nav>
                        </div>
                    </div>
                </aside>

                <main class="col-span-12 md:col-span-8 lg:col-span-6 space-y-4">
                    
                    <section class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-gray-100 flex justify-between items-center">
                            <h2 class="text-base font-semibold text-gray-700">Invitations</h2>
                        </div>
                        <div class="divide-y divide-gray-100">
                            @forelse($requests as $req)
                                <div class="p-4 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center font-bold text-blue-600 text-lg">
                                            {{ strtoupper(substr($req->sender->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900 leading-tight">{{ $req->sender->name }}</p>
                                            <p class="text-xs text-gray-500">Wants to connect with you</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-2">
                                        <form action="{{ route('friend.reject', $req->id) }}" method="POST">
                                            @csrf
                                            <button class="px-4 py-1.5 text-sm font-semibold text-gray-500 hover:bg-gray-100 rounded-full transition">Ignore</button>
                                        </form>
                                        <form action="{{ route('friend.accept', $req->id) }}" method="POST">
                                            @csrf
                                            <button class="px-4 py-1.5 text-sm font-semibold text-blue-600 border border-blue-600 hover:bg-blue-50 rounded-full transition">Accept</button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <p class="p-6 text-center text-sm text-gray-400">No pending invitations.</p>
                            @endforelse
                        </div>
                    </section>

                    <section class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-gray-100">
                            <h2 class="text-base font-semibold text-gray-700">People you may know</h2>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-px bg-white">
                            @forelse($users as $user)
                                <div class="bg-white p-4 flex flex-col items-center text-center">
                                    <div class="w-20 h-20 rounded-full bg-indigo-50 border border-indigo-100 flex items-center justify-center text-2xl font-bold text-indigo-600 mb-3">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <h3 class="font-semibold text-gray-900 text-sm line-clamp-1">{{ $user->name }}</h3>
                                    <p class="text-xs text-gray-500 h-8 mb-4">Professional in your network</p>
                                    <form action="{{ route('friend.send', $user->id) }}" method="POST" class="w-full">
                                        @csrf
                                        <button class="w-full border border-blue-600 text-blue-600 font-semibold py-1 rounded-full text-sm hover:bg-blue-50 transition">
                                            + Connect
                                        </button>
                                    </form>
                                </div>
                            @empty
                                <div class="col-span-full bg-white p-8 text-center text-gray-400 text-sm">No new suggestions.</div>
                            @endforelse
                        </div>
                    </section>
                </main>

                <aside class="col-span-12 md:col-span-4 lg:col-span-3">
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden sticky top-6">
                        <div class="px-4 py-3 border-b border-gray-100">
                            <h2 class="text-base font-semibold text-gray-700">Your Friends</h2>
                        </div>
                        <div class="max-h-[600px] overflow-y-auto divide-y divide-gray-50">
                            @forelse($friends as $friend)
                                <div class="p-3 flex items-center gap-3 hover:bg-gray-50 transition cursor-pointer">
                                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center font-bold text-green-700 text-sm flex-shrink-0">
                                        {{ strtoupper(substr($friend->name, 0, 1)) }}
                                    </div>
                                    <div class="overflow-hidden">
                                        <p class="text-sm font-semibold text-gray-900 truncate">{{ $friend->name }}</p>
                                        <p class="text-[10px] text-gray-400 uppercase tracking-wider font-bold">Connected</p>
                                    </div>
                                </div>
                            @empty
                                <p class="p-6 text-center text-xs text-gray-400 italic">Start growing your network!</p>
                            @endforelse
                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </div>
</x-app-layout>