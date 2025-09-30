@extends('layouts.app')

@section('title', $article->meta_title)
@section('meta_description', $article->meta_description)

@section('content')
<!-- Nothing worth having comes easy. - Theodore Roosevelt -->
<div class="mx-auto px-4 py-8 container">
    <div class="relative px-8 py-10 border border-gray-200 rounded-3xl">

        <!-- ShareThis BEGIN -->
        <div class="sharethis-inline-share-buttons"></div>
        <!-- ShareThis END -->

        <div class="top-4 right-4 z-10 absolute flex space-x-4 text-xl">
            <span class="group block hover:bg-blue-mensana/40 p-0.5 border border-stone-300 hover:border-blue-mensana/40 rounded-full cursor-pointer">
                <x-heroicon-o-x-mark class="stroke-stone-300 group-hover:stroke-white w-6 h-6"/>
            </span>
        </div>

        <h5 class="mb-4 font-bold text-blue-mensana text-2xl text-center">{{ $article->category->name }}</h5>
        <h1 class="mb-4 font-bold text-blue-mensana text-4xl text-center">{{ $article->title }}</h1>

        <img src="{{ asset($article->getFirstMediaUrl()) }}" alt="">

        <div class="mx-auto prose">
            {{ $article->body }}
        </div>

    </div>
</div>
@endsection
