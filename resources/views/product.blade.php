@extends('layouts.app')

@section('title', __('Produk Kami'))

@section('meta_description', 'Product')

@section('content')

<section class="relative">
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->

    <img src="{{ asset('img/hero-product.png') }}" alt="">

</section>


<section class="pt-20">

    <livewire:product.index-product
        :categories="$categories"
        :tags="$tags"
        :animals="$animals"
        >

</section>

@endsection
