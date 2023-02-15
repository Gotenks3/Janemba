<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $products = $user->products;
        $totalPrice = 0;

        foreach($products as $product){
            $totalPrice += $product->price * $product->pivot->amount;
        }

        return view('carts.index', compact('user', 'products', 'totalPrice'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $itemInCart = Cart::where('product_id', $request->product_id)
        ->where('user_id', Auth::id())->first();
        
        // dd($check);
        if($itemInCart){
            $itemInCart->amount += $request->amount;
            $itemInCart->save();
        } else{
            try {
                Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $request->product_id,
                    'amount' => $request->amount,
                ]);
            } catch (\Exception $e) {
                $e->getMessage();
                session()->flash('flash_message', 'カート登録が失敗しました');
            }
        }



        return redirect()->route('product.show', $product->id)
            ->with(['message' => 'カートに追加しました。', 'status' => 'info']);
    }

    public function delete($id)
    {
        Cart::where('product_id', $id)
        ->where('user_id', Auth::id())
        ->delete();

        return redirect()->route('product.cart.index');
    }
}
