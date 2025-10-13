<div class="gap-x-10 grid grid-cols-10 mx-auto container">
    <div class="col-span-3">

        <div class="top-10 sticky bg-[#f2f2f2] px-10 py-10 rounded-2xl">

            <!-- Search Field -->
            <div>
                <form wire:submit="searchProducts">
                    <input
                        type="text"
                        name="search"
                        placeholder="Search Product"
                        wire:model='search'
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
                        <span class="right-0 absolute mr-2 text-gray-400 cursor-pointer" wire:click="unsetFilter('{{ $key }}', '{{ $item }}')">x</span></div>
                    @endforeach
                @endforeach
            </div>

            <!-- Filter Animal -->
            <div class="product-filter-wrapper" x-data="{openAnimal: false}">
                <h3 class="filter-parrent-title">Animal</h3>

                <ul class="mt-4" x-show="openAnimal" x-transition x-transition:enter.scale.80 x-transition:leave.scale.90>
                    @foreach ($animals as $key => $value)
                    <li>
                        <label class="option-list">
                            <input type="checkbox" class="form-checkbox" value="{{ $key }}" wire:model.live='selectAnimals'>
                            <span class="label">
                                <span class="checkbox">
                                    <x-heroicon-o-check class="stroke-2 stroke-blue-mensana size-5 checkmark"/>
                                </span>
                                <span>{{ $value }}</span>
                            </span>
                        </label>
                    </li>
                    @endforeach
                </ul>

                <div class="group top-0 right-0 absolute size-6 cursor-pointer">
                    <span  @click="openAnimal = !openAnimal" class="block size-full transform" :class="{'-scale-y-100' : !openAnimal}">
                        <x-heroicon-o-chevron-down class="text-blue-mensana"/>
                    </span>
                </div>
            </div>

            <!-- Category Filter -->
            <div class="product-filter-wrapper" x-data="{openCategory: true}">
                <h3 class="filter-parrent-title" @click="openCategory = !openCategory">Category</h3>

                <ul class="mt-4" x-show="openCategory" x-transition x-transition:enter.scale.80 x-transition:leave.scale.90>
                    @foreach ($categories as $key => $value)
                        <li>
                            <label class="option-list">
                                <input type="checkbox" class="form-checkbox" wire:model.live='selectCategories' value="{{ $key }}">
                                <span class="label">
                                    <span class="checkbox">
                                        <x-heroicon-o-check class="stroke-2 stroke-blue-mensana size-5 checkmark"/>
                                    </span>
                                    <span>{{ $value }}</span>
                                </span>
                            </label>
                        </li>
                    @endforeach

                </ul>

                <div class="group top-0 right-0 absolute size-6 cursor-pointer">
                    <span  @click="openCategory = !openCategory" class="block size-full transform" :class="{'-scale-y-100' : !openCategory}">
                        <x-heroicon-o-chevron-down class="text-blue-mensana"/>
                    </span>
                </div>
            </div>

            <!-- Download Catalogue Button -->

            <div class="mt-6">
                <a href="#" @click.prevent="openRequestModal = !openRequestModal" class="group flex items-center hover:bg-blue-mensana border border-blue-mensana rounded-xl">
                    <div class="flex flex-1 justify-center items-center px-2 xl:px-4 size-2 xl:size-6">
                        <x-heroicon-s-arrow-down-tray class="text-blue-mensana group-hover:text-white transition-all ease-in-out"/>
                    </div>
                    <div class="px-4 py-2 group-hover:border-white border-blue-mensana border-l transition-all ease-in-out">
                        <span class="font-bold text-blue-mensana group-hover:text-white text-xs xl:text-xl text-center transition-all ease-in-out">
                            Request Download Catalog
                        </span>
                    </div>
                </a>
            </div>



        </div>

    </div>
    <div class="col-span-7">
        <div class="min-h-[1000px]" id="paginated-products">
            <div class="product__wrapper">

                @foreach ($products as $item)
                    <x-product-card-component
                        slug="{{$item->slug}}"
                        product_name="{{$item->name}}"
                        product_description="{{$item->short_description}}"
                        :categories="$item->categories->pluck('name')->toArray()"
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
