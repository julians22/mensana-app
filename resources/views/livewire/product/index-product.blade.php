<div class="gap-y-4 product__section">

    <div class="flex justify-end col-span-10 sort-section">
        <div x-data="{ open: false }" class="relative">
            <button x-on:click="open = true"
                class="flex items-center bg-white shadow px-4 py-2 rounded focus:outline-none font-normal text-gray-700 focus:text-gray-900"
                type="button">
                <span class="mr-1">@lang('Sort by')</span> <span class="mr-1" x-text="$wire.sortLabel"></span>
                <svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    style="margin-top:3px">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </button>
            <ul x-show="open" x-on:click.away="open = false"
                class="absolute bg-white shadow-lg mt-1 py-2 rounded" style="min-width: 7rem">
                <li>
                    <a href="#" x-on:click.prevent="$wire.setSort('asc');open = false;" class="flex space-x-4 hover:bg-gray-200 px-4 py-2 whitespace-no-wrap">
                        <x-antdesign-sort-ascending-o class="size-6" /> <span>A-Z</span>
                    </a>
                </li>
                <li>
                    <a href="#" x-on:click.prevent="$wire.setSort('desc'); open = false;" class="flex space-x-4 hover:bg-gray-200 px-4 py-2 whitespace-no-wrap">
                        <x-antdesign-sort-descending-o class="size-6" /> <span>Z-A</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="filter-section">

        <div class="top-10 sticky bg-[#f2f2f2] px-4 lg:px-10 py-3 lg:py-10 rounded-2xl">

            <!-- Search Field -->
            <div>
                <form wire:submit="searchProducts">
                    <input type="text" name="search" placeholder="Search Product" wire:model='search'
                        class="bg-white px-2 py-3 rounded-md outline-none ring-[#f2f2f2] ring-1 focus:ring-gray-300 ring-offset-1 w-full">
                    <button class="mt-4 btn btn-primary" type="submit">Search</button>
                </form>
            </div>

            <!-- Filter Info -->
            <div class="flex flex-wrap gap-x-2 gap-y-1 mt-4">
                @foreach ($this->filter_collections as $key => $groups)
                @foreach ($groups as $item)
                <div class="relative bg-neutral-300 pr-6 pl-2 rounded-md text-white">
                    @switch($key)
                    @case('categories')
                    {{ $categories[$item] }}
                    @break
                    @case('animals')
                    {{ $animals[$item] }}
                    @break
                    @default
                    @endswitch
                    <span class="right-0 absolute mr-2 text-gray-400 cursor-pointer"
                        wire:click="unsetFilter('{{ $key }}', '{{ $item }}')">x</span>
                </div>
                @endforeach
                @endforeach
            </div>

            <!-- Filter Animal -->
            <div class="product-filter-wrapper" x-data="{openAnimal: false}">
                <h3 class="filter-parrent-title">@lang('Pilih Hewan')</h3>

                <ul class="mt-4" x-show="openAnimal" x-transition x-transition:enter.scale.80
                    x-transition:leave.scale.90>
                    @foreach ($animals as $key => $value)
                    <li>
                        <label class="option-list">
                            <input type="checkbox" class="form-checkbox" value="{{ $key }}"
                                wire:model.live='selectAnimals'>
                            <span class="label">
                                <span class="checkbox">
                                    <x-heroicon-o-check class="stroke-2 stroke-blue-mensana size-5 checkmark" />
                                </span>
                                <span>{{ $value }}</span>
                            </span>
                        </label>
                    </li>
                    @endforeach
                </ul>

                <div class="group top-0 right-0 absolute size-6 cursor-pointer">
                    <span @click="openAnimal = !openAnimal" class="block size-full transform"
                        :class="{'-scale-y-100' : !openAnimal}">
                        <x-heroicon-o-chevron-down class="text-blue-mensana" />
                    </span>
                </div>
            </div>

            <!-- Category Filter -->
            <div class="product-filter-wrapper" x-data="{openCategory: true}">
                <h3 class="filter-parrent-title" @click="openCategory = !openCategory">@lang('Pilih Kategori')</h3>

                <ul class="mt-4" x-show="openCategory" x-transition x-transition:enter.scale.80
                    x-transition:leave.scale.90>
                    @foreach ($categories as $key => $value)
                    <li>
                        <label class="option-list">
                            <input type="checkbox" class="form-checkbox" wire:model.live='selectCategories'
                                value="{{ $key }}">
                            <span class="label">
                                <span class="checkbox">
                                    <x-heroicon-o-check class="stroke-2 stroke-blue-mensana size-5 checkmark" />
                                </span>
                                <span>{{ $value }}</span>
                            </span>
                        </label>
                    </li>
                    @endforeach

                </ul>

                <div class="group top-0 right-0 absolute size-6 cursor-pointer">
                    <span @click="openCategory = !openCategory" class="block size-full transform"
                        :class="{'-scale-y-100' : !openCategory}">
                        <x-heroicon-o-chevron-down class="text-blue-mensana" />
                    </span>
                </div>
            </div>

            <!-- Download Catalogue Button -->

            <div class="mt-6 text-center" id="download">
                <a href="#" @click.prevent="openRequestModal = !openRequestModal"
                    class="group inline-flex items-center hover:bg-blue-mensana border border-blue-mensana rounded-xl">
                    <div class="flex justify-center items-center px-2 xl:px-4 w-[45px] lg:w-[50px]">
                        <x-heroicon-s-arrow-down-tray
                            class="w-6 lg:w-14 h-6 lg:h-14 text-blue-mensana group-hover:text-white transition-all ease-in-out" />
                    </div>
                    <div
                        class="px-4 py-2 border-blue-mensana group-hover:border-white border-l transition-all ease-in-out">
                        <span
                            class="font-bold text-blue-mensana group-hover:text-white text-xs xl:text-xl text-center transition-all ease-in-out">
                            @lang('Request Download Catalog')
                        </span>
                    </div>
                </a>
            </div>



        </div>

    </div>
    <div class="product-items-section">
        <div class="px-4 lg:px-0 min-h-[1000px]" id="paginated-products">
            <div class="product__wrapper">

                @foreach ($products as $item)
                <x-product-card-component slug="{{$item->slug}}" product_name="{{$item->name}}"
                    product_description="{{$item->short_description}}" image="{{$item->getFirstMediaUrl('thumbnail')}}"
                    :categories="$item->categories"
                     />
                @endforeach


            </div>
            <div class="mt-20">
                {{ $products->links(data: ['scrollTo' => '#paginated-products']) }}
            </div>
        </div>

        <div class="h-[100px]"></div>
    </div>
</div>
