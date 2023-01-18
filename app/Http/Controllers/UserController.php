<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Enums\GenderType;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function mypage()
    {
        return view('mypage.index');
    }

    public function show($id)
    {
        // dd(1);
        // $user = User::find($id);
        // dd(Auth::user());
        // dd($user->isFollowedBy(Auth::user()));
        
        $user = User::with('profile')->findOrFail($id);
        // dd($user);
        $gender = GenderType::asSelectArray();

        // dd($profileShow);

        return view('user.show', compact('user','gender'));
    }
}
