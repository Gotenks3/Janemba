@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />  


                        <form action="{{ route('product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf


                            <hr>
                            {{-- 名前、商品情報 --}}
                            <div>
                                名前:<input type="text" name="name">
                                商品情報:<input type="text" name="content">
                                料金:<input type="number" name="price">
                            </div>
                            <button class="flex ml-auto text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">商品を登録</button>

                            [これを後々実装] <br>
                            カテゴリー: 必須> <br>

                            商品の状態: 必須> <br>

                            {{-- 販売 --}}
                            <select name="is_selling" id="is_selling">
                                @foreach($sell as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>

                            {{-- 商品の状態 --}}
                            <select name="state" id="state">
                                @foreach($status as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select><br>

                        <div class="flex flex-wrap mt-7">
                            <div class="mb-5 mr-5">
                                <p>画像１</p>
                                <image-preview1-component style="width:120px; hight: 120px;"/>
                            </div>
                            <div class="mb-5">
                                <p>画像２</p>
                                <image-preview2-component style="width:120px; hight: 120px;"/>
                            </div>
                            <div class="mb-5">
                                <p>画像３</p>
                                <image-preview3-component style="width:120px; hight: 120px;"/>
                            </div>
                            <div class="mb-5">
                                <p>画像４</p>
                                <image-preview4-component style="width:120px; hight: 120px;"/>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
