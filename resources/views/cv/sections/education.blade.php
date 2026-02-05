<div class="bg-gray-100 rounded-xl p-6 shadow-md border border-gray-200">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-semibold text-gray-800 flex items-center gap-2">🎓 Education</h2>
    </div>

    <div class="space-y-4 mb-4">
        @forelse($educations as $edu)
            <div class="group relative p-4 bg-gray-200 rounded-xl border border-gray-300 hover:border-blue-300 hover:bg-gray-300 transition">
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600 font-bold">🎓</div>

                    <div class="flex-1 min-w-0">
                        <h3 class="text-gray-800 font-semibold text-lg">{{ $edu->degree }}</h3>
                        <p class="text-gray-600 text-sm">{{ $edu->school }}</p>
                        <p class="text-gray-500 text-xs mt-1">{{ $edu->year }}</p>
                    </div>

                    <form action="{{ route('educations.destroy', $edu->id) }}" method="POST" class="flex gap-1 opacity-0 group-hover:opacity-100 transition">
                        @csrf
                        @method('DELETE')
                        <button class="p-2 text-gray-600 hover:text-red-500 hover:bg-gray-300 rounded-lg transition">🗑</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-500 italic text-center py-6">No education added yet.</p>
        @endforelse
    </div>

    {{-- Add Education Form --}}
    <form action="{{ route('educations.store') }}" method="POST" class="p-4 bg-gray-50 rounded-lg border border-gray-200">
        @csrf
        <input type="text" name="degree" placeholder="Degree" class="w-full mb-2 px-3 py-2 border rounded-lg focus:ring-1 focus:ring-blue-600 focus:border-blue-600 transition">
        <input type="text" name="school" placeholder="School" class="w-full mb-2 px-3 py-2 border rounded-lg focus:ring-1 focus:ring-blue-600 focus:border-blue-600 transition">
        <input type="number" name="year" placeholder="Year" class="w-full mb-2 px-3 py-2 border rounded-lg focus:ring-1 focus:ring-blue-600 focus:border-blue-600 transition">

        <button type="submit"
            style="padding: 8px 16px; margin-top: 8px; border: 2px solid #0A66C2; 
                color: white; border-radius: 8px; font-weight: 600; 
                background-color: #0A66C2; cursor: pointer; transition: all 0.3s;"
            onmouseover="this.style.backgroundColor='#004182';"
            onmouseout="this.style.backgroundColor='#0A66C2';">            
            Add Education
        </button>
    </form>
</div>
