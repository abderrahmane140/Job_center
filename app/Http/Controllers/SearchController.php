<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('profile');

        $users = User::where('name', 'like', "%{$query}%")
            ->orWhere('specialty', 'like', "%{$query}%")
            ->get();

        return view('dashboard', compact('users'));
    }

}
