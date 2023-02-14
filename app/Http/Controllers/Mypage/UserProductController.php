<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class UserProductController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', Auth::id())->paginate(6);

        return view('mypage.product.index', compact('products'));
    }
}
