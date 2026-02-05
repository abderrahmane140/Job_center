<div style="max-width:600px; margin:50px auto; background:white; padding:25px; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

    <!-- Header -->
    <h2 style="font-size:24px; font-weight:bold; margin-bottom:20px; color:#0A66C2; text-align:center;">
        Available Job Offers
    </h2>

    <!-- Flash Messages -->
    @if (session()->has('success'))
        <div style="background:#D4EDDA; color:#155724; padding:10px; margin-bottom:15px; border-radius:6px; text-align:center;">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div style="background:#F8D7DA; color:#721C24; padding:10px; margin-bottom:15px; border-radius:6px; text-align:center;">
            {{ session('error') }}
        </div>
    @endif

    <!-- Job Offers List -->
    @forelse($jobOffers as $offer)
        <div style="border:1px solid #ddd; padding:15px; border-radius:8px; margin-bottom:15px; display:flex; justify-content:space-between; align-items:center; transition: box-shadow 0.2s;" 
             onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.15)'" 
             onmouseout="this.style.boxShadow='0 4px 10px rgba(0,0,0,0.1)'">
            
            <div>
                <p style="font-weight:bold; font-size:16px; color:#333;">{{ $offer['title'] }}</p>
                <p style="color:#555; font-size:14px;">{{ $offer['company'] }}</p>
                <p style="color:gray; font-size:12px;">{{ $offer['contract_type'] }}</p>
            </div>

            <button wire:click="apply({{ $offer['id'] }})"
                    style="background:#0A66C2; color:white; border:none; padding:8px 18px; border-radius:6px; font-weight:bold; cursor:pointer; transition:background 0.2s;"
                    onmouseover="this.style.background='#004182'" 
                    onmouseout="this.style.background='#0A66C2'">
                Apply
            </button>
        </div>
    @empty
        <p style="color:gray; text-align:center; font-style:italic; margin-top:20px;">
            No job offers available.
        </p>
    @endforelse
</div>
