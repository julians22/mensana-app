<header class="pt-4 pb-1">
    <nav class="relative mx-auto container">
        <div>
            <a class="block mb-4" href="{{ route('home') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Mensana Logo" class="h-24">
            </a>

            <div class="nav-wrapper">
                <ul class="nav-items">
                    <li><a href="#" class="nav-link active">{{ __('Home') }}</a></li>
                    <li><a href="#" class="nav-link">{{ __('Tentang Kami') }}</a></li>
                    <li><a href="#" class="nav-link">{{ __('Produk') }}</a></li>
                    <li><a href="#" class="nav-link">{{ __('Layanan') }}</a></li>
                    <li><a href="#" class="nav-link">{{ __('Berita & Artikel') }}</a></li>
                    <li><a href="#" class="nav-link">{{ __('Kontak') }}</a></li>
                </ul>

                <!-- Search Form -->
                <div class="search-form">
                    <input type="text" class="search-input">
                </div>
            </div>

            <!-- language switcher -->
            <div class="divide-black divide language-switcher">
                <a href="#" class="language-link active">
                    <img src="{{ asset('img/icons/idn.png') }}" alt="Indonesia Flag" class="inline mr-1 w-5 h-5">
                    IND
                </a>
                <a href="#" class="language-link">
                    ENG
                    <img src="{{ asset('img/icons/eng.png') }}" alt="English Flag" class="inline mr-1 w-5 h-5">
                </a>
            </div>
        </div>
    </nav>
</header>
