<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function index(Request $request){
        $users = User::where('name', 'like', "%{$request->q}%")
        ->orWhere('specialite', 'like', "%{$request->q}%")
        ->get();
        

        return view('dashboard', compact($users));
    }
}
