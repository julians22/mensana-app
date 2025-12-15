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
                            <picture>
                                <source media="(max-width: 768px)" srcset="{{ $banner->getFirstMediaUrl('featured_image_mobile') }}">
                                <source media="(min-width: 769px)" srcset="{{ $banner->getFirstMediaUrl() }}">

                                <img
                                    src="{{ $banner->getFirstMediaUrl() }}"
                                    class="w-full h-full object-cover">
                            </picture>

                            @if ($banner->isHasTitle() || $banner->isHasSubTitle())
                                <div class="banner-text-wrapper">
                                    <div class="banner-text">
                                        <p class="font-bold text-4xl lg:text-7xl">{!! $banner->title !!}</p>
                                        <div class="prose-invert prose-p:text-lg prose-p:lg:text-2xl prose">
                                            {!! $banner->subtitle !!}
                                        </div>
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
        @if ($marketing_section_titles)
            @foreach ($marketing_section_titles as $section_title)
                @if ($section_title['textstyle'] == 'bold')
                    <span data-motion="fade-in" data-duration="0.6" class="inline-block font-quicksilver font-normal">{{ $section_title['title'] }}</span>
                @else
                    <span data-motion="fade-in" data-duration="0.6" class="inline-block">{{ $section_title['title'] }}</span><br>
                @endif
            @endforeach
        @endif
    </h1>

    <div class="gap-x-8 gap-y-2 lg:gap-y-0 grid grid-cols-1 md:grid-cols-2 mx-auto my-10 container">

        {{-- Left Section --}}

        <div class="product-service-card">

            <div data-motion="fade-in" class="badge badge-rtl" style="background-image: url('{{ asset('img/rtl-badge.svg') }}')">
                <h3 title="{{ $marketing_section_left_contents['badge_title'] }}">{{ $marketing_section_left_contents['badge_title'] }}</h3>
            </div>

            @if ($marketing_section_left_contents['layout'] == "background")
                <div class="z-0 absolute inset-0">
                    <img src="{{ storageAsset($marketing_section_left_contents['background_image']) }}" alt="{{ $marketing_section_left_contents['title'] }}" class="w-full h-full object-cover">
                </div>

                <div class="flex justify-center-center items-center h-full">
                    <div class="relative flex-1 space-y-2 text-center">
                        <h4 class="font-normal text-blue-mensana text-xl lg:text-2xl 2xl:text-4xl">{{ $marketing_section_left_contents['title'] }}</h4>
                        <a class="inline-block bg-blue-mensana px-4 py-2 rounded text-white" href="{{ route('service') }}">@lang('Info Lebih')</a>
                    </div>
                </div>
            @else
                <div class="flex items-center space-x-6 px-4 lg:px-10 pt-10 lg:pt-10 pb-4 lg:pb-10">
                    <div>
                        <div class="w-24 lg:w-56 2xl:w-64 h-24 lg:h-56 2xl:h-64">
                            <img src="{{ storageAsset($marketing_section_left_contents['thumbnail_image']) }}" alt="Vaksin Hewan" class="object-cover object-top">
                        </div>
                    </div>

                    <div class="space-y-1 lg:space-y-3">
                        <h4 class="font-bold text-blue-mensana text-xl lg:text-2xl 2xl:text-4xl">{{ $marketing_section_left_contents['title'] }}</h4>
                        <p class="text-gray-600 text-sm lg:text-base">{{ $marketing_section_left_contents['subtitle'] }}</p>
                        <a class="inline-block bg-blue-mensana px-4 py-2 rounded text-white" href="{{ route('product.index') }}">@lang('Info Lebih')</a>
                    </div>
                </div>
            @endif
        </div>

        {{-- Right Section --}}

        <div class="product-service-card">

            <div data-motion="fade-in" class="badge badge-rtl" style="background-image: url('{{ asset('img/rtl-badge.svg') }}')">
                <h3 title="{{ $marketing_section_right_contents['badge_title'] }}">{{ $marketing_section_right_contents['badge_title'] }}</h3>
            </div>
            @if ($marketing_section_right_contents['layout'] == "background")
                <div class="z-0 absolute inset-0">
                    <img src="{{ storageAsset($marketing_section_right_contents['background_image']) }}" alt="{{ $marketing_section_right_contents['title'] }}" class="w-full h-full object-cover">
                </div>

                <div class="flex justify-center-center items-center h-full">
                    <div class="relative flex-1 space-y-2 text-center">
                        <h4 class="font-normal text-blue-mensana text-xl lg:text-3xl 2xl:text-4xl">{{ $marketing_section_right_contents['title'] }}</h4>
                        <a class="inline-block bg-blue-mensana px-4 py-2 rounded text-white" href="{{ route('service') }}">@lang('Info Lebih')</a>
                    </div>
                </div>
            @else
                <div class="flex items-center space-x-6 px-4 lg:px-10 pt-10 lg:pt-10 pb-4 lg:pb-10">
                    <div>
                        <div class="w-24 lg:w-56 2xl:w-64 h-24 lg:h-56 2xl:h-64">
                            <img src="{{ storageAsset($marketing_section_right_contents['thumbnail_image']) }}" alt="Vaksin Hewan" class="object-cover object-top">
                        </div>
                    </div>

                    <div class="space-y-1 lg:space-y-3">
                        <h4 class="font-bold text-blue-mensana text-xl lg:text-2xl 2xl:text-4xl">{{ $marketing_section_right_contents['title'] }}</h4>
                        <p class="text-gray-600 text-sm lg:text-base">{{ $marketing_section_right_contents['subtitle'] }}</p>
                        <a class="inline-block bg-blue-mensana px-4 py-2 rounded text-white" href="{{ route('product.index') }}">@lang('Info Lebih')</a>
                    </div>
                </div>
            @endif
        </div>


    </div>

</section>

<!-- Featured Products Section -->
<section class="mt-20">
    <div class="mx-auto container">
        <div class="featured-products">
            <!-- badge -->
            <div data-motion="fade-in" class="badge badge-ltr" style="background-image: url('{{ asset('img/ltr-badge.svg') }}')">
                <h3 title="Featured">@lang('Produk Kami')</h3>
            </div>

            <div class="top-0 right-0 absolute mt-2 lg:mt-5 mr-2 lg:mr-5">
                <a class="text-blue-mensana" href="{{ route('product.index') }}">@lang('Produk Lainnya') <span class="inline"><x-heroicon-o-chevron-double-right class="inline outline-blue-mensana size-5" /></span></a>
            </div>


            <!-- Featured Products Carousel -->
            <div class="home__product_swiper swiper">
                <div class="swiper-wrapper">
                    @foreach ($products as $product)
                        <div class="swiper-slide">
                            <a href="{{ route('product.detail', ['slug'=> $product->slug]) }}" class="product-card">
                                <img src="{{$product->getFirstMediaUrl('thumbnail')}}" alt="Product 1" class="product-image">
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
                            </a>
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
