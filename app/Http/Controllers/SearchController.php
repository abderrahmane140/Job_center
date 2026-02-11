<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friendship;
use Illuminate\Http\Request;

class SearchController extends Controller
{

public function index(Request $request)
{
    $query = $request->input('profile');
    
    $users = collect();
    
    if ($query) {
        $users = User::where('id', '!=', auth()->id()) 
            ->where(function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('specialty', 'like', "%{$query}%")
                  ->orWhere('bio', 'like', "%{$query}%");
            })
            ->get();

        $users = $users->map(function($user) {
            // Check if there's a pending or accepted friendship
            $friendship = Friendship::where(function($q) use ($user) {
                $q->where('sender_id', auth()->id())
                  ->where('receiver_id', $user->id);
            })->orWhere(function($q) use ($user) {
                $q->where('sender_id', $user->id)
                  ->where('receiver_id', auth()->id());
            })->first();

            $user->friendship_status = $friendship ? $friendship->status : null;
            $user->is_sender = $friendship && $friendship->sender_id == auth()->id();
            
            return $user;
        });
    }

    return view('search.index', compact('users', 'query'));
}

}
