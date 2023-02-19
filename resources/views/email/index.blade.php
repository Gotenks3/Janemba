@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pl-4">
            メールアドレス変更
        </h2>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <x-auth-flash-message status="session('status')" />
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form action="{{ route('mypage.email.reset')}}" method="post">
                    @csrf
                    <div class="-m-2">
                        <div class="p-2 w-3/4 mx-auto md:w-1/2">
                            <div class="relative">
                                <div class="flex">
                                    <label for="email" class="leading-7 text-sm text-gray-600">現在のメールアドレス</label>
                                </div>
                                <input type="email" value="{{ $user->email }}" disabled class="pr-14 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 pl-3 md:pr-64 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 mx-auto w-3/4 md:w-1/2">
                            <div class="relative">
                                <div class="flex">
                                    <label for="email" class="leading-7 text-sm text-gray-600">新しいメールアドレス</label>
                                </div>
                                <input type="email" name="new_email" value="{{ old('new_email') }}" required class="pr-14 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 pl-3 md:pr-64 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="flex justify-center p-2 w-1/2 mx-auto mt-3">
                            <div class="relative">
                                <button class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-700 rounded">変更する</button>
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