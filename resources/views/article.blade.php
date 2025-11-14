@extends('layouts.app')

@section('title', __('Berita & Artikel'))

@section('content')

<!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->


<!-- All Article List -->
<section class="pt-10 pb-20">

    <div class="mx-auto container">

        @if ($featured_articles->count())
            <!-- Featured Article -->
        <div class="z-10 relative gap-x-10 grid grid-cols-1 lg:grid-cols-2 mb-4 lg:mb-10 px-4 lg:px-0">

            <div class="relative">
                <div style="--swiper-navigation-color: #fff;" class="swiper article_image_swiper">
                    <div class="swiper-wrapper">

                        @foreach ($featured_articles as $article)
                            <div class="w-full aspect-[166/89] swiper-slide">
                                <img src="{{ asset($article->getFirstMediaUrl()) }}" onerror="this.src='{{ asset('dummy/article-1.png') }}'" alt="{{ $article->getTranslation('title', 'id') }}" class="rounded-xl w-full h-full object-center object-cover">

                                <!-- Article Title -->
                                <div class="bottom-4 lg:bottom-10 left-4 lg:left-10 absolute lg:max-w-2/3">
                                    <h4 class="font-sans-9pt-regular text-white text-xl lg:text-2xl xl:text-4xl">
                                        {{ $article->title }}
                                    </h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>

            <div>
                <div class="flex flex-col justify-between h-full">
                    <div class="flex-auto">
                        <div class="h-full swiper article_text_swiper">
                            <div class="swiper-wrapper">
                                @foreach ($featured_articles as $_article)
                                    <div class="px-1 swiper-slide">
                                        <div class="flex justify-between">
                                            <!-- Type Label -->
                                            <span class="mb-2 font-black text-blue-mensana text-2xl">{{ $_article->category->name }}</span>
                                            <!-- Article Date -->
                                            <p class="mb-4 font-sans font-bold text-gray-500">{{ $_article->published_at ?  $_article->published_at->format('d M y') : $_article->created_at->format('d M y')}}</p>
                                        </div>

                                        <!-- Article Excerpt -->
                                        <p class="mb-4 text-gray-500">
                                            {{ $_article->excrept }}
                                        </p>
                                        <!-- Read More Button -->
                                        <a href="{{ route('article.detail', ['article' => $_article->slug]) }}" class="font-bold text-gray-500 underline">@lang('Lanjut Baca')</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="relative w-full h-9">
                        <div class="swiper-pagination article_image_swiper__pagination"></div>
                    </div>
                </div>

            </div>

        </div>
        @endif


        <livewire:articles.index-article :categories="$categories" />

    </div>

</section>


@endsection
