<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(JobOffer $jobOffer){


        Application::create([
            'user_id' => auth()->id,
            'job_offer_id' => $jobOffer->id,
            'status' => 'pending',
        ]);
    }
}
