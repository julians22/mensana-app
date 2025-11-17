@extends('layouts.app')

@section('title', $site_title)
@section('meta_description', $meta_description)
@section('meta_keyword', $meta_keywords)
@section('meta_og_img', storageAsset($meta_og_img))

@section('meta_description', 'Product')

@section('content')

<!-- The whole future lies in uncertainty: live immediately. - Seneca -->
<x-heros.default
    src="{{ $hero_banner }}"
    src_mobile="{{ $hero_banner_mobile }}"
    title="{{ $hero_title }}"
    :subtitle="$hero_subtitle"
    text_position="left"
/>

<section class="pt-8 lg:pt-20">

    <livewire:product.index-product
        :categories="$categories"
        :tags="$tags"
        :animals="$animals"
        >

</section>

@endsection
