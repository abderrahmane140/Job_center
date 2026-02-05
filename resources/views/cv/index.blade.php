<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-900 via-slate-900 to-gray-900 py-8 px-4">
        <div class="max-w-6xl mx-auto">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                {{-- LEFT COLUMN - Profile Card --}}
                <div class="lg:col-span-1 space-y-6">
                    {{-- PROFILE CARD --}}
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-2xl border border-slate-700/50 overflow-hidden">
                        
                        {{-- Profile Header --}}
                        <div class="relative h-24 bg-gradient-to-r from-blue-600 to-blue-500">
                            <div class="absolute -bottom-12 left-1/2 transform -translate-x-1/2">
                                <div class="relative">
                                    <div class="w-24 h-24 rounded-full bg-gradient-to-br from-slate-700 to-slate-600 border-4 border-slate-800 shadow-xl"></div>
                                    <button class="absolute bottom-0 right-0 w-8 h-8 bg-blue-600 rounded-full border-2 border-slate-800 flex items-center justify-center hover:bg-blue-500 transition">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Profile Info --}}
                        <div class="pt-16 pb-6 px-6 text-center">
                            <h1 class="text-2xl font-bold text-white mb-1">
                                {{ auth()->user()->name }}
                            </h1>
                            
                            <p class="text-slate-400 text-sm mb-1">
                                Fullstack Developer
                            </p>
                            
                            <p class="text-slate-500 text-xs flex items-center justify-center gap-1 mb-4">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                                San Francisco, CA
                            </p>

                            <button class="w-full px-4 py-2.5 rounded-lg bg-gradient-to-r from-blue-600 to-blue-500 text-white text-sm font-semibold hover:from-blue-500 hover:to-blue-400 transition shadow-lg shadow-blue-500/20">
                                Add Profile Section
                            </button>
                        </div>
                    </div>

                    {{-- SKILLS CARD --}}
                    @include('cv.sections.skills')
                </div>

                {{-- RIGHT COLUMN - Content --}}
                <div class="lg:col-span-2 space-y-6">
                    
                    {{-- EXPERIENCE --}}
                    @include('cv.sections.experience')

                    {{-- EDUCATION --}}
                    @include('cv.sections.education')

                </div>
            </div>

        </div>
    </div>
</x-app-layout>