<div class="gap-10 grid grid-cols-1 lg:grid-cols-3">
    @foreach ($articles as $article)
        <x-article-card-component
            :image="$article->getFirstMediaUrl() ? $article->getFirstMediaUrl() : asset('dummy/article-1.png')"
            :type="$article->category->name"
            :date="$article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y')"
            :title="$article->title"
            :excerpt="$article->excerpt"
            :slug="$article->slug"
            wire:key="$loop->index()"
        />
    @endforeach
</div>
