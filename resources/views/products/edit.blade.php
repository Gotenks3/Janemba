@extends('layouts.app')

@section('content')

<section class="text-gray-600 body-font relative">
    <form action="{{ route('product.update',['product' => $product->id])}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">編集画面</h1>
            </div>
            <div class="lg:w-1/2 md:w-2/3 mx-auto">

                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <x-auth-flash-message status="session('status')" />
                <div class="flex flex-wrap -m-2">
                    <div class="p-2 w-2/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">商品名</label>
                            <input type="text" id="name" name="name" value="{{ $product->name }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="message" class="leading-7 text-sm text-gray-600">商品内容</label>
                            <textarea id="content" name="content" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $product->content }}</textarea>
                        </div>
                    </div>
                    {{-- component読み込み --}}
                    <x-product-image-display :product="$product" />
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="message" class="leading-7 text-sm text-gray-600">販売状況</label>
                            <select name="is_selling" id="is_selling" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                @foreach($sell as $key => $value)
                                <option value="{{$key}}" @if( $product->is_selling === $key ) selected @endif >{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="message" class="leading-7 text-sm text-gray-600">料金</label>
                            <input type="number" id="price" name="price" value="{{ $product->price }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="message" class="leading-7 text-sm text-gray-600">商品の状態</label>
                            <select name="state" id="state" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                @foreach($status as $key => $value)
                                <option value="{{$key}}" @if( $product->state === $key ) selected @endif>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="category" class="leading-7 text-sm text-gray-600">カテゴリー</label>
                            <select name="category" id="category" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                @foreach($categories as $category)
                                <optgroup label="{{ $category->name }}">
                                    @foreach($category->secondary as $secondary)
                                    <option value="{{ $secondary->id}}">
                                        {{ $secondary->name }}
                                    </option>
                                    @endforeach
                                    @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- 在庫数(stock) --}}
                    <div class="p-2 w-full">
                        <div class="w-1/6 relative flex justify-around">
                            <input type="radio" id="type" name="type" value="1" checked>
                            <label for="type">追加</label>
                            <input type="radio" id="type" name="type" value="2">
                            <label for="type">削減</label>
                        </div>
                    </div>

                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                            <label for="current_quantity" class="leading-7 text-sm text-gray-600">現在の在庫数</label>
                            <input type="hidden"  class="w-full bg-gray-300 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"/>
                            <div>{{ $quantity }}</div>
                        </div>
                    </div>

                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                            <label for="quantity" class="leading-7 text-sm text-gray-600">入出庫</label>
                            <input type="number" id="quantity" name="quantity" min="1" max="100" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                </div>

                <div class="p-2 w-full">
                    <button type="button" onclick="location.href='{{ route('product.show',['product' => $product->id])}}'" class="bg-gray-200 border-0 py-2 px-8 mr-7 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                    <button class="flex ml-auto text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">商品を登録</button>
                </div>
            </div>
        </div>
    </form>

    {{-- <form class="delete" method="delete" action="{{ route('product.destroy', ['product' => $product->id]) }}">
    @csrf
    @method('delete')
    <input type="submit" value="削除" class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-800 rounded">
    </form> --}}

    <delete-alert-component :product='@json($product)' endpoint="{{ route('product.destroy', ['product' => $product->id]) }}" />

</section>
@endsection