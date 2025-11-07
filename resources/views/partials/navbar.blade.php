<header class="pt-4 pb-1">
    <nav class="relative mx-auto container">
        <div>
            <div>
                <a class="inline-block mb-4" href="{{ route('home') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="Mensana Logo" class="h-24">
                </a>
            </div>

            <div class="nav-wrapper">
                <ul class="nav-items">
                    <li><a href="{{ route('home') }}" class="nav-link {{ activeClass('home') }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('about') }}" class="nav-link {{ activeClass('about') }}">{{ __('Tentang Kami') }}</a></li>
                    <li><a href="{{ route('product.index') }}" class="nav-link {{ activeClass('product.*') }}">{{ __('Produk') }}</a></li>
                    <li><a href="{{ route('service') }}" class="nav-link {{ activeClass('service') }}">{{ __('Layanan') }}</a></li>
                    <li><a href="{{ route('article.index') }}" class="nav-link {{ activeClass('article.*') }}">{{ __('Berita & Artikel') }}</a></li>
                    <li><a href="{{ route('contact') }}" class="nav-link {{ activeClass('contact') }}">{{ __('Kontak') }}</a></li>
                </ul>

                <!-- Search Form -->
                <div class="search-form">
                    <input type="text" id="search-input" class="search-input">

                    <label for="search-input" class="block right-0 absolute inset-y-1/2 mr-2 size-6 -translate-y-1/2 cursor-pointer transform">
                        <x-eos-search class="text-blue-mensana"/>
                    </label>

                </div>
            </div>


            <!-- language switcher -->
            <div class="divide-black divide language-switcher">
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
