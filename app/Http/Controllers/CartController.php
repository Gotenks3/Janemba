<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        try {
            Profile::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'amount' => $request->amount,
            ]);
        } catch (\Exception $e) {
            $e->getMessage();
            session()->flash('flash_message', 'カート登録が失敗しました');
        }
    }
}
