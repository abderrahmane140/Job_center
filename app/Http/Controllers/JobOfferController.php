<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // ✅ Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'contract_type' => 'required|string',
            'company' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        // ✅ Upload Image
        $imagePath = $request->file('image')->store('job_offers', 'public');

        // ✅ Create Job Offer
        JobOffer::create([
            'user_id' => auth()->id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'contract_type' => $request->contract_type,
            'company' => $request->company,
        ]);

        return redirect()->route('job-offers.index')
                        ->with('success', 'Job offer created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
