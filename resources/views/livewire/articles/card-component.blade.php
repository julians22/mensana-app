<div class="gap-10 grid grid-cols-3 px-16">
    @foreach ($articles as $article)
        <x-article-card-component
            :type="$article->category->name"
            :date="$article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y')"
            :title="$article->title"
            :excerpt="$article->excerpt"
            :slug="$article->slug"
            wire:key="$loop->index()"
        />
    @endforeach
</div>
