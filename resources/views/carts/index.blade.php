@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        @if(!isset($user->products[0]))
            <h2>カートに商品が入っていません。</h2>
        @else
        <div class="col-md-8">
            @foreach($user->products as $product)
            <div class="card">
                <div class="card-body">
                    <div class="mb-4 flex">
                        <div class="mr-8">
                            <img alt="content" class="object-contain" src="{{ asset('storage/products/'  . $product->image1) }}">
                        </div>
                        <div class="flex">
                            <p class="flex">商品名：{{$product->name}}</p>
                            <p class="flex">数量：{{$product->pivot->amount}}</p>
                            <p>料金：{{ number_format($product->pivot->amount * $product->price) }}円(税込)</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div>
            <p>合計：{{ number_format($totalPrice) }}円(税込)</p>
        </div>
        @endif
    </div>
</div>
@endsection