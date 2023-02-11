@extends('layouts.app')
@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            プロフィール編集
        </h2>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form action="{{ route('profile.update')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- 名前、商品情報 --}}
                    <div class="-m-2">
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <div class="flex">
                                    <label for="nickname" class="leading-7 text-sm text-gray-600">商品名</label>
                                    <p class="text-red-400 ml-3 pt-1">※必須</p>
                                </div>
                                <input type="text" id="nickname" name="nickname" value="{{ $profile->nickname }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                            </div>
                        </div>

                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <div class="flex">
                                    <label for="message" class="leading-7 text-sm text-gray-600">自己紹介</label>
                                    <p class="text-red-400 ml-3 pt-1">※必須</p>
                                </div>
                                <textarea id="content" name="content" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $profile->content }}</textarea>

                            </div>
                        </div>

                        {{-- 画像 --}}
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <div class="flex">
                                    <label for="icon" class="leading-7 text-sm text-gray-600">アイコン画像</label>
                                    <p class="text-red-400 ml-3 pt-px">※必須</p>
                                </div>
                                <div> <img src="{{ asset('storage/profiles/'  . $profile->icon) }}" alt="{{ $profile->icon }}" class="lg:w-64 md:w-3/6 w-4/6 mb-10 object-cover object-center rounded"></div>
                                <input type="file" name="icon" value="ブロリー" accept=“image/png,image/jpeg,image/jpg” class="mb-12">
                            </div>
                        </div>

                        {{-- 都道府県 --}}
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <div class="flex">
                                    <label for="prefecture" class="leading-7 text-sm text-gray-600">都道府県</label>
                                    <p class="text-red-400 ml-3 pt-px">※必須</p>
                                </div>

                                <select name="prefecture" id="prefecture" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @foreach(config('pref') as $pref_id => $name)
                                    <option value="{{ $pref_id }}" @if ($profile->prefecture === $pref_id ) selected @endif>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- 性別 --}}
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <div class="flex">
                                    <label for="gender" class="leading-7 text-sm text-gray-600">性別</label>

                                    <p class="text-red-400 ml-3 pt-px">※必須</p>
                                </div>
                                <select name="gender" id="gender" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @foreach($gender as $key => $value)
                                    <option value="{{$key}}" @if ($profile->gender == $key) selected @endif>{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- 年齢 --}}
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <div class="flex">
                                    <label for="age" class="leading-7 text-sm text-gray-600">年齢</label>
                                    <p class="text-red-400 ml-3 pt-px">※必須</p>
                                </div>
                                <select name="age" id="gender" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @for ($i=10; $i <= 80; $i++) <option value="{{ $i }}" @if ($profile->age == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>

                        <div class="p-2 w-1/2 mx-auto">
                            <div class="flex">
                                <button type="button" onclick="location.href='{{ route('profile.index')}}'" class="bg-gray-200 border-0 py-2 px-8 mr-7 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                                <button class="bg-blue-200 border-0 py-2 px-8 mr-7 focus:outline-none hover:bg-blue-400 rounded text-lg">更新</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection