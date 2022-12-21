@extends('layouts.app')
@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <x-auth-validation-errors class="mb-4" :errors="$errors" />


                <form action="{{ route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf


                    <hr>
                    {{-- 名前、商品情報 --}}
                    <div class="-m-2">
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">商品名 ※必須</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">

                            <div class="relative">
                                <label for="information" class="leading-7 text-sm text-gray-600">商品情報 ※必須</label>
                                <textarea id="information" name="content" rows="10" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ old('content') }}</textarea>
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">

                            <div class="relative">
                                <label for="price" class="leading-7 text-sm text-gray-600">価格 ※必須</label>
                                <input type="number" id="price" name="price" value="{{ old('price') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>


                        <button class="flex ml-auto text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">商品を登録</button>

                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative text-blue-300">
                                [これを後々実装] <br>
                                カテゴリー: 必須> <br>

                                商品の状態: 必須> <br>
                            </div>
                        </div>


                        {{-- 販売 --}}
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="state" class="leading-7 text-sm text-gray-600">販売</label>

                                <select name="is_selling" id="is_selling" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @foreach($sell as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        {{-- 商品の状態 --}}
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="state" class="leading-7 text-sm text-gray-600">商品の状態</label>
                                <select name="state" id="state" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @foreach($status as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="p-2 w-1/2 mx-auto">
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
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <div class="mb-5 mr-5">
                                    <p>画像１</p>
                                    <image-preview1-component class="lex-nowrap" style="width:120px; hight: 120px;" />
                                </div>
                                <div class="mb-5">
                                    <p>画像２</p>
                                    <image-preview2-component style="width:120px; hight: 120px;" />
                                </div>
                                <div class="mb-5">
                                    <p>画像３</p>
                                    <image-preview3-component style="width:120px; hight: 120px;" />
                                </div>
                                <div class="mb-5">
                                    <p>画像４</p>
                                    <image-preview4-component style="width:120px; hight: 120px;" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection