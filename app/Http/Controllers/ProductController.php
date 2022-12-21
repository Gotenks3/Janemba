<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Enums\ProductState;
use App\Enums\ProductSelling;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use App\Services\ImageService;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index() 
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show($product)
    {
        $product = Product::findOrFail($product);

        return view('products.show', compact('product'));
    }

    public function create() 
    {
        $status = ProductState::asSelectArray();
        $sell = ProductSelling::asSelectArray();

        return view('products.create', compact('status','sell'));
    }

    public function store(ProductCreateRequest $request)
    {
        $imageFile1 = $request->image1;
        $imageFile2 = $request->image2;
        $imageFile3 = $request->image3;
        $imageFile4 = $request->image4;

        // 画像1枚目は必須で登録するためNull判定なし
        $fileNameToStore1 = ImageService::upload($imageFile1, 'products');   
        // 画像２枚目処理
        if (is_null($imageFile2)){
            $fileNameToStore2 = null;
        } else {
            $fileNameToStore2 = ImageService::upload($imageFile2, 'products');   
        }
        // 画像3枚目処理
        if (is_null($imageFile3)){
            $fileNameToStore3 = null;
        } else {
            $fileNameToStore3 = ImageService::upload($imageFile3, 'products');   
        }
        // 画像4枚目処理
        if (is_null($imageFile4)){
            $fileNameToStore4 = null;
        } else {
            $fileNameToStore4 = ImageService::upload($imageFile4, 'products');   
        }

        try {
            Product::create([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'content' => $request->content,
                'image1' => $fileNameToStore1,
                'image2' => $fileNameToStore2,
                'image3' => $fileNameToStore3,
                'image4' => $fileNameToStore4,
                'state' => $request->state,
                'price' => $request->price,
                'is_selling' => $request->is_selling
            ]);
            } catch (\Exception $e) {
                $e->getMessage();
                session()->flash('flash_message', '更新が失敗しました');
            }


        return redirect()->route('product.index')
        ->with(['message' => '商品を登録しました。' , 'status' => 'info']);
    }

    public function edit($product)
    {
        $product = Product::findOrFail($product);

        $status = ProductState::asSelectArray();
        $sell = ProductSelling::asSelectArray();

        return view('products.edit', compact('product', 'status', 'sell'));
    }

    public function update(ProductUpdateRequest $request, $product)
    {
        $product = Product::findOrFail($product);

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
        if (is_null($imageFile2)){
            if (is_null($product->image2)) {
                $fileNameToStore2 = null;
            } else {
                $fileNameToStore2 = $product->image2;
            }
        } else {
            $fileNameToStore2 = ImageService::upload($imageFile2, 'products');
        }

        // 画像3枚目処理
        if (is_null($imageFile3)){
            if (is_null($product->image3)) {
                $fileNameToStore3 = null;
            } else {
                $fileNameToStore3= $product->image3;
            }
        } else {
            $fileNameToStore3 = ImageService::upload($imageFile3, 'products');
        }
        // 画像4枚目処理
        if (is_null($imageFile4)){
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
                'content' => $request->content,
                'image1' => $fileNameToStore1,
                'image2' => $fileNameToStore2,
                'image3' => $fileNameToStore3,
                'image4' => $fileNameToStore4,
                'state' => $request->state,
                'price' => $request->price,
                'is_selling' => $request->is_selling
            ])->save();
            } catch (\Exception $e) {
                $e->getMessage();
                session()->flash('flash_message', '更新が失敗しました');
            }

        return redirect()
        ->route('product.index')
        ->with(['message' => '商品情報を更新しました。','status' => 'info']);
    }

    public function destroy($product)
    {
        $product = Product::findOrFail($product);

        $product->delete();
        return redirect()->route('product.index')
        ->with(['message' => '商品を削除しました。', 'status' => 'alert']);

    }
}
