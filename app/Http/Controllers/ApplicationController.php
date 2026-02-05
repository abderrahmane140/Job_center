<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request, JobOffer $jobOffer)
    {
        $user = auth()->user();

        if ($user->role !== 'job_seeker') {
            abort(403, 'Only job seekers can apply.');
        }

        // Check if already applied
        if($jobOffer->applications()->where('user_id', $user->id)->exists()){
            return back()->with('error', 'You already applied for this job.');
        }

        $jobOffer->applications()->create([
            'user_id' => $user->id,
        ]);

        return back()->with('success', 'Application sent!');
    }

}
