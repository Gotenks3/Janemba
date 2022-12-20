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
                            <button type="button" onclick="location.href='{{ route('product.show',['product' => $product->id])}}'" class="bg-gray-200 border-0 py-2 px-8 mr-7 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                            <button class="flex ml-auto text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">商品を登録</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    
@endsection
