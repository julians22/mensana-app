@extends('layouts.app')

@section('title', $article->meta_title)
@section('meta_description', $article->meta_description)

@section('content')
<!-- Nothing worth having comes easy. - Theodore Roosevelt -->
<div class="mx-auto px-4 py-8 container">
    <div class="px-8 py-10 border border-gray-200 rounded-3xl">
        <h5 class="mb-4 font-bold text-blue-mensana text-2xl text-center">{{ $article->category->name }}</h5>
        <h1 class="mb-4 font-bold text-blue-mensana text-4xl text-center">{{ $article->title }}</h1>

        <img src="{{ asset($article->getFirstMediaUrl()) }}" alt="">

        <div class="mx-auto prose">
            {{ $article->body }}
        </div>

    </div>
</div>
@endsection
