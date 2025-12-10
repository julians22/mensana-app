<header class="top-0 z-50 lg:static fixed bg-white shadow lg:shadow-none px-4 lg:px-0 pt-2 lg:pt-4 pb-2">
    <nav class="relative mx-auto container">
        <div>
            <div class="lg:block flex justify-between">
                <a class="inline-block flex-1 lg:mb-4" href="{{ route('home') }}">
                    <img src="{{ !empty($general_settings['nav_logo']) ? storageAsset($general_settings['nav_logo']) : asset('img/logo.png') }}" alt="Mensana Logo" class="w-9/12 lg:w-auto h-auto lg:h-24">
                </a>

                <button id="menuBtn" class="lg:hidden block focus:outline-none hamburger" :class="openNav ? 'openNav' : ''" type="button" @click="openNav = !openNav">
                    <span class="hamburger__top-bun"></span><span class="hamburger__bottom-bun"></span>
                </button>
            </div>

            <div class="nav-wrapper" :class="openNav ? 'openNav' : ''">
                <ul class="nav-items">
                    <li><a href="{{ route('home') }}" class="nav-link {{ activeClass('home') }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('about') }}" class="nav-link {{ activeClass('about') }}">{{ __('Tentang Kami') }}</a></li>
                    <li class="relative"
                        @mouseover.away = "openProductNav = false"
                        x-data='{openProductNav: false}'>
                        <a
                            @mouseover="openProductNav = true"
                            href="{{ route('product.index') }}" class="nav-link {{ activeClass('product.*') }}">{{ __('Produk') }}</a>
                        <div class="dropdown-nav" x-show="openProductNav" x-cloak style="min-width: 14rem;">
                            <ul class="space-y-2">
                                @foreach ($general_settings['productCategories'] as $productCategory)
                                <li>
                                    <a class="nav-link" href="{{ route('product.index') }}?category[0]={{$productCategory->slug}}">{{$productCategory->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li><a href="{{ route('service') }}" class="nav-link {{ activeClass('service') }}">{{ __('Layanan') }}</a></li>
                    <li class="relative"
                        @mouseover.away = "openArticleNav = false"
                        x-data='{openArticleNav: false}'>
                        <a
                            @mouseover="openArticleNav = true"
                            href="{{ route('article.index') }}" class="nav-link {{ activeClass('article.*') }}">{{ __('Berita & Artikel') }}</a>
                        <div class="dropdown-nav" x-show="openArticleNav" x-cloak style="min-width: 9rem;">
                            <ul class="space-y-2">
                                @foreach ($general_settings['articleCategories'] as $articleCategory)
                                <li>
                                    <a class="nav-link" href="{{ route('article.index') }}?category={{$articleCategory->slug}}">{{$articleCategory->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li><a href="{{ route('contact') }}" class="nav-link {{ activeClass('contact') }}">{{ __('Kontak') }}</a></li>
                </ul>

                <!-- Search Form -->
                <form action="{{ route('search_result') }}">
                    <div class="search-form" :class="open ? 'open' : ''" x-data="{ open: false, search: '' }">
                        <input type="text" id="search-input" name="q" class="search-input" @focusin="open = true" @focusout="open = false">

                        <button type="submit" for="search-input" class="block right-0 absolute inset-y-1/2 mr-2 size-6 -translate-y-1/2 cursor-pointer transform">
                            <x-eos-search class="text-blue-mensana"/>
                        </button>

                    </div>
                </form>
            </div>

            <!-- language switcher -->
            <div class="mx-auto divide-black max-w-max lg:max-w-none divide language-switcher" :class="openNav ? 'openNav' : ''">
                <a
                    href="{{ LaravelLocalization::getLocalizedURL('id', null, [], true) }}"
                    class="language-link {{ LaravelLocalization::getCurrentLocale() == 'id' ? 'active' : '' }}">
                    <img src="{{ asset('img/icons/idn.png') }}" alt="Indonesia Flag" class="inline mr-1 w-5 h-5">
                    IND
                </a>
                <a
                    href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"
                    class="language-link {{ LaravelLocalization::getCurrentLocale() == 'en' ? 'active' : '' }}">
                    ENG
                    <img src="{{ asset('img/icons/eng.png') }}" alt="English Flag" class="inline mr-1 w-5 h-5">
                </a>
            </div>
        </div>
    </nav>
</header>
