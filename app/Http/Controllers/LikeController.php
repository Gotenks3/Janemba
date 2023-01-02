<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class LikeController extends Controller
{
    public function store($productId)
    {
        Auth::user()->like($productId);
        dd(1);
        return 'ok!'; //レスポンス内容
    }

    public function destroy($productId)
    {
        Auth::user()->unlike($productId);
        dd(2);
        return 'ok!'; //レスポンス内容
    }
}