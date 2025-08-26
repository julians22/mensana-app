<header class="pt-4 pb-2">
    <nav class="relative mx-auto container">
        <div class="space-y-4">
            <a class="block" href="{{ route('home') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Mensana Logo" class="h-24">
            </a>

            <div class="flex justify-between items-center nav-wrapper">
                <ul class="nav-items">
                    <li><a href="#" class="nav-link">{{ __('Home') }}</a></li>
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
                    <img src="{{ asset('icons/idn.png') }}" alt="Indonesia Flag" class="inline mr-1 w-5 h-5">
                    IND
                </a>
                <a href="#" class="language-link">
                    ENG
                    <img src="{{ asset('icons/eng.png') }}" alt="English Flag" class="inline mr-1 w-5 h-5">
                </a>
            </div>
        </div>
    </nav>
</header>
