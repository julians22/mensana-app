<div>
    {{-- In work, do what you enjoy. --}}

    <div class="z-10 relative mx-auto mt-12 pb-20 max-w-4xl text-center">
        <h3 class="mb-14 font-semibold text-blue-mensana text-xl">@lang('page.related_product_title', ['cat_name' => $category->name])</h3>
        <div class="gap-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">

            @foreach ($category->products as $product)
                <a href="{{ route('product.detail', ['slug'=> $product->slug]) }}" class="block bg-white shadow-md hover:shadow-lg p-6 border border-stone-400 rounded-xl text-center transition-transform hover:-translate-y-1 duration-300 transform">
                    <img src="{{ $product->getFirstMediaUrl('thumbnail') }}" alt="Cyromas" class="mx-auto h-40 object-contain">
                    <h4 class="mt-4 font-semibold text-blue-mensana text-lg">
                        {{ $product->name }}
                    </h4>
                </a>
            @endforeach

        </div>


    </div>
</div>
