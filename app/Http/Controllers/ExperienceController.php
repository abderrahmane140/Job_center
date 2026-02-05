<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'position' => 'required',
            'company' => 'required',
            'duration' => 'required',
        ]);

        $cv = auth()->user()->cv()->firstOrCreate(
            ['user_id' => auth()->id()],
            ['title' => 'My CV']
        );

        $cv->experiences()->create([
            'position' => $request->position,
            'company'  => $request->company,
            'duration' => $request->duration,
        ]);

        return back()->with('success', 'Experience added!');
    }

    public function destroy(Experience $experience){
        $experience->delete();
        return redirect()->route('cv.index')->with('success', 'experience deleted successfully.');
    }

}
