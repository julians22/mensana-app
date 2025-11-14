@props([
    'slug',
    'image',
    'product_name' => 'Sanavac ND Clone',
    'product_description'=> '-',
    'categories' => ['Vaksin', 'Live'],
])


<a href="{{ route('product.detail', ['slug'=> $slug ?? 'dummy']) }}" class="product-card" draggable="false">
    <div class="p-4 pt-8">
        <div class="w-full aspect-square">
            <img src="{{ $image }}" alt="{{ $product_name }}" class="size-full object-center object-cover">
        </div>
    </div>
    <div class="flex flex-col justify-between p-5 min-h-[220px]">
        <div class="product-info">
            <h3 class="product-title">{{ $product_name }}</h3>
            <p class="mt-1 min-h-[40px] text-gray-600 text-sm">{{ $product_description }}</p>
        </div>
        <div class="pb-1 overflow-x-auto" data-simplebar wire:ignore>
            <div class="flex flex-nowrap justify-start space-x-2 mt-4 pt-4 w-max">
                @foreach ($categories as $item)
                    <span class="px-3 py-1 border border-gray-200 rounded-full font-medium text-blue-mensana text-sm">{{ $item }}</span>
                @endforeach
            </div>
        </div>
    </div>
</a>
