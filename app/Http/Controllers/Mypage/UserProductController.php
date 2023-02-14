<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PrimaryCategory;
use App\Models\Stock;
use App\Models\User;
use App\Enums\ProductState;
use App\Enums\ProductSelling;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use App\Services\ImageService;
use Illuminate\Support\Facades\Auth;

class UserProductController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', Auth::id())->paginate(6);

        return view('mypage.product.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        
        $product_sell = ProductSelling::asSelectArray($product->is_selling);

        // ユーザー情報取得
        $user = User::where('id', $product->user_id)->with('profile')->first();

        return view('mypage.product.show', compact('product', 'user', 'product_sell'));
    }

    public function edit($id)
    {        
        $product = Product::with('stock')->findOrFail($id);

        // ProductPolicyを設定
        $this->authorize('update', $product);

        $status = ProductState::asSelectArray();
        $sell = ProductSelling::asSelectArray();
        $categories = PrimaryCategory::with('secondary')->get();
        $quantity = Stock::where('product_id', $product->id)
            ->sum('quantity');
        
        return view('mypage.product.edit', compact('product', 'status', 'sell', 'categories', 'quantity'));
    }

    public function update(ProductUpdateRequest $request, $product)
    {
        $product = Product::findOrFail($product);
        $stock = $product->stock;
        
        $imageFile1 = $request->image1;
        $imageFile2 = $request->image2;
        $imageFile3 = $request->image3;
        $imageFile4 = $request->image4;

        // 画像1枚目の処理($imageFile1があったら変更)
        if ($imageFile1) {
            $fileNameToStore1 = ImageService::upload($imageFile1, 'products');
        } else {
            $fileNameToStore1 = $product->image1;
        }
        // 画像２枚目処理
        if (is_null($imageFile2)) {
            if (is_null($product->image2)) {
                $fileNameToStore2 = null;
            } else {
                $fileNameToStore2 = $product->image2;
            }
        } else {
            $fileNameToStore2 = ImageService::upload($imageFile2, 'products');
        }

        // 画像3枚目処理
        if (is_null($imageFile3)) {
            if (is_null($product->image3)) {
                $fileNameToStore3 = null;
            } else {
                $fileNameToStore3 = $product->image3;
            }
        } else {
            $fileNameToStore3 = ImageService::upload($imageFile3, 'products');
        }
        // 画像4枚目処理
        if (is_null($imageFile4)) {
            if (is_null($product->image4)) {
                $fileNameToStore4 = null;
            } else {
                $fileNameToStore4 = $product->image4;
            }
        } else {
            $fileNameToStore4 = ImageService::upload($imageFile4, 'products');
        }

        try {
            $product->fill([
                'name' => $request->name,
                'secondary_category_id' => $request->category,
                'content' => $request->content,
                'image1' => $fileNameToStore1,
                'image2' => $fileNameToStore2,
                'image3' => $fileNameToStore3,
                'image4' => $fileNameToStore4,
                'state' => $request->state,
                'price' => $request->price,
                'is_selling' => $request->is_selling
            ])->save();

            if($request->type == 1){
                $newQuantity = $request->quantity;
            }
            if($request->type == 2){
                $newQuantity = $request->quantity * -1;
            }

            Stock::create([
                'product_id' => $product->id,
                'type' => $request->type,
                'quantity' => $newQuantity
            ]);
            
        } catch (\Exception $e) {
            $e->getMessage();
            session()->flash('flash_message', '更新が失敗しました');
        }

        return redirect()
            ->route('user.product.index')
            ->with(['message' => '商品情報を更新しました。', 'status' => 'info']);
    }

    public function destroy($product)
    {
        $product = Product::findOrFail($product);
        $product->delete();
        return redirect()->route('user.product.index')
            ->with(['message' => '商品を削除しました。', 'status' => 'alert']);
    }
    
}
