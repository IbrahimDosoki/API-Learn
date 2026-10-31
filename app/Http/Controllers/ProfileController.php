<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id) {
        $profile = Profile::where('user_id', $id)->firstOrFail();
        return response()->json($profile);
    }
    public function store(StoreProfileRequest $request) {
        $profile = Profile::create($request->validated());
        return response()->json([
            'message' => 'Profile created successfully',
            'profile' => $profile
        ], 201);
    }
    public function update(StoreProfileRequest $request , $id){
        $validated = $request->validated();
        $profile = Profile::findOrFail($id);
        $profile->update($validated);
        return response()->json([
            'message' => 'Profile updated successfully',
            'profile' => $profile
        ]);
    }
    public function destroy($id){
        $profile = Profile::findOrFail($id);
        $profile->delete();
        return response()->json([
            'message' => 'Profile deleted successfully'
        ]);
    }
}
