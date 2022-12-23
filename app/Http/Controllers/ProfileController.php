<?php

namespace App\Http\Controllers;

use App\Enums\GenderType;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Profile;
use App\Services\ImageService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() 
    {
        // profileからリレーションで繋いだUserのidとログインしているユーザーを比較
        $profile = User::find(Auth::id())->profile;
// dd($profile->prefecture);
// dd((config('pref.$profile->prefecture')));
        return view('profile.index', compact('profile'));
    }

    public function create() 
    {
        // profileからリレーションで繋いだUserのidとログインしているユーザーを比較
        $profile = User::find(Auth::id())->profile;
        // Enum -- 性別
        $gender = GenderType::asSelectArray();

        return view('profile.create', compact('profile', 'gender'));
    }

    public function store(Request $request) 
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


        return redirect()->route('profile.index')
        ->with(['message' => 'プロフィールを登録しました。' , 'status' => 'info']);
    }
}
