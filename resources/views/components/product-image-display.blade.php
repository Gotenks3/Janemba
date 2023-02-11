@props(['product'])

<div class="container mx-auto flex px-5 py-8 items-center justify-center flex-col">
    {{-- 画像１枚目 --}}
    <div class="flex">
        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">画像１枚目</h3>
        <p class="text-red-400 ml-3">※必須</p>
    </div>
    @if (is_null($product->image1))
    <div> <img src="{{ asset('storage/products/'  . 'kamera.png') }}" alt="no-image" class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded"></div>
    @else
    <div> <img src="{{ asset('storage/products/'  . $product->image1) }}" alt="{{ $product->image1 }}" class="lg:w-64 md:w-3/6 w-4/6 mb-10 object-cover object-center rounded" style="width:120px; hight: 120px;"></div>
    @endif
    <input type="file" name="image1" value="画像を変更する" accept=“image/png,image/jpeg,image/jpg” class="mb-12">
    {{-- 画像２枚目 --}}
    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">画像２枚目</h3>
    @if (is_null($product->image2))
    <div> <img src="{{ asset('storage/products/'  . 'kamera.png') }}" alt="no-image" class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded"></div>
    @else
    <div> <img src="{{ asset('storage/products/'  . $product->image2) }}" alt="{{ $product->image2 }}" class="lg:w-64 md:w-3/6 w-4/6 mb-10 object-cover object-center rounded"></div>
    @endif
    <input type="file" name="image2" value="画像を変更する" accept=“image/png,image/jpeg,image/jpg” class="mb-12">
    {{-- 画像３枚目 --}}
    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">画像３枚目</h3>
    @if (is_null($product->image3))
    <div> <img src="{{ asset('storage/products/'  . 'kamera.png') }}" alt="no-image" class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded"></div>
    @else
    <div> <img src="{{ asset('storage/products/'  . $product->image3) }}" alt="{{ $product->image3 }}" class="lg:w-64 md:w-3/6 w-4/6 mb-10 object-cover object-center rounded"></div>
    @endif
    <input type="file" name="image3" value="画像を変更する" accept=“image/png,image/jpeg,image/jpg” class="mb-12">
    {{-- 画像４枚目 --}}
    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">画像４枚目</h3>
    @if (is_null($product->image4))
    <div> <img src="{{ asset('storage/products/'  . 'kamera.png') }}" alt="no-image" class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded"></div>
    @else
    <div> <img src="{{ asset('storage/products/'  . $product->image4) }}" alt="{{ $product->image4 }}" class="lg:w-64 md:w-3/6 w-4/6 mb-10 object-cover object-center rounded"></div>
    @endif
    <input type="file" name="image4" placeholder="画像を変更する" accept=“image/png,image/jpeg,image/jpg” class="mb-12">
</div>