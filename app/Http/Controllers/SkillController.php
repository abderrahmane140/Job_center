<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function store(Request $request){
        $cv = auth()->user()->cv()->firstOrCreate(
            ['user_id' => auth()->id()],
            ['title' => 'My CV']
        );

        $skill = Skill::firstOrCreate([
            'name' => $request->name,
        ]);

        $cv->skills()->syncWithoutDetaching($skill->id);


        return back()->with('success', 'Skill added!');



    }

    public function destroy(skill $skill){
        $skill->delete();
        return redirect()->route('cv.index')->with('success', 'skill deleted successfully.');

    }
}
