@props([
    'slug',
    'image',
    'type' => 'Berita',
    'date' => '08 Feb 2022',
    'title' => 'Infeksi Patogen pada Unggas',
    'excerpt' => 'Peralihan antar musim atau yang kita kenal dengan istilah musim pancaroba merupakan suatu tantangan terhadap para peternak, khususnya dalam bidang perunggasan.'
])

<div class="article-card">
    <div class="relative aspect-video">
        <!-- Type Label -->
        <div class="article-badge">{{ $type }}</div>
        <!-- Article Image -->
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover">
    </div>
    <div class="flex flex-col justify-between px-4 lg:px-8 py-2 lg:py-4 lg:h-[378px]">
        <div>
            <!-- Article Title -->
            <h4 class="article-title">{{ $title }}</h4>
            <!-- Article Date -->
            <p class="article-date">{{ $date }}</p>
            <!-- Article Excerpt -->
            <p class="mb-4 text-gray-500">{{ $excerpt }}</p>
        </div>
        <!-- Read More Link -->
        <a href="{{ route('article.detail', ['article' => $slug]) }}" class="read-more">@lang('Selengkapnya')</a>
    </div>
</div>
