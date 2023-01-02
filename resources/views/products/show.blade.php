@extends('layouts.app')

@section('content')

<section class="text-gray-600 body-font">
    <div class="container px-5 py-12 mx-auto flex flex-col border-2 bg-slate-50">
        <div class="lg:w-4/6 mx-auto border">
            <div class="rounded-lg h-100 overflow-hidden">

                <!-- Slider main container -->
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->

                        {{-- 画像１枚目 --}}
                        <div class="swiper-slide">
                            <img alt="content" class="object-cover " src="{{ asset('storage/products/'  . $product->image1) }}">
                        </div>
                        {{-- 画像２枚目 --}}
                        @if (isset($product->image2))
                        <div class="swiper-slide">
                            <img alt="content" class="object-cover object-center h-full w-full" src="{{ asset('storage/products/'  . $product->image2) }}">
                        </div>
                        @endif
                        {{-- 画像３枚目 --}}
                        @if (isset($product->image3))
                        <div class="swiper-slide">
                            <img alt="content" class="object-cover object-center h-full w-full" src="{{ asset('storage/products/'  . $product->image3) }}">
                        </div>
                        @endif
                        {{-- 画像４枚目 --}}
                        @if (isset($product->image4))
                        <div class="swiper-slide">
                            <img alt="content" class="object-cover object-center h-full w-full" src="{{ asset('storage/products/'  . $product->image4) }}">
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
                <div class="sm:w-1/3  sm:pr-4 sm:py-4">
                    <div class="flex justify-center">
                        @if (!is_null($product->icon))
                            <img src="{{ asset('storage/profiles/'  . $user->profile->icon) }}" alt="no-image" class="object-contain" style="border-radius: 50%; width: 200px; height: 200px;"></img>
                        @else
                            <img src="{{ asset('storage/products/'  . 'gozita.jpeg') }}" alt="no-image" class="object-fill" style="border-radius: 50%; width: 150px; height: 150px;"></img>
                        @endif
                    </div>

                    <div class="flex flex-col items-center text-center justify-center">
                        <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">{{ $user->profile->nickname }}</h2>
                        <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
                        <p class="text-base">{{ $user->profile->content }}</p>
                    </div>
                </div>
                <div class="lg:w-4/6 w-full px-4  lg:py-6 mb-6 lg:mb-0">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest">商品名</h2>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">{{ $product->name }}</h1>
                    <div class="flex mb-4">
                        <a class="flex-grow text-indigo-500 border-b-2 border-indigo-500 py-2 text-lg px-1">Description</a>
                        <a class="flex-grow border-b-2 border-gray-300 py-2 text-lg px-1">Reviews</a>
                        <a class="flex-grow border-b-2 border-gray-300 py-2 text-lg px-1">Details</a>
                    </div>
                    <p class="leading-relaxed mb-4">{{ $product->content }}</p>
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
                        <span class="text-gray-500">サイズ</span>
                        <span class="ml-auto text-gray-900">M_1_PI</span>
                    </div>
                    <div class="flex">
                        <span class="title-font font-medium text-2xl text-gray-900">{{ number_format($product->price) }}円(税込)</span>
                        <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">カートに追加</button>
                        <button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-16">
            <button type="button" onclick="location.href='{{ route('product.index')}}'" class="bg-gray-200 border-0 py-2 px-8 mr-7 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
            <button type="button" onclick="location.href='{{ route('product.edit', ['product' => $product->id])}}'" class="bg-blue-300 border-0 py-2 px-8 ml-7 focus:outline-none hover:bg-blue-400 rounded text-lg">編集する</button>
        </div>
    </div>
</section>


@endsection