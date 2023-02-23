<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Stock;
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

    public function checkout()
    {
        $user = User::findOrFail(Auth::id());
        $products = $user->products;
        
        $line_Items = [];
        foreach($products as $product){
            $amount = '';
            $amount = Stock::where('product_id', $product->id)->sum('quantity');

            if($product->pivot->amount > $amount){
                return redirect()->route('product.cart.index');
            } else {
                $line_Item = [
                    'price_data' => [
                        'currency' => 'jpy',
                        'unit_amount' => $product->price,
                        'product_data' => [
                          'name' => $product->name,
                          'description' => $product->content,
                        ],
                      ],
                    'quantity' => $product->pivot->amount,    
                ];
                array_push($line_Items, $line_Item);    
            }
        }

        foreach($products as $product){
            Stock::create([
                'product_id' => $product->id,
                'type' => 2,
                'quantity' => $product->pivot->amount * -1
            ]);
        }

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [$line_Items],
            'mode' => 'payment',
            'success_url' => route('product.cart.success'),
            'cancel_url' => route('product.cart.cancel'),
        ]);

        $publicKey = env('STRIPE_PUBLIC_KEY');

        return view('carts.checkout', 
            compact('session', 'publicKey'));
    }

    public function success()
    {
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('home');
    }

    public function cancel()
    {
        $user = User::findOrFail(Auth::id());

        foreach($user->products as $product){
            Stock::create([
                'product_id' => $product->id,
                'type' => \Constant::PRODUCT_LIST['add'],
                'quantity' => $product->pivot->amount,
            ]);
        }

        return redirect()->route('product.cart.index');
    }
}
