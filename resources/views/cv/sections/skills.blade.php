<div class="bg-gray-100 rounded-xl p-6 shadow-md border border-gray-200">
    <div class="flex justify-between items-center mb-5">
        <h2 class="text-lg font-semibold text-gray-800">Skills</h2>
    </div>

    <div class="flex flex-wrap gap-3 mb-4">
        @foreach($skills as $skill)
            <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-gray-200 border border-gray-300 text-gray-700 text-sm font-medium hover:bg-gray-300 transition">
                {{ $skill->name }}
                <form action="{{ route('skills.destroy', $skill->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="hover:text-red-500 transition">✕</button>
                </form>
            </div>
        @endforeach
    </div>

    {{-- Add Skill Form --}}
    <form action="{{ route('skills.store') }}" method="POST" class="flex gap-2">
        @csrf
        <input type="text" name="name" placeholder="New skill..."
               class="flex-1 px-3 py-2 rounded-lg border border-gray-300 focus:ring-1 focus:ring-blue-600 focus:border-blue-600 transition">
        <button type="submit"
            style="padding: 8px 16px; margin-top: 8px; border: 2px solid #0A66C2; 
                color: white; border-radius: 8px; font-weight: 600; 
                background-color: #0A66C2; cursor: pointer; transition: all 0.3s;"
            onmouseover="this.style.backgroundColor='#004182';"
            onmouseout="this.style.backgroundColor='#0A66C2';">
            Add Skill
        </type=>
    </form>
</div>
