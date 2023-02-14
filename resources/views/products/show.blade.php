@extends('layouts.app')

@section('content')

<x-auth-flash-message status="session('status')" />

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品詳細
        </h2>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <section class="text-gray-600 body-font">
                    <div class="container mx-auto flex flex-col bg-slate-50">
                        <div class="lg:w-4/6 md:w-1/2 p-4 w-full mx-auto border">
                            <div class="rounded-lg overflow-hidden">
                                <!-- Slider main container -->
                                <div class="swiper-container">
                                    <!-- Additional required  wrapper -->
                                    <div class="swiper-wrapper">
                                        <!-- Slides -->

                                        {{-- 画像１枚目 --}}
                                        <div class="swiper-slide">
                                            <img alt="content" class="object-fill object-center h-full w-full" src="{{ asset('storage/products/'  . $product->image1) }}">
                                        </div>
                                        {{-- 画像２枚目 --}}
                                        @if (isset($product->image2))
                                        <div class="swiper-slide">
                                            <img alt="content" class="object-fill object-center h-full w-full" src="{{ asset('storage/products/'  . $product->image2) }}">
                                        </div>
                                        @endif
                                        {{-- 画像３枚目 --}}
                                        @if (isset($product->image3))
                                        <div class="swiper-slide">
                                            <img alt="content" class="object-fill object-center h-full w-full" src="{{ asset('storage/products/'  . $product->image3) }}">
                                        </div>
                                        @endif
                                        {{-- 画像４枚目 --}}
                                        @if (isset($product->image4))
                                        <div class="swiper-slide">
                                            <img alt="content" class="object-fill object-center h-full w-full" src="{{ asset('storage/products/'  . $product->image4) }}">
                                        </div>
                                        @endif

                                    </div>
                                    <!-- If we need pagination -->
                                    <div class="swiper-pagination"></div>

                                    <!-- If we need navigation buttons -->
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>

                                    <!-- If we need scrollbar -->
                                    <div class="swiper-scrollbar"></div>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row mt-10">
                                
                                <div class="lg:w-4/6 w-full px-4  lg:py-6 mb-6 lg:mb-0">
                                    <h2 class="text-sm title-font text-gray-500 tracking-widest">商品名</h2>
                                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">{{ $product->name }}</h1>
                                    <div class="flex mb-4">
                                        <a class="flex-grow text-indigo-500 border-b-2 border-indigo-500 py-2 text-lg px-1">Description</a>
                                        <a class="flex-grow border-b-2 border-gray-300 py-2 text-lg px-1">Reviews</a>
                                        <a class="flex-grow border-b-2 border-gray-300 py-2 text-lg px-1">Details</a>
                                    </div>
                                    <h2 class="text-sm title-font text-gray-500 tracking-widest">商品情報</h2>
                                    <p class="leading-relaxed mb-4 text-gray-900">{{ $product->content }}</p>
                                    <div class="flex border-t border-gray-200 py-2">
                                        <span class="text-gray-500">商品の状態</span>
                                        <span class="ml-auto text-gray-900">
                                            {{\App\Enums\ProductState::getDescription($product->state)}}
                                        </span>
                                    </div>
                                    <div class="flex border-t border-gray-200 py-2">
                                        <span class="text-gray-500">販売有無</span>
                                        <span class="ml-auto text-gray-900">
                                            {{\App\Enums\ProductSelling::getDescription($product->is_selling)}}
                                        </span>

                                    </div>
                                    <div class="flex border-t border-b mb-6 border-gray-200 py-2">
                                        <span class="text-gray-500">カテゴリー</span>
                                        <span class="ml-auto text-gray-900">
                                            {{ $product->category->name }}
                                        </span>
                                    </div>

                                    {{-- cart --}}
                                    <div class="flex justify-center mb-4">
                                        <div class="ml-4">
                                            <form action="{{ route('product.cart.add',['product' => $product->id])}}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <label for="amount" class="leading-7 text-sm text-gray-600">数量:</label>
                                                <input type="number" id="amount" name="amount" value="1" min="1" max="100" class="bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                                                <input type="hidden" name="product_id" value="{{ $product->id}}">
                                                <button type="submit" class="ml-4 text-white bg-green-600 border-0 py-2 px-6 focus:outline-none hover:bg-green-400 rounded">カートに追加</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="flex justify-center">
                                        <span class="title-font font-medium text-2xl text-gray-900">{{ number_format($product->price) }}円(税込)</span>
                                        <like-component :initial-is-liked-by='@json($product->isLikedBy(Auth::user()))' :initial-count-likes='@json($product->count_likes)' endpoint="{{ route('product.like', ['product' => $product]) }}" />
                                    </div>
                                </div>

                                <div class="sm:w-1/3  sm:pr-4 sm:py-4">
                                    @if ($user->profile)
                                    <h2 class="text-sm title-font text-gray-500 tracking-widest mb-3 text-center">-出品者情報-</h2>

                                    <a href="{{ route('user.show', ['id' => $user->id]) }}">
                                        <div class="flex justify-center">
                                            @if (!is_null($user->profile->icon))
                                            <img src="{{ asset('storage/profiles/'  . $user->profile->icon) }}" alt="no-image" class="object-fill" style="border-radius: 50%; width: 200px; height: 200px;"></img>
                                            @else
                                            <img src="{{ asset('storage/products/'  . 'gozita.jpeg') }}" alt="no-image" class="object-fill" style="border-radius: 50%; width: 150px; height: 150px;"></img>
                                            @endif
                                        </div>
                                    </a>
                                    <div class="flex flex-col items-center text-center justify-center">
                                        <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">{{ $user->profile->nickname }}</h2>
                                        <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
                                        <p class="text-base">{{ $user->profile->content }}</p>
                                    </div>
                                    @else
                                    プロフィールが登録されていません。
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center mt-16">
                            <button type="button" onclick="location.href='{{ route('home')}}'" class="bg-gray-200 border-0 py-2 px-8 mr-7 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                            <button type="button" onclick="location.href='{{ route('product.edit', ['product' => $product->id])}}'" class="bg-blue-300 border-0 py-2 px-8 ml-7 focus:outline-none hover:bg-blue-400 rounded text-lg">編集する</button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<div is="script">
var mySwiper = new Swiper(".swiper-container", {
            // オプション設定
            loop: true, // ループ
            speed: 600, // 切り替えスピード(ミリ秒)。
            slidesPerView: 1, // １スライドの表示数
            spaceBetween: 0, // スライドの余白(px)
            direction: "horizontal", // スライド方向
            effect: "coverflow", // スライド効果 ※ここを変更

            // ページネーションを有効化
            pagination: {
                el: ".swiper-pagination",
            },

            // ナビゲーションを有効化
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
</div>

<div is="style">
.swiper-container {
    height: 300px;
  }

</div>
    

@endsection