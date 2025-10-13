<div class="space-y-10">

    <ul class="relative flex items-center gap-x-2 lg:gap-x-6" x-data="{ category: @entangle('category'), openFilter: false }" @click.outside="openFilter = false">

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

        <li x-show="category == 'articles' || category == 'artikel'" class="relative">
            <x-elusive-filter class="fill-blue-mensana size-6 cursor-pointer" @click="openFilter = !openFilter"/>

            <div x-show="openFilter" class="top-0 left-0 z-10 absolute space-y-2 bg-white shadow-lg mt-8 px-3 py-4 rounded-lg w-[400px]">

                <span class="font-semibold text-blue-mensana underline">Pilihan Topik</span>

                @foreach ($articleFilter as $key => $item)
                    <div>
                        <h4 class="mb-2 font-semibold text-lg">{{ $key }}</h4>
                        <ul class="space-y-2 pl-2">
                            @foreach ($item as $keyItem => $itemChild)
                                <li>
                                    {{-- create a radio button --}}
                                    <input type="checkbox" name="filterArticle" id="filter-{{$keyItem}}-{{$key}}" value="{{$itemChild}}" wire:model.live="filterArticle">
                                    <label for="filter-{{$keyItem}}-{{$key}}">
                                        {{$itemChild}}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach

                <div class="flex justify-between mt-4">
                    {{-- Apply button --}}
                    <button type="button" class="bg-blue-mensana px-4 py-2 rounded-md text-white" @click="openFilter = false" wire:click="filterArticle">
                        Apply
                    </button>
                    {{-- Reset button --}}
                    <button type="button" class="bg-red-400 px-4 py-2 rounded-md text-white" @click="openFilter = false" wire:click="resetFilterArticle">
                        Reset
                    </button>
                </div>

            </div>
        </li>

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


