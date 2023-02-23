<?php

namespace App\Http\Controllers;

use App\Enums\GenderType;
use App\Http\Requests\ProfileCreateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\Product;
use App\Models\Profile;
use App\Services\ImageService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::with('profile')->findOrFail(Auth::id());
        $product_count = Product::where('user_id', Auth::id())->count();
        
        return view('profile.index', compact('user', 'product_count'));
    }

    public function create()
    {
        $profile = User::find(Auth::id())->profile;
        $gender = GenderType::asSelectArray();

        return view('profile.create', compact('profile', 'gender'));
    }

    public function store(ProfileCreateRequest $request)
    {
        $imageFile = $request->icon;

        $fileNameToStore1 = ImageService::upload($imageFile, 'profiles');

        try {
            Profile::create([
                'user_id' => Auth::id(),
                'nickname' => $request->nickname,
                'content' => $request->content,
                'icon' => $fileNameToStore1,
                'prefecture' => $request->prefecture,
                'gender' => $request->gender,
                'age' => $request->age
            ]);
        } catch (\Exception $e) {
            $e->getMessage();
            session()->flash('flash_message', 'プロフィール登録が失敗しました');
        }


        return redirect()->route('home');
    }

    public function edit()
    {
        $profile = User::find(Auth::id())->profile;
        $gender = GenderType::asSelectArray();

        return view('profile.edit', compact('profile', 'gender'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $profile = User::find(Auth::id())->profile;

        $requestIcon = $request->icon;

        // dd($icon, $profile->icon);
        // 念のためのif判定
        if ($requestIcon) {
            // dd(1);
            $fileNameToStore1 = ImageService::upload($requestIcon, 'profiles');
        } else {
            $fileNameToStore1 = $profile->icon;
        }

        try {
            $profile->fill([
                'nickname' => $request->nickname,
                'content' => $request->content,
                'icon' => $fileNameToStore1,
                'prefecture' => $request->prefecture,
                'gender' => $request->gender,
                'age' => $request->age
            ])->save();
        } catch (\Exception $e) {
            $e->getMessage();
            session()->flash('flash_message', 'プロフィール更新が失敗しました');
        }

        return redirect()
        ->route('mypage.profile.index')
        ->with(['message' => 'プロフィールを更新しました。','status' => 'info']);
    }

    public function followIndex()
    {
        $user = User::findOrFail(Auth::id());
        $follows = $user->follows;
        
        return view('profile.follow.index',compact('follows'));
    }

    public function followerIndex()
    {
        $user = User::findOrFail(Auth::id());
        $followers = $user->followers;
        
        return view('profile.follower.index',compact('followers'));
    }
}
