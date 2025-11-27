
@php

    $class="footer-gray";

    $route = Route::currentRouteName();

    if ($route !== 'contact') {
        $class = "footer-white";
    }
@endphp
<footer class="relative bg-cover bg-top px-10 lg:px-0 pt-10 lg:pt-20 pb-10 lg:pb-24 {{ $class }}" style="background-image: url('{{ asset('img/footer-shape.png') }}');">

    <div class="mx-auto overflow-hidden container">
        <div class="flex lg:flex-row flex-col items-center lg:items-start space-y-6 lg:space-y-0">

            <!-- Logo -->
            <div class="flex-shrink-0 lg:mr-20 lg:text-left text-center">
                <img src="{{ !empty($general_settings['footer_logo']) ? storageAsset($general_settings['footer_logo']) : asset('img/logo-simple.svg') }}"  alt="Logo" class="h-24 lg:h-40">
            </div>

            <!-- Address -->
            <div class="flex-grow-0 space-y-3 mr-0 lg:mr-60 lg:max-w-80 font-sans-9pt-regular">

                <div class="prose-invert prose-p:text-white prose">

                    {!! $general_settings['address'] !!}
                </div>


                <div>
                    @foreach ($general_settings['contacts'] as $contact)

                        @switch($contact['type'])
                            @case('email')
                                <p class="flex items-center text-white text-lg">
                                    <img src="{{ asset('img/icons/email.svg') }}" alt="Email" class="mr-2 w-5 h-5">
                                    {{ $contact['value'] }}
                                </p>
                                @break
                            @case('phone')
                                <p class="flex items-center text-white text-lg">
                                    <img src="{{ asset('img/icons/phone.svg') }}" alt="Phone" class="mr-2 w-5 h-5">
                                    {{ $contact['value'] }}
                                </p>
                                @break
                            @case('whatsapp')
                                <p class="flex items-center text-white text-lg">
                                    <img src="{{ asset('img/icons/whatsapp.svg') }}" alt="WhatsApp" class="mr-2 w-5 h-5">
                                    {{ $contact['value'] }}
                                </p>

                                @break
                                @break
                            @default

                        @endswitch

                    @endforeach
                </div>
            </div>

            <!-- Site Link & Social Icons Column -->
            <div class="w-full lg:w-auto">
                <!-- Site Links -->
                <ul class="gap-4 lg:gap-10 grid grid-cols-2 text-lg">
                    <li><a href="{{ route('home') }}" class="text-white hover:underline">@lang("Home")</a></li>
                    <li><a href="#" class="text-white hover:underline">@lang("Career")</a></li>
                    <li><a href="{{ route('product.index') }}" class="text-white hover:underline">@lang("Products")</a></li>
                    <li><a href="{{ route('service') }}" class="text-white hover:underline">@lang("Services")</a></li>

                    <li><a href="#" @click.prevent="openRequestModal = !openRequestModal" class="text-white hover:underline">@lang("Download")</a></li>
                    <li><a href="{{ route('article.index') }}" class="text-white hover:underline">@lang("Berita & Artikel")</a></li>
                </ul>

                <!-- Social Icons -->
                <div class="mt-5 lg:mt-10">
                    <p class="mb-2 text-white text-lg">Social media kami</p>
                    <div class="flex space-x-2">
                        @foreach ($general_settings['socials'] as $social)
                                @switch($social['type'])
                                    @case('instagram')
                                    <a href="{{ $social['value'] }}">
                                        <x-bi-instagram class="fill-white size-8"/>
                                    </a>
                                    @break
                                    @case('facebook')
                                        <a href="{{ $social['value'] }}">
                                            <x-bi-facebook class="fill-white size-8"/>
                                        </a>
                                        @break
                                    @case('tiktok')
                                        <a href="{{ $social['value'] }}">
                                            <x-bi-tiktok class="fill-white size-8"/>
                                        </a>
                                        @break
                                    @case('twitter')
                                        <a href="{{ $social['value'] }}">
                                            <x-bi-twitter class="fill-white size-8"/>
                                        </a>
                                        @break
                                    @case('youtube')
                                        <a href="{{ $social['value'] }}">
                                            <x-bi-youtube class="fill-white size-8"/>
                                        </a>
                                        @break
                                    @case('linkedin')
                                        <a href="{{ $social['value'] }}">
                                            <x-bi-linkedin class="fill-white size-8"/>
                                        </a>
                                    @break
                                    @default
                                @endswitch
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


</footer>
