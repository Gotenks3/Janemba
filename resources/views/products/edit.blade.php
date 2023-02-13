@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品編集
        </h2>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <x-auth-flash-message status="session('status')" />
                <form action="{{ route('product.update',['product' => $product->id])}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="-m-2">
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <div class="flex">
                                    <label for="name" class="leading-7 text-sm text-gray-600">商品名</label>
                                    <p class="text-red-400 ml-3 pt-px">※必須</p>
                                </div>
                                <input type="text" id="name" name="name" value="{{ $product->name }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>


                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <div class="flex">
                                    <label for="message" class="leading-7 text-sm text-gray-600">商品内容</label>
                                    <p class="text-red-400 ml-3 pt-px">※必須</p>
                                </div>
                                <textarea id="content" name="content" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $product->content }}</textarea>
                            </div>
                        </div>
                        {{-- component読み込み --}}
                        <x-product-image-display :product="$product" />

                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <div class="flex">
                                    <label for="message" class="leading-7 text-sm text-gray-600">販売状況</label>
                                </div>
                                <select name="is_selling" id="is_selling" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @foreach($sell as $key => $value)
                                    <option value="{{$key}}" @if( $product->is_selling === $key ) selected @endif >{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <div class="flex">
                                    <label for="message" class="leading-7 text-sm text-gray-600">料金</label>
                                    <p class="text-red-400 ml-3 pt-px">※必須</p>
                                </div>
                                <input type="number" id="price" name="price" value="{{ $product->price }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <div class="flex">
                                    <label for="message" class="leading-7 text-sm text-gray-600">商品の状態</label>
                                    <p class="text-red-400 ml-3 pt-px">※必須</p>
                                </div>
                                <select name="state" id="state" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @foreach($status as $key => $value)
                                    <option value="{{$key}}" @if( $product->state === $key ) selected @endif>{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <div class="flex">
                                    <label for="category" class="leading-7 text-sm text-gray-600">カテゴリー</label>
                                    <p class="text-red-400 ml-3 pt-px">※必須</p>
                                </div>
                                <select name="category" id="category" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @foreach($categories as $category)
                                    <optgroup label="{{ $category->name }}">
                                        @foreach($category->secondary as $secondary)
                                        <option value="{{ $secondary->id}}" @if ($secondary->id === $product->secondary_category_id) selected @endif>
                                            {{ $secondary->name }}
                                        </option>
                                        @endforeach
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- 在庫数(stock) --}}
                        <div class="w-1/2 p-2 mx-auto">
                            <div class="relative">
                                <label for="current_quantity" class="text-sm leading-7 text-gray-600">現在の在庫</label>
                                <input type="hidden" id="current_quantity" name="current_quantity" value="{{ $quantity }}">
                                <div class="w-full px-3 py-1 text-base leading-8 text-gray-700 bg-gray-100 bg-opacity-50 rounded outline-none">{{ $quantity }}</div>
                            </div>
                        </div>
                        <div class="w-1/2 p-2 mx-auto">
                            <div class="relative flex justify-around">
                                <div><input type="radio" name="type" value="1" class="mr-2" checked>追加</div>
                                <div><input type="radio" name="type" value="2" class="mr-2">削減</div>
                            </div>
                        </div>
                        <div class="w-1/2 p-2 mx-auto">
                            <div class="relative">
                                <label for="quantity" class="text-sm leading-7 text-gray-600">数量 ※必須</label>
                                <input type="number" id="quantity" name="quantity" value="0" required class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                                <span class="text-sm">※0〜99の範囲で入力してください</span>
                            </div>
                        </div>

                        <div class="flex justify-center mt-16">

                            <button type="button" onclick="location.href='{{ route('product.show',['product' => $product->id])}}'" class="bg-gray-200 border-0 py-2 px-8 mr-7 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                            <button class="bg-blue-300 border-0 py-2 px-8 ml-7 focus:outline-none hover:bg-blue-400 rounded text-lg">更新する</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection