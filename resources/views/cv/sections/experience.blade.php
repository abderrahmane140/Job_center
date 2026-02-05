<div class="bg-gray-100 rounded-xl p-6 shadow-md border border-gray-200">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-semibold text-gray-800 flex items-center gap-2">💼 Experience</h2>
    </div>

    <div class="space-y-4 mb-4">
        @forelse($experiences as $exp)
            <div class="group relative bg-gray-200 rounded-xl p-4 border border-gray-300 hover:border-blue-300 hover:bg-gray-300 transition">
                <div class="flex gap-4">
                    <div class="w-14 h-14 bg-gray-300 rounded-lg flex items-center justify-center text-xs font-bold text-gray-600">WORK</div>

                    <div class="flex-1">
                        <h3 class="text-gray-800 font-semibold text-lg">{{ $exp->position }}</h3>
                        <p class="text-gray-600 text-sm">{{ $exp->company }} • {{ $exp->duration }}</p>
                        <p class="text-gray-500 text-xs mt-1">{{ $exp->location ?? 'Remote' }}</p>
                    </div>

                    <form action="{{ route('experiences.destroy', $exp->id) }}" method="POST" class="opacity-0 group-hover:opacity-100 transition">
                        @csrf
                        @method('DELETE')
                        <button class="text-gray-600 hover:text-red-500 p-1">✕</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-500 italic text-center py-6">No experiences added yet.</p>
        @endforelse
    </div>

    {{-- Add Experience Form --}}
    <form action="{{ route('experiences.store') }}" method="POST" class="p-4 bg-gray-50 rounded-lg border border-gray-200">
        @csrf
        <input type="text" name="position" placeholder="Position" class="w-full mb-2 px-3 py-2 border rounded-lg focus:ring-1 focus:ring-blue-600 focus:border-blue-600 transition">
        <input type="text" name="company" placeholder="Company" class="w-full mb-2 px-3 py-2 border rounded-lg focus:ring-1 focus:ring-blue-600 focus:border-blue-600 transition">
        <input type="text" name="duration" placeholder="Duration" class="w-full mb-2 px-3 py-2 border rounded-lg focus:ring-1 focus:ring-blue-600 focus:border-blue-600 transition">
        <button type="submit"
            style="padding: 8px 16px; margin-top: 8px; border: 2px solid #0A66C2; 
                color: white; border-radius: 8px; font-weight: 600; 
                background-color: #0A66C2; cursor: pointer; transition: all 0.3s;"
            onmouseover="this.style.backgroundColor='#004182';"
            onmouseout="this.style.backgroundColor='#0A66C2';">
            Add Experience
        </button>


    </form>
</div>
