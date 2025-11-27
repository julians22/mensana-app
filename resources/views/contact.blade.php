@extends('layouts.app')

@section('title', $site_title)
@section('meta_description', $meta_description)
@section('meta_keyword', $meta_keywords)
@section('meta_og_img', storageAsset($meta_og_img))

@section('content')

<div class="bg-[#f2f2f2] pt-10 pb-8 min-h-[800px]">
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->

    <div class="bg-white shadow mx-auto rounded-4xl container">
        <div class="space-y-4 px-4 lg:px-0 py-6 lg:py3">

            <div class="swiper map_contact__swiper">
                <div class="swiper-wrapper">
                    @foreach ($map_images as $image)
                    <div class="swiper-slide">
                        <div class="w-full aspect-blog">
                            <img src="{{ storageAsset($image) }}" alt="" class="w-full h-full object-cover">
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>

            <div class="contact-swiper-pagination swiper-pagination darken"></div>

            <div class="bg-cyan-mensana rounded-full w-full h-1.5"></div>

            <div class="lg:pl-4">
                <h1 class="mb-3 lg:mb-0 font-bold text-blue-mensana text-2xl xl:text-3xl 2xl:text-5xl">@lang('Hubungi Kami')</h1>

                <div class="gap-y-4 lg:gap-x-10 lg:gap-y-0 grid grid-cols-12">
                    <div class="lg:place-items-center gap-y-4 lg:gap-y-0 order-2 lg:order-1 grid grid-cols-1 lg:grid-cols-2 col-span-12 lg:col-span-7">
                        <div class="order-3 lg:order-1">
                            <img src="{{ asset('img/logo-simple-blue.png') }}" alt="" class="lg:mx-auto max-w-[120px] lg:max-w-none">
                        </div>

                        <div class="flex flex-col space-y-5 order-4 lg:order-2">

                            <div class="prose-invert prose-headings:mb-2 prose-headings:text-blue-mensana prose-p:text-blue-mensana prose-lg">

                                {!! $general_settings['address'] !!}
                            </div>

                            <ul class="text-blue-mensana text-xl">

                                @foreach ($general_settings['contacts'] as $contact)

                                    @switch($contact['type'])
                                        @case('email')
                                            <li>
                                                <a href="mailto:{{ $contact['value'] }}">
                                                    <span><x-eos-email class="inline-block size-5"/>{{ $contact['value'] }}</span>
                                                </a>
                                            </li>
                                            @break
                                        @case('phone')
                                            <li>
                                               <a href="tel:{{ $contact['value'] }}">
                                                    <span><x-eos-phone class="inline-block size-5"/>{{ $contact['value'] }}</span>
                                                </a>
                                            </li>
                                            @break

                                        @default

                                    @endswitch

                                @endforeach
                            </ul>

                            <div class="prose-headings:mb-2 prose-headings:text-blue-mensana prose prose-lg">
                                <h2>Sosial media kami</h2>
                            </div>
                            <div class="flex space-x-4">
                                {{-- loop throught the social setting available type is 'instagram', 'facebook', 'tiktok', 'twitter', 'youtube' --}}
                                @foreach ($general_settings['socials'] as $social)
                                    @switch($social['type'])
                                        @case('instagram')
                                            <a href="{{ $social['value'] }}">
                                                <x-bi-instagram class="fill-blue-mensana size-9"/>
                                            </a>
                                            @break
                                        @case('facebook')
                                            <a href="{{ $social['value'] }}">
                                                <x-bi-facebook class="fill-blue-mensana size-9"/>
                                            </a>
                                            @break
                                        @case('tiktok')
                                            <a href="{{ $social['value'] }}">
                                                <x-bi-tiktok class="fill-blue-mensana size-9"/>
                                            </a>
                                            @break
                                        @case('twitter')
                                            <a href="{{ $social['value'] }}">
                                                <x-bi-twitter class="fill-blue-mensana size-9"/>
                                            </a>
                                            @break
                                        @case('youtube')
                                            <a href="{{ $social['value'] }}">
                                                <x-bi-youtube class="fill-blue-mensana size-9"/>
                                            </a>
                                            @break
                                        @default
                                    @endswitch
                                @endforeach
                            </div>
                        </div>

                        <div class="order-2 lg:order-3">
                            <img src="{{ asset('img/logo-sanbio.png') }}" alt="" class="lg:mx-auto max-w-[120px] lg:max-w-none">
                        </div>

                        <div class="order-1 lg:order-4">
                            <h3 class="text-blue-mensana text-3xl">Kami distributor tunggal PT Sanbio Laboratories</h3>
                        </div>


                    </div>
                    <div class="order-1 lg:order-2 col-span-12 lg:col-span-5">
                        @livewire('contact.form')
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection


@push('after-scripts')
    <script>
        Livewire.on('contact-submited', () => {
            alert('Your message has been sent.')
        });
    </script>
@endpush
