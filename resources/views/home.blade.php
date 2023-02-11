@extends('layouts.app')

@section('content')
<div class="py-12">
    <x-auth-flash-message status="session('status')" />
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品一覧
        </h2>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <section class="text-gray-600 body-font">
                    <div class="container px-5 mx-auto">
                        <div class="flex flex-wrap">
                            @foreach ($products as $product )
                            <div class="lg:w-1/3 md:w-1/2 p-4 w-full border border-black ">
                                <div class=" p-2 md:p-4">
                                    <a href="{{ route('product.show',['product' => $product->id]) }}">
                                        @if ($product->is_selling === App\Enums\ProductSelling::Sell)
                                        <button class="shadow-lg bg-blue-500 shadow-blue-500/50 text-white rounded px-1 py-1">販売中</button>
                                        @else
                                        <button class="shadow-lg bg-red-500 shadow-red-500/50 text-white rounded px-1 py-1">停止中</button>
                                        @endif
                                        <div class="border border-zinc-300 rounded-md p-2 md:p-4">
                                            <img src="{{ asset('storage/products/' . $product->image1) }}" alt="{{ $product->image1 }}">
                                            <div class="text-gray-600 flex justify-center mt-3 ">{{ $product->name }}</div>
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="text-gray-700 flex justify-center text-sm tracking-widest title-font mb-1">{{ number_format($product->price) }}円(税込)</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

@endsection