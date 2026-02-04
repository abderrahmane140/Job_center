<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cv;

class CvController extends Controller
{
    public function index(){
        $cv = auth()->user()->cv;

        return view('cv.index', compact($cv));
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
