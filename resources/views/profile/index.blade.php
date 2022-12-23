@extends('layouts.app')

@section('content')

<section class="pt-16 bg-blueGray-50">
    <div class="w-full lg:w-4/12 px-4 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16">
            <div class="px-6">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full px-4 flex justify-center">
                        <div class="relative">
                            <img src="{{ asset('storage/products/'  . $product->image1) }}" alt="no-image" class="object-contain shadow-xl rounded h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
                        </div>
                    </div>
                    <div class="w-full px-4 text-center mt-20">
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
                <div class="text-center mt-12">
                    <h3 class="text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                        {{$profile->nickname}}
                    </h3>
                    <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                        <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                        愛知
                    </div>
                    <div class="mb-2 text-blueGray-600 mt-10">
                        <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>
                        21
                    </div>
                    <div class="mb-2 text-blueGray-600">
                        <i class="fas fa-university mr-2 text-lg text-blueGray-400"></i>
                        性別
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