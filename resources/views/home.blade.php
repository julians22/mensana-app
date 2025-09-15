{{-- Create Simple Page Content --}}

@extends('layouts.app')

@section('title', 'Home Page')

@section('content')


<!-- Banner -->
<section class="relative">
    <!--swiper-->
    <div class="swiper home__swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="relative">
                    <img src="{{ asset('dummy/banner.png') }}" alt="Banner 1" class="w-full h-full object-cover">

                    <div class="banner-text-wrapper">
                        <div class="banner-text">
                            <p class="font-bold text-7xl">Produsen & Distributor</p>
                            <p class="text-2xl">Premix, Pharmasetik, dan Poulty Equipment</p>
                        </div>
                        <img src="{{ asset('img/blue-distord@3x.png') }}" alt="" class="banner-text-bg">
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="relative">
                    <img src="{{ asset('dummy/banner.png') }}" alt="Banner 1" class="w-full h-full object-cover">

                    <div class="banner-text-wrapper">
                        <div class="banner-text">
                            <p class="font-bold text-7xl">Produsen & Distributor</p>
                            <p class="text-2xl">Premix, Pharmasetik, dan Poulty Equipment</p>
                        </div>
                        <img src="{{ asset('img/blue-distord@3x.png') }}" alt="" class="banner-text-bg">
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="relative">
                    <img src="{{ asset('dummy/banner.png') }}" alt="Banner 1" class="w-full h-full object-cover">

                    <div class="banner-text-wrapper">
                        <div class="banner-text">
                            <p class="font-bold text-7xl">Produsen & Distributor</p>
                            <p class="text-2xl">Premix, Pharmasetik, dan Poulty Equipment</p>
                        </div>
                        <img src="{{ asset('img/blue-distord@3x.png') }}" alt="" class="banner-text-bg">
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>

        <!-- shape -->
        <div class="shape__banner" style="background-image: url('{{ asset('shape.png') }}'); background-size: cover; background-position: top;"></div>
    </div>
</section>


<!-- Product & Service Section -->
<section class="mt-16">

    <h1 class="text-blue-mensana text-5xl text-center">
        <span data-motion="fade-up" data-duration="0.6" class="inline-block">Solusi tepat kesehatan ternak Anda.</span><br>
        <span data-motion="fade-down" data-duration="0.6" class="inline-block font-quicksilver font-normal">UNGGUL DALAM KUALITAS.</span>
    </h1>

    <div class="gap-x-8 grid grid-cols-1 md:grid-cols-2 mx-auto my-10 container">


        <div class="product-service-card">

            <div data-motion="fade-right" class="badge badge-rtl" style="background-image: url('{{ asset('img/rtl-badge.svg') }}')">
                <h3 title="Produk">PRODUK</h3>
            </div>

            <div class="flex items-center space-x-6 px-10 py-10">
                <div>
                    <div class="w-64 h-64">
                        <img src="{{ asset('product.png') }}" alt="Vaksin Hewan" class="object-cover object-top">
                    </div>
                </div>

                <div class="space-y-3">
                    <h4 class="font-bold text-blue-mensana text-4xl">Vaksin Aktif</h4>
                    <p class="text-gray-600">Sanavac adalah vaksin aktif yang dikhususkan untuk...</p>
                    <a class="inline-block bg-blue-mensana px-4 py-2 rounded text-white" href="">Info Lebih</a>
                </div>
            </div>

        </div>

        <div class="product-service-card">
            <div data-motion="fade-right" class="badge badge-rtl" style="background-image: url('{{ asset('img/rtl-badge.svg') }}')">
                <h3 title="Layanan">LAYANAN</h3>
            </div>
            <div class="z-0 absolute inset-0">
                <img src="{{ asset('service-bg.png') }}" alt="" class="w-full h-full object-cover">
            </div>

            <div class="flex justify-center-center items-center h-full">
                <div class="relative flex-1 space-y-2 text-center">
                    <h4 class="font-normal text-blue-mensana text-4xl">LABORATORIUM / <br> ANIMAL HEALTH CONSULTANT</h4>
                    <a class="inline-block bg-blue-mensana px-4 py-2 rounded text-white" href="">Info Lebih</a>
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
            <div data-motion="fade-left" class="badge badge-ltr" style="background-image: url('{{ asset('img/ltr-badge.svg') }}')">
                <h3 title="Featured">Produk Unggulan</h3>
            </div>

            <!-- Featured Products Carousel -->
            <div class="home__product_swiper swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="product-card">
                            <img src="{{ asset('dummy/product-0.jpg') }}" alt="Product 1">
                            <div class="product-info">
                                <!-- Title -->
                                <h4 class="product-title">Product 1</h4>
                                <!-- Category -->
                                <p class="product-description">Vaccines</p>
                                <p class="text-gray-600">Description for Product 1</p>
                            </div>
                            <!-- Product Tags -->
                            <div class="product-tags">
                                <span class="tag">Tag 1</span>
                                <span class="tag">Tag 2</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-card">
                            <img src="{{ asset('dummy/product-1.jpg') }}" alt="Product 2">
                            <div class="product-info">
                                <!-- Title -->
                                <h4 class="product-title">Product 2</h4>
                                <!-- Category -->
                                <p class="product-description">Vaccines</p>
                                <p class="text-gray-600">Description for Product 2</p>
                            </div>

                            <!-- Product Tags -->
                            <div class="product-tags">
                                <span class="tag">Tag 1</span>
                                <span class="tag">Tag 2</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-card">
                            <img src="{{ asset('dummy/product-2.jpg') }}" alt="Product 3">
                            <div class="product-info">
                                <!-- Title -->
                                <h4 class="product-title">Product 3</h4>
                                <!-- Category -->
                                <p class="product-description">Vaccines</p>
                                <p class="text-gray-600">Description for Product 3</p>
                                <!-- Product Tags -->
                                <div class="product-tags">
                                    <span class="tag">Tag 1</span>
                                    <span class="tag">Tag 2</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class="product-card">
                            <img src="{{ asset('dummy/product-3.jpg') }}" alt="Product 4">
                            <div class="product-info">
                                <!-- Title -->
                                <h4 class="product-title">Product 4</h4>
                                <!-- Category -->
                                <p class="product-description">Vaccines</p>
                                <p class="text-gray-600">Description for Product 4</p>
                            </div>

                            <!-- Product Tags -->
                            <div class="product-tags">
                                <span class="tag">Tag 1</span>
                                <span class="tag">Tag 2</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-card">
                            <img src="{{ asset('dummy/product-4.jpg') }}" alt="Product 5">
                            <div class="product-info">
                                <!-- Title -->
                                <h4 class="product-title">Product 5</h4>
                                <!-- Category -->
                                <p class="product-description">Vaccines</p>
                                <p class="text-gray-600">Description for Product 5</p>
                            </div>
                            <!-- Product Tags -->
                            <div class="product-tags">
                                <span class="tag">Tag 1</span>
                                <span class="tag">Tag 2</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-card">
                            <img src="{{ asset('dummy/product-4.jpg') }}" alt="Product 5">
                            <div class="product-info">
                                <!-- Title -->
                                <h4 class="product-title">Product 5</h4>
                                <!-- Category -->
                                <p class="product-description">Vaccines</p>
                                <p class="text-gray-600">Description for Product 5</p>
                            </div>
                            <!-- Product Tags -->
                            <div class="product-tags">
                                <span class="tag">Tag 1</span>
                                <span class="tag">Tag 2</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-card">
                            <img src="{{ asset('dummy/product-4.jpg') }}" alt="Product 5">
                            <div class="product-info">
                                <!-- Title -->
                                <h4 class="product-title">Product 5</h4>
                                <!-- Category -->
                                <p class="product-description">Vaccines</p>
                                <p class="text-gray-600">Description for Product 5</p>
                            </div>
                            <!-- Product Tags -->
                            <div class="product-tags">
                                <span class="tag">Tag 1</span>
                                <span class="tag">Tag 2</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-card">
                            <img src="{{ asset('dummy/product-4.jpg') }}" alt="Product 5">
                            <div class="product-info">
                                <!-- Title -->
                                <h4 class="product-title">Product 5</h4>
                                <!-- Category -->
                                <p class="product-description">Vaccines</p>
                                <p class="text-gray-600">Description for Product 5</p>
                            </div>
                            <!-- Product Tags -->
                            <div class="product-tags">
                                <span class="tag">Tag 1</span>
                                <span class="tag">Tag 2</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-card">
                            <img src="{{ asset('dummy/product-4.jpg') }}" alt="Product 5">
                            <div class="product-info">
                                <!-- Title -->
                                <h4 class="product-title">Product 5</h4>
                                <!-- Category -->
                                <p class="product-description">Vaccines</p>
                                <p class="text-gray-600">Description for Product 5</p>
                            </div>
                            <!-- Product Tags -->
                            <div class="product-tags">
                                <span class="tag">Tag 1</span>
                                <span class="tag">Tag 2</span>
                            </div>
                        </div>
                    </div>
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
            <div data-motion="fade-left" class="badge badge-ltr" style="background-image: url('{{ asset('img/ltr-badge.svg') }}')">
                <h3 title="Featured">Berita & Artikel</h3>
            </div>
            <!-- Background gray -->
            <div class="top-0 bottom-6/12 z-0 absolute inset-x-0 bg-gray-100 rounded-3xl"></div>

            <!-- Featured Article -->
            <div class="z-10 relative gap-x-10 grid grid-cols-2 px-16">

                <div>
                    <img src="{{ asset('dummy/article-0.png') }}" alt="" class="rounded-xl">
                </div>

                <div>
                    <!-- Type Label -->
                    <span class="mb-2 font-black text-blue-mensana text-2xl">Artikel</span>
                    <!-- Article Title -->
                    <h4 class="mb-2 font-sans-9pt-regular text-blue-mensana text-4xl">Optimalkan Biosekuriti Saat Musim Pancaroba</h4>
                    <!-- Article Date -->
                    <p class="mb-4 font-sans font-bold text-gray-600">08 Feb 2022</p>
                    <!-- Article Excerpt -->
                    <p class="mb-4 text-gray-500">Peralihan antar musim atau yang kita kenal dengan istilah musim pancaroba merupakan suatu tantangan terhadap para peternak, khususnya dalam bidang perunggasan.</p>
                    <!-- Read More Button -->
                    <a href="#" class="bg-blue-mensana px-4 py-2 rounded text-white">Selengkapnya</a>

                </div>

            </div>

            <!-- Article List -->
            <div class="z-10 relative gap-x-10 grid grid-cols-1 lg:grid-cols-3 mt-10 px-16">

                @foreach ($featured_articles as $article)
                    <x-article-card-component
                        :article="$article"
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
                <a href="{{ route('article.index') }}" class="btn btn-primary">ARTIKEL LAIN</a>
            </div>

        </div>


    </div>



</section>



@endsection
