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
        // 「商品画像」　「商品名」 「数量(amount)」 「カートの合計」　「全てのカートの合計」
        // デフォルトでは、「カートに商品が入っていません」と表示
        // dd(Auth::id(),$product->id,$request->amount);

        // product->image,
        // product->name,
        // prodcut->cart->amount,
        // sam(product->cart->amount)
        $user = User::findOrFail(Auth::id());
        $products = $user->products;
        dd($user->pivot->amount);

        // $product = Product::get('id');
        // dd($products);
        $cart = Cart::where('user_id', $user->id)->get();
        // $product = Cart::where('product_id', $product->id)->get();

        // 合計値取得
        dd($cart->sum('amount'), $product);
        return view('carts.index', campact('cart'));
    }

    public function add(Request $request, $product)
    {
        $product = Product::findOrFail($product);
        
// dd($request->product_);
        // cartに追加したときに在庫も同時に減らす
        // cartに追加したときにカートに入れる分の在庫があるか、確認
        // 「カートを追加」を連続して押してもamountが追加される

        // もし、同じproduct_idが存在していたら作成ではなく、更新する
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
}
