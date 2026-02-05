<div class="max-w-2xl mx-auto mt-10 space-y-6">

    <!-- Page Title -->
    <h2 class="text-xl font-bold text-gray-800 mb-6">
        Job Offers Feed
    </h2>

    <!-- Offers -->
    @forelse($jobOffers as $offer)

        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

            <!-- Post Header -->
            <div class="flex items-center gap-3 p-4">

                <!-- Company Logo -->
                <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center">

                    @if($offer->company_logo)
                        <img
                            src="{{ asset('storage/'.$offer->company_logo) }}"
                            class="w-full h-full object-cover"
                            alt="Logo"
                        >
                    @else
                        <span class="text-blue-600 font-bold">
                            {{ strtoupper(substr($offer->company,0,1)) }}
                        </span>
                    @endif

                </div>

                <!-- Company Info -->
                <div class="flex-1">
                    <p class="font-semibold text-gray-900">
                        {{ $offer->company }}
                    </p>
                    <p class="text-xs text-gray-500">
                        {{ $offer->contract_type }} • {{ $offer->location ?? 'Remote' }}
                    </p>
                </div>

                <!-- Menu Dots -->
                <button class="text-gray-400 hover:text-gray-600">
                    ⋯
                </button>
            </div>

            <!-- Post Content -->
            <div class="px-4 pb-3">
                <h3 class="text-lg font-bold text-gray-800">
                    {{ $offer->title }}
                </h3>

                <p class="text-sm text-gray-600 mt-2 leading-relaxed">
                    We are hiring for this role. Apply now and join our team 🚀
                </p>
            </div>

            <!-- Post Image Banner -->
            <div class="w-full h-52 bg-gray-100">
                @if($offer->image)
                    <img
                        src="{{ asset('storage/'.$offer->image) }}"
                        class="w-full h-full object-cover"
                    >
                @else
                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                        No Image Available
                    </div>
                @endif
            </div>

            <!-- Post Footer Actions -->
<!-- Post Footer Actions -->
        <div class="p-4 flex justify-between items-center">

            <!-- Apply Button OR Already Applied -->
            @if($offer->hasApplied)

                <p class="text-gray-400 font-semibold">
                    You already applied for this job
                </p>

            @else

                <button
                    wire:click="apply({{ $offer->id }})"
                    class="bg-[#0A66C2] hover:bg-[#004182]
                        text-white font-semibold px-6 py-2
                        rounded-full transition"
                >
                    Apply
                </button>

            @endif

            <!-- Save Button -->
            <button class="text-gray-500 hover:text-blue-600 font-medium">
                Save
            </button>
        </div>
        </div>

    @empty
        <p class="text-center text-gray-500 italic">
            No job offers available.
        </p>
    @endforelse
</div>
