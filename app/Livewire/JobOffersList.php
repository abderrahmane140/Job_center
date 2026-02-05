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
        $user = Auth::user();
        
        // Get all job offers and mark which ones the user has applied to
        $this->jobOffers = JobOffer::all()->map(function($offer) use ($user) {
            $offer->hasApplied = Application::where('job_id', $offer->id)
                ->where('user_id', $user->id)
                ->exists();
            return $offer;
        });
    }

    public function apply($jobId)
    {
        $user = Auth::user();

        $alreadyApplied = Application::where('job_id', $jobId)
            ->where('user_id', $user->id)
            ->exists();

        if (!$alreadyApplied) {
            Application::create([
                'job_id' => $jobId,
                'user_id' => $user->id,
            ]);

            // Success message
            session()->flash('success', 'Application submitted successfully!');
            
            // Refresh the job offers to update button state
            $this->mount();
        } else {
            // Error message
            session()->flash('error', 'You have already applied to this job.');
        }
    }

    public function render()
    {
        return view('livewire.job-offers-list');
    }
}