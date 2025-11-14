@extends('layouts.app')

@section('title', $article->meta_title)
@section('meta_description', $article->meta_description)
@section('meta_keyword', $article->meta_keywords)

@section('content')
<!-- Nothing worth having comes easy. - Theodore Roosevelt -->
<div class="mx-auto px-4 py-8 container">
    <div class="relative px-2 lg:px-8 py-10 border border-gray-200 rounded-xl lg:rounded-3xl">

        <div class="top-4 right-4 z-10 absolute flex flex-row space-x-4 text-xl">

            <span
                @click="openShareModal = true"
                class="group block hover:bg-blue-mensana/40 p-2 border border-stone-300 hover:border-blue-mensana/40 rounded-full cursor-pointer">
                <x-heroicon-o-share class="stroke-stone-300 group-hover:stroke-white w-6 h-6"/>
            </span>

            <a href="{{ route('article.index') }}">
                <span class="group block hover:bg-blue-mensana/40 p-2 border border-stone-300 hover:border-blue-mensana/40 rounded-full cursor-pointer">
                    <x-heroicon-o-x-mark class="stroke-stone-300 group-hover:stroke-white w-6 h-6"/>
                </span>
            </a>

        </div>

        <h5 class="mb-4 font-bold text-blue-mensana text-lg lg:text-2xl text-center">{{ $article->category->name }}</h5>
        <h1 class="mb-4 font-bold text-blue-mensana text-2xl lg:text-4xl text-center">{{ $article->title }}</h1>

        <article class="mx-auto mt-4 prose prose-stone prose-sm">
            <img src="{{ asset($article->getFirstMediaUrl()) }}" alt="" class="mx-auto">

            @php
                $body = $article->body;

                if (empty($body) && App::isLocale('en')) {
                    $body = $article->getTranslation('body', 'id');
                }

            @endphp

            {{-- loop each content type: heading, paragraph, image  --}}
            @foreach ($body as $item)

                @switch($item["type"])
                    @case('heading')
                        <{{$item['data']['level']}}>
                            {{$item['data']['content']}}
                        </{{$item['data']['level']}}>
                        @break
                    @case('paragraph')
                        <p>{!! $item['data']['content'] !!}</p>
                        @break
                    @case('image')
                        <img src="{{ asset('storage/' . $item['data']['url']) }}" alt="{{ $item['data']['alt'] }}" style="max-width: {{$item['data']['width']}};">
                        @break
                    @default

                @endswitch

            @endforeach

        </article>

    </div>
</div>
@endsection
