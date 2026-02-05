<x-app-layout>
    <div style="min-height:100vh; background-color:#f3f6f8; padding:32px 0;">
        <div style="max-width:1200px; margin:0 auto; padding:0 16px;">

            {{-- Header Section --}}
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:32px;">
                <div>
                    <h1 style="font-size:28px; font-weight:700; color:#111827; margin-bottom:4px;">My Job Offers</h1>
                    <p style="color:#6b7280; font-size:14px;">Manage and track your job postings</p>
                </div>

                <a href="{{ route('job_offers.create') }}" 
                   style="display:inline-flex; align-items:center; gap:8px; background-color:#0A66C2; color:white; padding:12px 24px; border-radius:12px; font-weight:600; text-decoration:none; transition:all 0.2s; box-shadow:0 2px 4px rgba(0,0,0,0.1);"
                   onmouseover="this.style.backgroundColor='#004182';"
                   onmouseout="this.style.backgroundColor='#0A66C2';">
                    <svg style="width:20px; height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Create New Job Offer
                </a>
            </div>

            {{-- Stats Cards --}}
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:16px; margin-bottom:32px;">
                {{-- Total Offers --}}
                <div style="background-color:white; border-radius:12px; padding:24px; box-shadow:0 2px 6px rgba(0,0,0,0.05); display:flex; justify-content:space-between; align-items:center;">
                    <div>
                        <p style="color:#6b7280; font-size:12px; font-weight:500;">Total Offers</p>
                        <p style="font-size:24px; font-weight:700; color:#111827; margin-top:4px;">{{ $jobOffers->count() }}</p>
                    </div>
                    <div style="background-color:#bfdbfe; border-radius:50%; padding:12px;">
                        <svg style="width:24px; height:24px; color:#0A66C2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>

                {{-- Active --}}
                <div style="background-color:white; border-radius:12px; padding:24px; box-shadow:0 2px 6px rgba(0,0,0,0.05); display:flex; justify-content:space-between; align-items:center;">
                    <div>
                        <p style="color:#6b7280; font-size:12px; font-weight:500;">Active</p>
                        <p style="font-size:24px; font-weight:700; color:#059669; margin-top:4px;">{{ $jobOffers->count() }}</p>
                    </div>
                    <div style="background-color:#d1fae5; border-radius:50%; padding:12px;">
                        <svg style="width:24px; height:24px; color:#059669;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>

                {{-- This Month --}}
                <div style="background-color:white; border-radius:12px; padding:24px; box-shadow:0 2px 6px rgba(0,0,0,0.05); display:flex; justify-content:space-between; align-items:center;">
                    <div>
                        <p style="color:#6b7280; font-size:12px; font-weight:500;">This Month</p>
                        <p style="font-size:24px; font-weight:700; color:#7c3aed; margin-top:4px;">{{ $jobOffers->count() }}</p>
                    </div>
                    <div style="background-color:#ede9fe; border-radius:50%; padding:12px;">
                        <svg style="width:24px; height:24px; color:#7c3aed;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Job Offers List --}}
            <div style="background-color:white; border-radius:12px; box-shadow:0 2px 6px rgba(0,0,0,0.05); overflow:hidden;">
                <div style="padding:16px; background-color:#f9fafb; border-bottom:1px solid #e5e7eb;">
                    <h2 style="font-size:16px; font-weight:600; color:#111827;">All Job Offers</h2>
                </div>

                <div>
                    @forelse($jobOffers as $offer)
                        <div style="padding:16px; display:flex; justify-content:space-between; align-items:flex-start; gap:16px; transition:background 0.2s;" onmouseover="this.style.backgroundColor='#f9fafb';" onmouseout="this.style.backgroundColor='white';">
                            {{-- Left side --}}
                            <div style="display:flex; gap:16px; flex:1;">
                                {{-- Image or Initial --}}
                                <div style="flex-shrink:0;">
                                    @if($offer->image)
                                        <img src="{{ asset('storage/' . $offer->image) }}" 
                                             alt="{{ $offer->company }}" 
                                             style="width:64px; height:64px; border-radius:12px; object-fit:cover; border:1px solid #e5e7eb;">
                                    @else
                                        <div style="width:64px; height:64px; border-radius:12px; background:linear-gradient(135deg, #0A66C2, #7c3aed); display:flex; align-items:center; justify-content:center;">
                                            <span style="color:white; font-weight:bold; font-size:18px;">{{ substr($offer->company, 0, 1) }}</span>
                                        </div>
                                    @endif
                                </div>

                                {{-- Job Details --}}
                                <div style="flex:1;">
                                    <h3 style="font-size:16px; font-weight:700; color:#111827; margin-bottom:4px;">{{ $offer->title }}</h3>
                                    <p style="font-size:14px; font-weight:500; color:#6b7280; margin-bottom:4px;">{{ $offer->company }}</p>
                                    <p style="font-size:12px; color:#6b7280; margin-bottom:6px; overflow:hidden; text-overflow:ellipsis; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical;">{{ $offer->description }}</p>

                                    <div style="display:flex; gap:8px; flex-wrap:wrap;">
                                        <span style="display:inline-flex; align-items:center; padding:4px 8px; border-radius:999px; font-size:10px; font-weight:500; background-color:#bfdbfe; color:#0A66C2;">{{ $offer->contract_type }}</span>
                                        <span style="display:inline-flex; align-items:center; padding:4px 8px; border-radius:999px; font-size:10px; font-weight:500; background-color:#e5e7eb; color:#4b5563;">
                                            <svg style="width:12px; height:12px; margin-right:4px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            {{ $offer->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            {{-- Right side actions --}}
                            <div style="display:flex; gap:8px; flex-shrink:0;">
                                <a href="" 
                                   style="display:inline-flex; align-items:center; gap:4px; padding:8px 12px; background-color:#f3f4f6; color:#374151; border-radius:8px; font-weight:500; text-decoration:none; transition:all 0.15s;"
                                   onmouseover="this.style.backgroundColor='#e5e7eb';"
                                   onmouseout="this.style.backgroundColor='#f3f4f6';">
                                    <svg style="width:16px; height:16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Edit
                                </a>

                                <form action="{{ route('job_offers.destroy', $offer->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            style="display:inline-flex; align-items:center; gap:4px; padding:8px 12px; background-color:#ef4444; color:white; border-radius:8px; font-weight:500; border:none; cursor:pointer; transition:all 0.15s;"
                                            onmouseover="this.style.backgroundColor='#dc2626';"
                                            onmouseout="this.style.backgroundColor='#ef4444';">
                                        <svg style="width:16px; height:16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div style="padding:48px; text-align:center; color:#6b7280;">
                            <svg style="width:64px; height:64px; margin:0 auto 16px; color:#9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <p style="font-size:18px; font-weight:500; margin-bottom:4px;">No job offers yet</p>
                            <p style="color:#9ca3af; margin-bottom:16px;">Get started by creating your first job offer</p>
                            <a href="{{ route('job_offers.create') }}"
                               style="display:inline-flex; align-items:center; gap:8px; background-color:#0A66C2; color:white; padding:12px 24px; border-radius:12px; font-weight:600; text-decoration:none; transition:all 0.2s;"
                               onmouseover="this.style.backgroundColor='#004182';"
                               onmouseout="this.style.backgroundColor='#0A66C2';">
                                <svg style="width:20px; height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                Create Your First Job Offer
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
