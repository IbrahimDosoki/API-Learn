<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function getProfile($id) {
        $profile = User::findOrFail($id)->profile;
        return response()->json($profile);
    }
}
