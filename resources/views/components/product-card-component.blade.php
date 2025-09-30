@props([
    'slug',
    'product_name' => 'Sanavac ND Clone',
    'product_description'=> 'Vaksin aktif newcastle disease',
    'categories' => ['Vaksin', 'Live']
])


<a href="{{ route('product.detail', ['slug'=> 'dummy']) }}" class="product-card">
    <div class="p-4 pt-8">
        <div class="w-full aspect-square">
            <img src="{{ asset('product-thumbs.png') }}" alt="{{ $product_name }}" class="size-full object-center object-cover">
        </div>
    </div>
    <div class="flex flex-col justify-between p-5">
        <div class="product-info">
            <h3 class="product-title">{{ $product_name }}</h3>
            <p class="mt-1 min-h-[40px] text-gray-600 text-sm">{{ $product_description }}</p>
        </div>
        <div class="flex justify-start space-x-2 mt-4 pt-4">
            @foreach ($categories as $item)
                <span class="px-3 py-1 border border-gray-200 rounded-full font-medium text-blue-mensana text-sm">{{ $item }}</span>
            @endforeach
        </div>
    </div>
</a>
