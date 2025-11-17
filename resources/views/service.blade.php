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
    <div class="flex flex-col gap-y-4 lg:gap-y-0 lg:p-12 w-full">
        <div class="lg:pl-48 w-full lg:translate-y-0.5">
            <div class="border-blue-mensana lg:border-y-2 lg:border-r-2 rounded-r-4xl h-full">
                <div class="lg:gap-x-20 grid lg:grid-cols-2 h-full">
                    <div class="flex flex-col justify-center lg:py-32 text-right">
                        <h2 class="mb-3 lg:mb-8 font-bold text-blue-mensana text-3xl lg:text-6xl">LABORATORIUM</h2>
                        <p class="text-lg">
                            Mauris tincidunt rutrum arcu, sit amet pretium
                            lectus mattis sed. Suspendisse ultricies eu
                            turpis in feugiat. Nam risus lacus, viverra eget
                            commodo nec, dapibus id libero. Aenean lorem
                            tortor, consequat in libero id, congue
                            ullamcorper ante. Nam risus lacus, viverra eget
                            commodo nec, dapibus id libero. Aenean lorem
                        </p>
                    </div>
                    <div class="relative">
                        <div class="lg:bottom-6 lg:absolute lg:w-[500px]">
                            <img class="w-full h-auto" src="{{ asset('img/layanan-content-1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:-ml-28 w-full">
            <div class="border-blue-mensana lg:border-y-2 lg:border-l-2 rounded-l-4xl h-full">
                <div class="lg:gap-x-20 grid lg:grid-cols-2 h-full">
                    <div class="relative">
                        <div class="lg:top-6 lg:right-0 lg:absolute lg:w-[500px]">
                            <img class="w-full h-auto" src="{{ asset('img/layanan-content-2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="flex flex-col justify-center lg:py-32 text-left">
                        <h2 class="mb-3 lg:mb-8 font-bold text-blue-mensana text-3xl lg:text-6xl">ANIMAL HEALTH CONSULTATION</h2>
                        <p class="text-lg">
                            Mauris tincidunt rutrum arcu, sit amet pretium
                            lectus mattis sed. Suspendisse ultricies eu
                            turpis in feugiat. Nam risus lacus, viverra eget
                            commodo nec, dapibus id libero. Aenean lorem
                            tortor, consequat in libero id, congue
                            ullamcorper ante. Nam risus lacus, viverra eget
                            commodo nec, dapibus id libero. Aenean lorem
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
