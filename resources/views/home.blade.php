{{-- Create Simple Page Content --}}

@extends('layouts.app')

@section('title', $site_title)
@section('meta_description', $meta_description)
@section('meta_keyword', $meta_keywords)
@section('meta_og_img', storageAsset($meta_og_img))

@section('content')

<!-- Banner -->
<section class="relative">
    <!--swiper-->
    <div class="swiper home__swiper">
        <div class="flex swiper-wrapper">
            @if ($hero_banners->count())
                @foreach ($hero_banners as $banner)
                    <div class="swiper-slide">
                        <div class="relative aspect-square lg:aspect-video">
                            <img src="{{ $banner->getFirstMediaUrl() }}" class="w-full h-full object-cover">

                            @if ($banner->isHasTitle())
                                <div class="banner-text-wrapper">
                                    <div class="banner-text">
                                        <p class="font-bold text-4xl lg:text-7xl">{!! $banner->title !!}</p>
                                        <p class="text-lg lg:text-2xl">{{ $banner->subtitle }}</p>
                                    </div>
                                    <img src="{{ asset('img/blue-distord@3x.png') }}" alt="" class="banner-text-bg">
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
            <div class="swiper-slide">
                <div class="relative aspect-square lg:aspect-blog">
                    <img src="{{ asset('dummy/banner.png') }}" alt="Banner 1" class="w-full h-full object-cover">

                    <div class="banner-text-wrapper">
                        <div class="banner-text">
                            <p class="font-bold text-4xl lg:text-7xl">Produsen & Distributor</p>
                            <p class="text-lg lg:text-2xl">Premix, Pharmasetik, dan Poulty Equipment</p>
                        </div>
                        <img src="{{ asset('img/blue-distord@3x.png') }}" alt="" class="banner-text-bg">
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="relative aspect-square lg:aspect-blog">
                    <img src="{{ asset('dummy/banner.png') }}" alt="Banner 1" class="w-full h-full object-cover">

                    <div class="banner-text-wrapper">
                        <div class="banner-text">
                            <p class="font-bold text-4xl lg:text-7xl">Produsen & Distributor</p>
                            <p class="text-lg lg:text-2xl">Premix, Pharmasetik, dan Poulty Equipment</p>
                        </div>
                        <img src="{{ asset('img/blue-distord@3x.png') }}" alt="" class="banner-text-bg">
                    </div>
                </div>
            </div>
            @endif
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>

        <!-- shape -->
        <div class="shape__banner" style="background-image: url('{{ asset('shape.png') }}'); background-size: cover; background-position: top;"></div>
    </div>
</section>


<!-- Product & Service Section -->
<section class="mt-4 lg:mt-16 px-4 lg:px-0">

    <h1 class="text-blue-mensana text-2xl lg:text-5xl text-center">
        <span data-motion="fade-in" data-duration="0.6" class="inline-block">Solusi tepat kesehatan ternak Anda.</span><br>
        <span data-motion="fade-in" data-duration="0.6" class="inline-block font-quicksilver font-normal">UNGGUL DALAM KUALITAS.</span>
    </h1>

    <div class="gap-x-8 gap-y-2 lg:gap-y-0 grid grid-cols-1 md:grid-cols-2 mx-auto my-10 container">


        <div class="product-service-card">

            <div data-motion="fade-in" class="badge badge-rtl" style="background-image: url('{{ asset('img/rtl-badge.svg') }}')">
                <h3 title="Produk">PRODUK</h3>
            </div>

            <div class="flex items-center space-x-6 px-4 lg:px-10 pt-10 lg:pt-10 pb-4 lg:pb-10">
                <div>
                    <div class="w-24 lg:w-64 h-24 lg:h-64">
                        <img src="{{ asset('product.png') }}" alt="Vaksin Hewan" class="object-cover object-top">
                    </div>
                </div>

                <div class="space-y-1 lg:space-y-3">
                    <h4 class="font-bold text-blue-mensana text-xl lg:text-4xl">@lang('Vaksin Aktif')</h4>
                    <p class="text-gray-600 text-sm lg:text-base">Sanavac adalah vaksin aktif yang dikhususkan untuk...</p>
                    <a class="inline-block bg-blue-mensana px-4 py-2 rounded text-white" href="">@lang('Info Lebih')</a>
                </div>
            </div>

        </div>

        <div class="product-service-card">
            <div data-motion="fade-in" class="badge badge-rtl" style="background-image: url('{{ asset('img/rtl-badge.svg') }}')">
                <h3 title="Layanan">LAYANAN</h3>
            </div>
            <div class="z-0 absolute inset-0">
                <img src="{{ asset('service-bg.png') }}" alt="" class="w-full h-full object-cover">
            </div>

            <div class="flex justify-center-center items-center h-full">
                <div class="relative flex-1 space-y-2 text-center">
                    <h4 class="font-normal text-blue-mensana text-xl lg:text-4xl">LABORATORIUM / <br> ANIMAL HEALTH CONSULTANT</h4>
                    <a class="inline-block bg-blue-mensana px-4 py-2 rounded text-white" href="{{ route('service') }}">@lang('Info Lebih')</a>
                </div>
            </div>
        </div>


    </div>

</section>

<!-- Featured Products Section -->
<section class="mt-20">
    <div class="mx-auto container">
        <div class="featured-products">
            <!-- badge -->
            <div data-motion="fade-in" class="badge badge-ltr" style="background-image: url('{{ asset('img/ltr-badge.svg') }}')">
                <h3 title="Featured">@lang('Produk Unggulan')</h3>
            </div>

            <div class="top-0 right-0 absolute mt-2 lg:mt-5 mr-2 lg:mr-5">
                <a class="text-blue-mensana" href="{{ route('product.index') }}">@lang('Product Lainnya') <span class="inline"><x-heroicon-o-chevron-double-right class="inline outline-blue-mensana size-5" /></span></a>
            </div>


            <!-- Featured Products Carousel -->
            <div class="home__product_swiper swiper">
                <div class="swiper-wrapper">
                    @foreach ($products as $product)
                        <div class="swiper-slide">
                            <div class="product-card">
                                <img src="{{$product->getFirstMediaUrl('thumbnail')}}" alt="Product 1">
                                <div class="product-info">
                                    <!-- Title -->
                                <h4 class="product-title">{{ $product->name }}</h4>

                                    <!-- Category -->
                                    <p class="product-description">
                                        @foreach ($product->categories as $category)
                                            {{ $category->name }}
                                        @endforeach
                                    </p>
                                    <p class="text-gray-600">{{ $product->excerpt }}</p>
                                </div>
                                @if ($product->tags)
                                <!-- Product Tags -->
                                <div class="product-tags">
                                    @foreach ($product->tags as $tag)
                                    <span class="tag">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>

        </div>
    </div>

</section>

<!-- Featured Articles Section -->
<section class="mt-20 mb-16">


    <div class="mx-auto container">

        <div class="article-news">
             <!-- badge -->
            <div data-motion="fade-in" class="badge badge-ltr" style="background-image: url('{{ asset('img/ltr-badge.svg') }}')">
                <h3 title="Featured">@lang("Berita & Artikel")</h3>
            </div>


            @if ($featured_article)
                <!-- Background gray -->
                <div class="top-0 lg:top-0 bottom-[80%] lg:bottom-6/12 z-0 absolute inset-x-0 bg-gray-100 rounded-3xl"></div>

                <!-- Featured Article -->
                <div class="z-10 relative gap-x-10 grid grid-cols-1 lg:grid-cols-2 px-4 lg:px-16">

                    <div class="w-full aspect-[166/89]">
                        <img src="{{ asset($featured_article->getFirstMediaUrl()) }}" onerror="this.src='{{ asset('dummy/article-1.png') }}'" alt="" class="rounded-xl w-full h-full object-center object-cover">
                    </div>

                    <div>
                        <!-- Type Label -->
                        <span class="mb-2 font-black text-blue-mensana text-2xl">{{ $featured_article->category->name }}</span>
                        <!-- Article Title -->
                        <h4 class="mb-2 font-sans-9pt-regular text-blue-mensana text-4xl">{{ $featured_article->title }}</h4>
                        <!-- Article Date -->
                        <p class="mb-4 font-sans font-bold text-gray-600">{{ $featured_article->published_at ?  $featured_article->published_at->format('d M y') : $featured_article->created_at->format('d M y')}}</p>
                        <!-- Article Excerpt -->
                        <p class="mb-4 text-gray-500">
                            {{ $featured_article->excerpt }}
                        </p>
                        <!-- Read More Button -->
                        <a href="{{ route('article.detail', ['article' => $featured_article->slug]) }}" class="bg-blue-mensana px-4 py-2 rounded text-white">@lang('Selengkapnya')</a>

                    </div>

                </div>
            @endif



            <!-- Article List -->
            <div class="z-10 relative gap-x-10 gap-y-4 grid grid-cols-1 lg:grid-cols-3 mt-10 px-4 lg:px-16">

                @foreach ($articles as $article)
                    <x-article-card-component
                        :article="$article"
                        :image="$article->getFirstMediaUrl() ? $article->getFirstMediaUrl() : asset('dummy/article-1.png')"
                        :type="$article->category->name"
                        :date="$article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y')"
                        :title="$article->title"
                        :excerpt="$article->excerpt"
                        :slug="$article->slug"
                    />

                @endforeach

            </div>

            {{-- button more articles --}}
            <div class="flex justify-center mt-8">
                <a href="{{ route('article.index') }}" class="btn btn-primary">@lang('Artikel Lain')</a>
            </div>

        </div>


    </div>



</section>

@endsection
