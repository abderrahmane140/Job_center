<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function store(Request $request){
    $cv = auth()->user()->cv()->firstOrCreate(
        ['user_id' => auth()->id()],
        ['title' => 'My CV']
    );

    $cv->educations()->create([
        'degree' => $request->degree,
        'school' => $request->school,
        'year'   => $request->year,
    ]);


        return back()->with('success', 'Education added!');
    }

    public function destroy(Education $education){
        $education->delete();
        return redirect()->route('cv.index')->with('success', 'education deleted successfully.');

    }
}
