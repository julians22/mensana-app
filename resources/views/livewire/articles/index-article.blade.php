<div class="space-y-10">

    <ul class="flex gap-x-2 lg:gap-x-6">

        @foreach ($categories as $item)
            <li
                @class([
                    'article_category__button',
                    'active' => ($item->slug == $category)
                ])
                wire:click="setCategory('{{$item->slug}}')"
                >
                {{ $item->name }}
            </li>
        @endforeach

    </ul>

    <div>
        @for ($i = 0; $i < $page && $i < $maxPage; $i++)
            @livewire('articles.card-component', [
                'postIds' => $postIdChunks[$i]
            ], key("chunk-{$queryCount}-{$i}"))
        @endfor
    </div>

    {{-- load more button --}}
    @if ($this->hasNextPage())
    <x-heroicon-o-chevron-double-down class="mx-auto mb-2 size-6 text-gray-400" />
    <div class="flex justify-center">
        <button wire:click="loadMore" class="font-semibold text-blue-mensana underline cursor-pointer">
            Load More
        </button>
    </div>
    @endif

</div>


