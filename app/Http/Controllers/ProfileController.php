<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() 
    {
        // profileからリレーションで繋いだUserのidとログインしているユーザーを比較
        $profiles = User::find(Auth::id())->profile;
        // dd($user);
        // $profile = Profile::find(Auth::id())->profile->id;

        // $profile = Profile::where('user_id', Auth::id());
    
        // dd($user);

        return view('profile.index', compact('profiles'));
    }
}
