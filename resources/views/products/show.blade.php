@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 mx-auto">
                            <div class="flex flex-wrap">
                                <!-- Slider main container -->
                                <div class="swiper">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">
                                        <!-- Slides -->

                                        {{-- 画像１枚目 --}}
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/products/'  . $product->image1) }}" alt="{{ $product->image1 }}" class="lg:w-6/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded">
                                        </div>
                                        {{-- 画像２枚目 --}}
                                        @if (isset($product->image2))
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/products/'  . $product->image2) }}" alt="{{ $product->image2 }}" class="lg:w-6/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded">
                                        </div>
                                        @endif
                                        {{-- 画像３枚目 --}}
                                        @if (isset($product->image3))
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/products/'  . $product->image3) }}" alt="{{ $product->image3 }}" class="lg:w-6/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded">
                                        </div>
                                        @endif
                                        {{-- 画像４枚目 --}}
                                        @if (isset($product->image4))
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/products/'  . $product->image4) }}" alt="{{ $product->image4 }}" class="lg:w-6/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded">
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
                                <div class="text-center lg:w-2/3 w-full">
                                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $product->name }}</h1>
                                    <p class="mb-8 leading-relaxed">{{ $product->content }}</p>
                                    <div class="mt-4 mb-24">
                                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ number_format($product->price) }}円(税込)</h3>
                                        <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->state }}</h2>
                                    </div>
                                    <div class="flex justify-center">
                                        <button type="button" onclick="location.href='{{ route('product.index')}}'" class="bg-gray-200 border-0 py-2 px-8 mr-7 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                                        <button type="button" onclick="location.href='{{ route('product.edit', ['product' => $product->id])}}'" class="bg-blue-300 border-0 py-2 px-8 ml-7 focus:outline-none hover:bg-blue-400 rounded text-lg">編集する</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    
@endsection
