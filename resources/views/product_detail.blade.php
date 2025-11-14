@extends('layouts.app')

@section('title', __('page.page_title.products', ['name' => $product->name]))
@section('meta_description', 'Product')
@section('content')


<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->


    <div class="relative">
        <div class="relative mx-auto mb-10 border border-slate-200 rounded-lg overflow-hidden container">
            <div class="relative bg-white mx-auto mb-8 p-6 lg:p-12 max-w-7xl">
                <div class="top-4 right-4 z-10 absolute flex space-x-4 text-xl">

                    <span
                        @click="openShareModal = true"
                        class="group block hover:bg-blue-mensana/40 p-2 border border-stone-300 hover:border-blue-mensana/40 rounded-full">
                        <x-heroicon-o-share class="stroke-stone-300 group-hover:stroke-white w-6 h-6"/>
                    </span>

                    <span class="group block hover:bg-blue-mensana/40 p-2 border border-stone-300 hover:border-blue-mensana/40 rounded-full">
                        <a href="{{ route('product.index') }}">
                            <x-heroicon-o-x-mark class="stroke-stone-300 group-hover:stroke-white w-6 h-6"/>
                        </a>
                    </span>
                </div>

                <div class="gap-x-10 grid grid-cols-5">

                    <div class="col-span-5 lg:col-span-3">
                        @if ($product->tags)
                        <div class="flex space-x-2 mb-4 text-gray-500 text-sm">
                                @foreach ($product->tags as $tag)
                                    <span class="shadow px-3 py-1 border border-slate-300 rounded-md font-medium text-blue-mensana">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        @endif
                        <h1 class="mt-2 font-bold text-blue-mensana text-4xl lg:text-5xl">{{ $product->name }}</h1>
                        <h2 class="mt-2 font-normal text-blue-mensana text-xl lg:text-2xl">{{ $product->subtitle }}</h2>

                        <div class="lg:hidden block mt-10">
                            <div class="swiper product_showcase_swiper">
                                <div class="swiper-wrapper">
                                    @foreach ($product->getMedia('showcase') as $showcase)
                                        <div class="swiper-slide">
                                            <div class="aspect-[3/4]">
                                                <img src="{{ $showcase->getUrl(); }}" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        @if ($product->sizes)
                            <div class="mt-8">
                                <h3 class="mb-2 font-semibold text-blue-mensana text-base">@lang('Ukuran / Kemasan')</h3>
                                <div class="flex space-x-2">
                                    @foreach ($product->sizes as $size)
                                        <span class="px-4 py-2 border border-blue-mensana rounded-full font-medium text-slate-700 cursor-pointer">
                                            {{ $size['label'] }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="my-4 xl:max-h-[500px]" data-simplebar data-simplebar-auto-hide="false">
                            <noscript>
                                <style>
                                    /**
                                    * Reinstate scrolling for non-JS clients
                                    */
                                    .simplebar-content-wrapper {
                                        scrollbar-width: auto;
                                        -ms-overflow-style: auto;
                                    }

                                    .simplebar-content-wrapper::-webkit-scrollbar,
                                    .simplebar-hide-scrollbar::-webkit-scrollbar {
                                        display: initial;
                                        width: initial;
                                        height: initial;
                                    }
                                </style>
                            </noscript>
                            <div class="mt-8 prose prose-stone prose-sm">
                                {!! $product->description !!}
                            </div>
                        </div>


                        <div class="mt-2">
                            <p class="mb-8 font-semibold text-blue-mensana text-base">

                                @php

                                    // convert array into string,, seperate with comma, remove the at the end of the string
                                    $animalNames = $product->animals->pluck('name')->toArray();
                                    $paragraph = implode(', ', $animalNames);
                                    if (!empty($animalNames)) {
                                        $lastCommaPos = strrpos($paragraph, ',');
                                        if ($lastCommaPos !== false) {
                                            $paragraph = substr_replace($paragraph, ' &', $lastCommaPos, 1);
                                        }
                                    }
                                @endphp

                                {{ __('page.product_for', ['animals' => $paragraph]) }}
                            </p>
                            <button @click.prevent="openRequestModal = !openRequestModal" class="group flex items-center space-x-2 bg-white hover:bg-blue-mensana/60 py-3 pr-6 pl-3 border border-blue-men rounded-xl font-bold text-blue-mensana hover:text-white transition-colors">
                                <x-heroicon-s-arrow-down-tray class="size-5 text-blue-mensana group-hover:text-white transition-all ease-in-out"/>
                                <span>@lang('Request Download Catalog')</span>
                            </button>
                        </div>
                    </div>

                    <div class="hidden lg:block relative col-span-2 mt-8 lg:mt-0">
                        <div class="h-32"></div>
                        <div class="swiper product_showcase_swiper">
                            <div class="swiper-wrapper">
                                @foreach ($product->getMedia('showcase') as $showcase)
                                    <div class="swiper-slide">
                                        <div class="aspect-[3/4]">
                                            <img src="{{ $showcase->getUrl(); }}" class="w-full h-full object-cover">
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="px-4 lg:px-0">
                <livewire:product.related-product
                    :current_product_id="$product->id"
                    :category="$randomCategory"
                >
            </div>


            <div class="-bottom-24 absolute inset-x-0 w-full">
                <svg class="w-full" viewBox="0 0 605 195" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M605 195V5.83029C544.699 26.8813 433.59 41 306.5 41C173.561 41 58.1075 25.5517 0 2.88026V195H605Z" fill="#F2F2F2"/>
                </svg>
            </div>
        </div>

        <div class="-bottom-5 absolute inset-x-0 flex justify-center mt-8">
            <button
                @click="window.scrollTo({top: 0, behavior: 'smooth'})"
                type="button" class="bg-white hover:bg-stone-300 p-2 border border-stone-300 rounded-full transition-colors">
                <x-heroicon-o-chevron-double-up class="w-6 h-6 text-stone-500" />
            </button>
        </div>

    </div>


</div>

@endsection

