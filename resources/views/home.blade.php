@extends('layouts.app')

@section('content')
<div class="container">
    <x-auth-flash-message status="session('status')" />
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div>
                        <h1>product</h1>
                        <button type="button" onclick="location.href='{{ route('product.index')}}'" class="bg-gray-200 border-0 py-2 px-8 mr-7 focus:outline-none hover:bg-gray-400 rounded text-lg">一覧</button>
                        <button type="button" onclick="location.href='{{ route('product.create')}}'" class="bg-blue-200 border-0 py-2 px-8 mr-7 focus:outline-none hover:bg-gray-400 rounded text-lg">作成</button>
                    </div>

                    <div class="swiper mt-10">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">Slide 1</div>
                            <div class="swiper-slide">Slide 2</div>
                            <div class="swiper-slide">Slide 3</div>
                            ...
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
            </div>
            
            <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
                <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                        <header class="modal__header">
                            <h2 class="modal__title" id="modal-1-title">
                                Micromodal
                            </h2>
                            <button type="button" class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                        </header>
                        <main class="modal__content" id="modal-1-content">
                            <p>
                                Try hitting the <code>tab</code> key and notice how the focus stays within the modal itself. Also, <code>esc</code> to close modal.
                            </p>
                        </main>
                        <footer class="modal__footer">
                            <button type="button" class="modal__btn modal__btn-primary">Continue</button>
                            <button type="button" class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
                        </footer>
                    </div>
                </div>
            </div>

            <a data-micromodal-trigger="modal-1" href='javascript:;'>Open Modal Dialog</a>


            <div id="app">
                <example-component></example-component>
            </div>
        </div>
    </div>
</div>


@endsection