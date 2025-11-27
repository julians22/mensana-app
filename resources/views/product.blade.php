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


@push('modals')
    <!-- Request Modal -->
    <div class="modal"
        :class="{ 'modal-open': openRequestModal }">
        <div class="absolute bg-gray-900 opacity-50 w-full h-full modal-overlay"></div>

        <div class="z-50 bg-white shadow-lg mx-auto rounded-3xl w-11/12 md:max-w-2xl overflow-y-auto modal-container">

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div
                class="relative bg-blue-mensana px-6 py-4 text-white text-left modal-content">

                <div
                    @click="openRequestModal = false"
                    class="top-0 right-0 z-50 absolute flex flex-col items-center mt-4 mr-4 text-white text-sm cursor-pointer modal-close">
                    <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <p class="font-black text-4xl text-center">@lang('REQUEST DOWNLOAD CATALOG')</p>
                    <p class="mb-4 font-black text-xl text-center">@lang('Catalog akan dikirimkan ke alamat email anda') </p>

                    <livewire:catalog-form>
                </div>

            </div>
        </div>
    </div>
@endpush
