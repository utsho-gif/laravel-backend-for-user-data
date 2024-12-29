<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        $users = UserProfile::all();
        return response()->json($users);
    }

    public function show($id)
    {
        $userProfile = UserProfile::find($id);
        // dd($userProfile);
        if (!$userProfile) {
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json($userProfile);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:user_profiles',
            'bio' => 'nullable|string',
        ]);

        $userProfile = UserProfile::create($validated);
        return response()->json($userProfile, 201);
    }
}
