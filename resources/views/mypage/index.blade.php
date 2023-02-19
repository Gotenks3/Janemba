@extends('layouts.app')

@section('content')

<section class="text-gray-600 body-font relative">
    <x-auth-flash-message status="session('status')" />
    <div class="container  py-12 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <h1 class="mb-20">マイページ一覧</h1>
            </h2>
            <div class="text-blue-100 mb-6">
                <button type="button" onclick="location.href='{{ route('mypage.profile.index')}}'" class="w-2/3 md:w-1/3 border p-3 bg-gray-800 rounded hover:bg-gray-500">プロフィール</button>
            </div>
            <div class="text-blue-100 mb-6">
                <button type="button" onclick="location.href='{{ route('mypage.product.index')}}'" class="w-2/3 md:w-1/3 border p-3 bg-gray-800 rounded hover:bg-gray-500">商品一覧</button>
            </div>
            <div class="text-blue-100 mb-6">
                <button type="button" onclick="location.href='{{ route('mypage.email')}}'" class="w-2/3 md:w-1/3 border p-3 bg-gray-800 rounded hover:bg-gray-500">メールアドレス変更</button>
            </div>
        </div>
    </div>
</section>

@endsection