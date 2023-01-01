@extends('layouts.app')

@section('content')

<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-12 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <h1 class="mb-20">マイページ一覧</h1>
            </h2>
            <div class="text-blue-100 mb-6">
                <button type="button" onclick="location.href='{{ route('profile.index')}}'" class="border w-2/6 p-3 bg-gray-800 rounded hover:bg-gray-500">プロフィール</button>
            </div>
            <div class="text-blue-100 mb-6">
                <button class="border w-2/6 p-3 bg-gray-800 rounded hover:bg-gray-500" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</button>
            </div>
            <div class="text-blue-100 mb-6">
                <button type="button" onclick="location.href='{{ route('email')}}'" class="border w-2/6 p-3 bg-gray-800 rounded hover:bg-gray-500">メールアドレス変更</button>
            </div>
        </div>
    </div>
</section>

@endsection