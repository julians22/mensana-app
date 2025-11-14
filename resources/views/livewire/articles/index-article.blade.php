<div class="space-y-10">

    <ul class="relative flex items-center gap-x-2 lg:gap-x-6 px-4 lg:px-0"
        x-data="{
            show_sub_filter: $wire.entangle('showSubFilter').live,
            openFilter: false }"
        @click.outside="openFilter = false">

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

        <li x-cloak x-show="show_sub_filter" class="relative"
            @click.outside="openFilter = false"
            >
            <x-elusive-filter class="fill-blue-mensana size-6 cursor-pointer" @click="openFilter = !openFilter"/>

            <div x-show="openFilter" class="top-0 left-0 z-10 absolute space-y-2 bg-white shadow-lg mt-8 px-3 py-4 rounded-lg w-[250px]">

                <span class="font-semibold text-blue-mensana text-lg underline">Pilihan Topik</span>

                @if ($sub_categories)
                    <ul>
                        @foreach ($sub_categories as $subcat)
                            <li>
                                <input type="checkbox" name="filterTopicArticles" id="filter-{{$subcat->id}}" value="{{$subcat->id}}" wire:model.live="filterTopicArticles">
                                <label for="filter-{{$subcat->id}}">
                                    {{$subcat->title}}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <div class="flex justify-between mt-4">
                    {{-- Apply button --}}
                    <button type="button" class="bg-blue-mensana px-4 py-2 rounded-md text-white cursor-pointer" @click="openFilter = false" wire:click="filterArticleTopic">
                        Apply
                    </button>
                    {{-- Reset button --}}
                    <button type="button" class="bg-red-400 px-4 py-2 rounded-md text-white cursor-pointer" @click="openFilter = false" wire:click="resetFilterArticle">
                        Reset
                    </button>
                </div>

            </div>
        </li>

    </ul>

    <div>
        @for ($i = 0; $i < $page && $i < $maxPage; $i++)
            <livewire:articles.card-component
                :postIds="$postIdChunks[$i]"
                key="chunk-{{$queryCount}}-{{$i}}"
            />
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


