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
        $user = User::with('profile')->findOrFail($id);
        $gender = GenderType::asSelectArray();

        return view('user.show', compact('user', 'gender'));
    }

    // フォロー機能
    public function follow(Request $request, User $user)
    {
        $user->followers()->detach($request->user()->id);
        $user->followers()->attach($request->user()->id);

        return [
            'id' => $user->id,
            'countFollowers' => $user->count_followers,
        ];
    }

    public function unfollow(Request $request, User $user)
    {
        $user->followers()->detach($request->user()->id);

        return [
            'id' => $user->id,
            'countFollowers' => $user->count_followers,
        ];
    }
}
