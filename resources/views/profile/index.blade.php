@extends('layouts.app')

@section('content')

<section class="pt-4 bg-blueGray-50">
    <x-auth-flash-message status="session('status')" /> 
    <div class="w-full lg:w-3/6 px-4 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-4">
            <div class="px-6">
                <div class="flex flex-wrap justify-center">
                @if (is_null($profile))
                    <h3>
                        ＊プロフィールが登録されていません。<br>
                        <button type="button" onclick="location.href='{{ route('profile.create')}}'" class="bg-blue-200 border-0 py-2 px-8 mr-7 focus:outline-none hover:bg-gray-400 rounded text-lg">登録はこちら</button>
                    </h3>
                @else
                    <div class="w-full px-4 flex justify-center">
                        <div class="relative">
                            <img src="{{ asset('storage/profiles/'  . $profile->icon) }}" alt="no-image" class="object-fill" style="border-radius: 50%; width: 200px; height: 200px;">
                        </div>
                    </div>
                    <div class="w-full px-4 text-center mt-6">
                        <div class="flex justify-center py-4 lg:pt-4 pt-8">
                            <div class="mr-4 p-3 text-center">
                                <a href="" class="no-underline">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                        22
                                    </span>
                                    <span class="text-sm text-blueGray-400">フォロー</span>
                                </a>
                            </div>
                            <div class="mr-4 p-3 text-center">
                                <a href="" class="no-underline">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                        10
                                    </span>
                                    <span class="text-sm text-blueGray-400">フォロワー</span>
                                </a>
                            </div>
                            <div class="lg:mr-4 p-3 text-center">
                                <a href="" class="no-underline">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                        89
                                    </span>
                                    <span class="text-sm text-blueGray-400">商品</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-6">
                    <h3 class="text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                        {{$profile->nickname}}
                    </h3>
                    <div class="mb-2 text-blueGray-600 mt-10">

                        <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                        @foreach(config('pref') as $pref_id => $name)
                                @if ($pref_id === $profile->prefecture)
                                    {{ $name }}
                                @endif
                        @endforeach
                    </div>
                    <div class="mb-2 text-blueGray-600 mt-10">
                        <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>
                        21
                    </div>
                    <div class="mb-2 text-blueGray-600">
                        <i class="fas fa-university mr-2 text-lg text-blueGray-400"></i>
                        {{\App\Enums\GenderType::getDescription($profile->gender)}}
                    </div>
                </div>
                <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full lg:w-9/12 px-4">
                            <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                                {{ $profile->content }}
                            </p>
                            <a href="javascript:void(0);" class="font-normal text-pink-500">
                                Show more
                            </a>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
    <footer class="relative  pt-8 pb-6 mt-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center md:justify-between justify-center">
                <div class="w-full md:w-6/12 px-4 mx-auto text-center">
                    <div class="text-sm text-blueGray-500 font-semibold py-1">
                        Made with <a href="https://www.creative-tim.com/product/notus-js" class="text-blueGray-500 hover:text-gray-800" target="_blank">Notus JS</a> by <a href="https://www.creative-tim.com" class="text-blueGray-500 hover:text-blueGray-800" target="_blank"> Creative Tim</a>.
                    </div>
                </div>
            </div>
        </div>
    </footer>
</section>


@endsection