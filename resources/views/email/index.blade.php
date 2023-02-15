@extends('layouts.app')

@section('content')

<div class="py-12">
    <x-auth-flash-message status="session('status')" />
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="card">
                    <div class="card-header">メールアドレス変更</div>

                    <form action="{{ route('mypage.email.reset')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="-m-2">
                                <div class="p-2 w-1/2 mb-8 mx-auto">
                                    <div class="relative">
                                        <div class="flex">
                                            <label for="email" class="leading-7 text-sm text-gray-600">現在のメールアドレス</label>
                                        </div>
                                        <input type="email" value="{{ $user->email }}" disabled class="bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 pl-3 pr-64 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                            </div>
                            <div class="-m-2">
                                <div class="p-2 w-1/2 mb-8 mx-auto">
                                    <div class="relative">
                                        <div class="flex">
                                            <label for="email" class="leading-7 text-sm text-gray-600">新規メールアドレスを入力してください</label>
                                        </div>
                                        <input type="email" name="new_email" value="{{ old('new_email') }}" required class="bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 pl-3 pr-64 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                            </div>
                            <div class="-m-2">
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <button class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-700 rounded">変更する</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection