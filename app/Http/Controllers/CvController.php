<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cv;

class CvController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $cv = $user->cv()->firstOrCreate(
            ['user_id' => $user->id],
            ['title' => 'My CV']
        );

        return view('cv.index', [
            'experiences' => $cv->experiences,
            'educations'  => $cv->educations,
            'skills'      => $cv->skills,
        ]);
    }



    public function create() {
        return view('cv.create');
    }


    public function store(Request $request){

        $cv = $request->validate([
            'title' => 'string|requered'
        ]);

        Cv::create([
            'user_id' => auth()->id(),
            'title'  => $request->title
        ]);

        return redirect()->back()->with('success','CV created successfully!');
    }
}
