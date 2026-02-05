<?php

namespace App\Policies;

use App\Models\JobOffer;
use App\Models\User;

class JobOfferPolicy
{
    // Only recruiters can create a job offer
    public function create(User $user)
    {
        return $user->role === 'recruiter';
    }

    // Only recruiters can update their own job offer
    public function update(User $user, JobOffer $jobOffer)
    {
        return $user->role === 'recruiter' && $jobOffer->user_id === $user->id;
    }

    // Only recruiters can delete their own job offer
    public function delete(User $user, JobOffer $jobOffer)
    {
        return $user->role === 'recruiter' && $jobOffer->user_id === $user->id;
    }

    // Anyone can view a job offer
    public function view(User $user, JobOffer $jobOffer)
    {
        return true;
    }
}
