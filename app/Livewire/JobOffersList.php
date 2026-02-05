<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JobOffer;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class JobOffersList extends Component
{
    public $jobOffers;

    public function mount()
    {
        $this->jobOffers = JobOffer::all();
    }

    public function apply($jobId)
    {
        $user = Auth::user();

        $alreadyApplied = Application::where('job_offer_id', $jobId)
            ->where('user_id', $user->id)
            ->exists();

        if (!$alreadyApplied) {

            Application::create([
                'job_offer_id' => $jobId,
                'user_id' => $user->id,
            ]);

            session()->flash('success', 'You applied successfully!');
        } else {
            session()->flash('error', 'You already applied.');
        }
    }

    public function render()
    {
        return view('livewire.job-offers-list');
    }
}
