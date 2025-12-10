<div class="space-y-10">

    <div
        x-data="{
                show_sub_filter: $wire.entangle('showSubFilter').live,
                openFilter: false }"
    >
        <ul class="relative flex items-center gap-x-2 lg:gap-x-6 px-4 lg:px-0"
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

        </ul>

        <div class="bg-stone-100 mt-3 px-4 py-2 rounded max-w-max" x-show="show_sub_filter">
            @if ($sub_categories)
                <span class="mb-2 ml-2 font-bold text-stone-700 text-lg">@lang('Pilih Topik')</span>
                <ul class="flex flex-row items-center space-x-2 article-category-filter">
                    @foreach ($sub_categories as $subcat)
                        <li>
                            <label class="option-list">
                                <input type="checkbox" class="form-checkbox"
                                    id="filter-{{$subcat->id}}" value="{{$subcat->id}}" wire:model.live="filterTopicArticles"
                                >
                                <span class="label">
                                    <span class="checkbox">
                                        <x-heroicon-o-check class="stroke-2 stroke-blue-mensana size-5 checkmark" />
                                    </span>
                                    <span>{{$subcat->title}}</span>
                                </span>
                            </label>
                        </li>
                    @endforeach
                </ul>
                 <div class="flex space-x-4 mt-4">
                    {{-- Apply button --}}
                    <button type="button" class="bg-blue-mensana px-4 py-2 rounded-md text-white cursor-pointer" @click="openFilter = false" wire:click="filterArticleTopic">
                        Apply
                    </button>
                    {{-- Reset button --}}
                    <button type="button" class="bg-red-400 px-4 py-2 rounded-md text-white cursor-pointer" @click="openFilter = false" wire:click="resetFilterArticle">
                        Reset
                    </button>
                </div>
            @endif
        </div>
    </div>


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


