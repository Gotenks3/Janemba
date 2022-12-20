@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-5">
                                <input type="file" required name="image1" accept=“image/png,image/jpeg,image/jpg” >
                                <input type="file" name="image2" accept=“image/png,image/jpeg,image/jpg” >
                                <input type="file" name="image3" accept=“image/png,image/jpeg,image/jpg” >
                                <input type="file" name="image4" accept=“image/png,image/jpeg,image/jpg” >
                            </div>

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
                            </select>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
