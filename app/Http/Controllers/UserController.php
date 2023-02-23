<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
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
        $product_count = Product::where('user_id', Auth::id())->count();

        return view('user.show', compact('user', 'gender', 'product_count'));
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

    // フォロー解除
    public function unfollow(Request $request, User $user)
    {
        $user->followers()->detach($request->user()->id);

        return [
            'id' => $user->id,
            'countFollowers' => $user->count_followers,
        ];
    }

    public function followIndex($id)
    {
        $user = User::findOrFail($id);
        $follows = $user->follows;
        
        return view('user.follow.index',compact('follows'));
    }
}
