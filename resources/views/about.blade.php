@extends('layouts.app')

@section('title', $site_title)
@section('meta_description', $meta_description)
@section('meta_keyword', $meta_keywords)
@section('meta_og_img', storageAsset($meta_og_img))

@section('content')

<x-heros.default
    src="{{ $hero_banner }}"
    src_mobile="{{ $hero_banner_mobile }}"
    title="{{ $hero_title }}"
    :subtitle="$hero_subtitle"
    text_position="left"
/>

<!-- Milestones Section -->
<section class="py-8 lg:py-20">

    <div class="mx-auto px-4 container">
        <h2 class="mb-8 font-bold text-blue-mensana text-3xl 2xl:text-4xl text-center" data-motion="">@lang('Pencapaian Kami')</h2>

        <!-- Milestones Thumbnail swiper -->
         <div class="pb-6">
            <div class="swiper thumbnail_milestone__swiper">
                <div class="swiper-wrapper">
                    @foreach ($achievements as $achievement)
                        <div class="swiper-slide">
                            <div class="cursor-pointer">
                                <div class="thumbnail__title">{{ $achievement['title_'.app()->getLocale()] }}</div>
                                <div class="thumbnail__subtitle">{{ $achievement['subtitle_'.app()->getLocale()] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Milestones swiper -->
        <div class="relative pb-10">
            <div class="swiper-container swiper milestone__swiper">
                <div class="swiper-wrapper">
                    @foreach ($achievements as $achievement__)
                        <div class="swiper-slide">
                            <div class="milestone-card">
                                <img src="{{ storageAsset($achievement__['thumbnail']) }}" alt="">

                                <div class="milestone-description">
                                    <div class="font-medium text-white text-center">
                                        {!!  $achievement__['description_'.app()->getLocale() ] !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination milestone__swiper-pagination"></div>
        </div>


    </div>

</section>

@foreach ($section_contents as $section)
    <section class="about__section">

        <div class="absolute inset-0">
            <img src="{{ storageAsset($section['background']) }}" alt="" class="w-full h-full object-cover">
        </div>

        <div class="relative flex {{ $section['text_position'] == 'right' ? 'flex-row-reverse' : 'flex-row' }} mx-auto px-2 md:px-10 container">
            <div class="w-full md:w-1/2 prose xl:prose-xl">
                <h2 class="text-blue-mensana" data-motion="fade-left">{{ $section['title_'.app()->getLocale()] }}</h2>

                <div data-motion="fade-in" data-duration="0.6">

                    {!! $section['subtitle_'.app()->getLocale()] !!}

                </div>
            </div>
        </div>
    </section>
@endforeach

<!-- Product Section -->
<section class="about__section">

    <div class="hidden lg:block lg:top-[80%] z-0 absolute inset-x-0 bg-linear-to-t from-30% from-white via-80% to-[#DDDDDD] to-100% w-full lg:h-[500px]"></div>

    <div class="relative mx-auto container">
        <div class="lg:top-7 lg:left-0 lg:absolute lg:max-w-[600px] text-center">
            <h5 class="font-sans-9pt-regular font-normal text-blue-mensana text-3xl 2xl:text-5xl">@lang('Jelajahi produk kami untuk')</h5>
            <h5 class="font-sans font-black text-blue-mensana text-3xl 2xl:text-6xl">@lang('mengetahui kami lebih dalam')</h5>

            <a class="inline-block bg-white mt-8 px-4 py-2 border border-blue-mensana rounded text-blue-mensana" href="{{ route('product.index') }}">@lang('Produk Kami')</a>
        </div>


        <div class="img__shadowable_wrapper">
            <img src="{{ asset('img/Product Lineup.png') }}" alt="" class="z-10 relative mt-4 lg:mt-0 w-full max-w-full lg:max-w-[800px] 2xl:max-w-[1000px] img__shadowable">
        </div>
    </div>

</section>

@endsection
