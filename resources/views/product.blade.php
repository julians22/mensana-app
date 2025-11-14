@extends('layouts.app')

@section('title', __('Produk Kami'))

@section('meta_description', 'Product')

@section('content')

<section class="relative">
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
    <div class="w-full aspect-square lg:aspect-auto">
        <img src="{{ asset('img/hero-product.png') }}" class="w-full lg:w-full h-full lg:h-full object-center object-cover lg:object-none" alt="">
    </div>
</section>


<section class="pt-8 lg:pt-20">

    <livewire:product.index-product
        :categories="$categories"
        :tags="$tags"
        :animals="$animals"
        >

</section>

@endsection
