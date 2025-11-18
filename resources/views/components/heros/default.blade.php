@props([
    'src',
    'src_mobile' => null,
    'alt' => 'Gambar Halaman Website PT. Mensana Aneka Satwa',
    'text_position' => 'left',
    'title' => '',
    'subtitle' => ''
    ])

<section class="relative">
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
    <div class="w-full aspect-square lg:aspect-blog">

        <picture>
            <source media="(max-width: 768px)" srcset="{{ $src_mobile ? storageAsset($src_mobile) : storageAsset($src) }}">
            <source media="(min-width: 769px)" srcset="{{ storageAsset($src) }}">

            <img
                src="{{ storageAsset($src) }}"
                alt="{{ $alt }}"
                class="w-full h-full object-cover">
        </picture>
    </div>

    @if (!empty($title))
        <div class="absolute inset-0 flex items-center">
            <div class="grid grid-cols-5 mx-auto px-4 lg:px-0 container">
                <div class="col-span-5 lg:col-span-2 {{ $text_position === 'left' ? '' : 'lg:col-start-4' }} text-white text-center lg:text-left">
                    <h1 data-motion="fade-left" class="mb-4 font-bold text-xl xl:text-4xl 2xl:text-6xl">{{ $title }}</h1>

                    <div class="text-base lg:text-2xl" data-motion="fade-down">
                        {!! $subtitle !!}
                    </div>

                </div>
            </div>
        </div>
    @endif

</section>
