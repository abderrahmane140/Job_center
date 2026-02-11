<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller
{
    public function index()
    {
        $me = Auth::user();

        // All friendships (pending + accepted) of current user
        $friendships = Friendship::where(function ($q) use ($me) {
            $q->where('sender_id', $me->id)
              ->orWhere('receiver_id', $me->id);
        })->get();

        // IDs to exclude from suggestions (both friends and pending)
        $excludedUserIds = $friendships->map(function ($f) use ($me) {
            return $f->sender_id == $me->id
                ? $f->receiver_id
                : $f->sender_id;
        })->push($me->id)->toArray(); // Convert to array for whereNotIn

        // Pending friend requests received
        $requests = Friendship::where('receiver_id', $me->id)
            ->where('status', 'pending')
            ->with('sender')
            ->get();

        // Accepted friends
        $friends = Friendship::where('status', 'accepted')
            ->where(function ($q) use ($me) {
                $q->where('sender_id', $me->id)
                  ->orWhere('receiver_id', $me->id);
            })
            ->with('sender', 'receiver')
            ->get()
            ->map(function ($friendship) use ($me) {
                // Return the OTHER user
                return $friendship->sender_id == $me->id
                    ? $friendship->receiver
                    : $friendship->sender;
            })
            ->filter() // remove nulls just in case
            ->unique('id')
            ->values();


        // People you may know (not friends, not pending, not yourself)
        $users = User::whereNotIn('id', $excludedUserIds)
            ->limit(10) // Optional: limit suggestions
            ->get();

        return view('users.index', compact('users', 'requests', 'friends'));
    }

    public function send($receiverId)
    {
        $sender = Auth::user();

        if ($sender->id == $receiverId) {
            return back()->with('error', "You can't add yourself!");
        }

        // Check if friendship already exists in any direction
        $exists = Friendship::where(function ($q) use ($sender, $receiverId) {
            $q->where(function ($q2) use ($sender, $receiverId) {
                $q2->where('sender_id', $sender->id)
                   ->where('receiver_id', $receiverId);
            })->orWhere(function ($q2) use ($sender, $receiverId) {
                $q2->where('sender_id', $receiverId)
                   ->where('receiver_id', $sender->id);
            });
        })->first();

        if ($exists) {
            return back()->with('error', "Friend request already sent or received!");
        }

        Friendship::create([
            'sender_id' => $sender->id,
            'receiver_id' => $receiverId,
            'status' => 'pending'
        ]);

        return back()->with('success', "Friend request sent!");
    }

    public function accept($id)
    {
        $friendship = Friendship::findOrFail($id);

        if ($friendship->receiver_id != Auth::id()) {
            abort(403);
        }

        $friendship->update(['status' => 'accepted']);

        return back()->with('success', "Friend request accepted!");
    }

    public function reject($id)
    {
        $friendship = Friendship::findOrFail($id);

        if ($friendship->receiver_id != Auth::id()) {
            abort(403);
        }

        $friendship->delete();

        return back()->with('success', "Friend request rejected!");
    }
}