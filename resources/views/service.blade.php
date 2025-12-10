@extends('layouts.app')

@section('title', $site_title)
@section('meta_description', $meta_description)
@section('meta_keyword', $meta_keywords)
@section('meta_og_img', storageAsset($meta_og_img))

@section('content')
<!-- Very little is needed to make a happy life. - Marcus Aurelius -->

<x-heros.default
    src="{{ $hero_banner }}"
    src_mobile="{{ $hero_banner_mobile }}"
    title="{{ $hero_title }}"
    :subtitle="$hero_subtitle"
    text_position="right"
/>

<div class="mx-auto mt-10 mb-12 lg:mb-48 px-4 lg:px-0 container">
    <div>
        <div class="hidden lg:block bg-contain bg-no-repeat bg-right w-full h-[140px]" style="background-image: url('{{ asset('img/Service-image-top.svg') }}')"></div>

        <div class="xl:bg-[image:var(--image)] bg-repeat-y bg-none w-full bg-size-[100%]" style="--image: url('{{ asset('img/service-image.svg') }}');">

            <div class="flex flex-col gap-y-10 lg:gap-y-16 2xl:gap-y-52 w-full">
                @foreach ($section_contents as $item)
                    @if (($loop->iteration % 2 != 0))
                        <div class="gap-y-10 xl:gap-x-10 xl:gap-y-0 grid grid-cols-8 pr-0 xl:pr-12 xl:h-[330px]">
                            <div class="col-span-8 xl:col-span-5 xl:text-right">
                                <h2 class="mb-3 lg:mb-8 font-bold text-blue-mensana text-3xl xl:text-4xl 2xl:text-6xl">{{ $item['title_'.app()->getLocale()] }}</h2>
                                <div class="ml-auto xl:*:text-right prose prose-lg">
                                    {!! $item['body_'.app()->getLocale()] !!}
                                </div>
                            </div>
                            <div class="relative col-span-8 xl:col-span-3">
                                <div class="relative size-full">
                                    <img data-motion="fade-in" data-duration="0.6" class="2xl:bottom-0 xl:bottom-[-40px] xl:absolute relative xl:w-[90%]" id="{{ Str::slug($item['title_'.app()->getLocale()]) }}" src="{{ storageAsset($item['featured_image']) }}" alt="">
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="gap-y-10 xl:gap-x-10 xl:gap-y-0 grid grid-cols-8 pl-0 lg:pl-12 xl:h-[330px]">
                            <div class="relative col-span-8 lg:col-span-3">
                                <img data-motion="fade-in" data-duration="0.6" class="lg:top-[-75px] 2xl:top-[-160px] xl:absolute xl:w-[90%]" id="{{ Str::slug($item['title_'.app()->getLocale()]) }}" src="{{ storageAsset($item['featured_image']) }}" alt="">
                            </div>
                            <div class="col-span-8 lg:col-span-5">
                                <h2 class="mb-3 lg:mb-8 font-bold text-blue-mensana text-3xl xl:text-4xl 2xl:text-6xl">{{ $item['title_'.app()->getLocale()] }}</h2>
                                <div class="prose prose-lg">
                                    {!! $item['body_'.app()->getLocale()] !!}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </div>



</div>

@endsection
